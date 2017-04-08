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
            public function get_by_page($offset=0){
                $this->db->order_by('post_date','desc');
                $this->db->limit(6,$offset);
                $rs=$this->db->get('t_blog');
                return $rs->result();
            }
        }
?>