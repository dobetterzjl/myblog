<?php
        defined('BASEPATH') OR exit ('No direct script access allowed');
        class Blog_model extends CI_Model
        {
            public function get_all()
            {
                $this->db->order_by('post_date', 'desc');//按降序排列{‘asc’升序排列}
                $this->db->limit(9);//限制取出九条
                return $this->db->get('t_blog')->result();
            }

            public function get_by_category($cate_id)
            {
                $this->db->order_by('post_date', 'desc');
                return $this->db->get_where('t_blog', array('cate_id' => $cate_id))->result();
            }

            public function get_by_id($blog_id)
            {
                // return $this->db->get_where('t_blog',array('blog_id' => $blog_id))->row();
                $this->db->select('blog.*,cate.cate_name');
                $this->db->from('t_blog blog');
                $this->db->join('t_blog_category cate', 'blog.cate_id = cate.cate_id');
                $this->db->where('blog.blog_id', $blog_id);
                return $this->db->get()->row();
            }
            public function get_by_page($cate_id,$limit=6,$offset=0){
                $this->db->select('blog.*,cate.cate_name');
                $this->db->from('t_blog blog');
                $this->db->join('t_blog_category cate', 'blog.cate_id = cate.cate_id');
                $this->db->order_by('blog.post_date','desc');
                if($cate_id!=0){
                    $this->db->where('cate.cate_id',$cate_id);
                }
                $this->db->limit($limit,$offset);
                $rs=$this->db->get();
                return $rs->result();
            }
            public function get_all_count($cate_id){
                    $this->db->select('blog.*,cate.cate_name');
                    $this->db->from('t_blog blog');
                    $this->db->join('t_blog_category cate', 'blog.cate_id = cate.cate_id');
                    if($cate_id!=0){
                        $this->db->where('cate.cate_id',$cate_id);
                    }
                    return $this->db->count_all_results();
            }
        }
?>