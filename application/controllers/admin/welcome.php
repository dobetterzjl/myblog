<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function login(){
        $this->load->view('admin/admin_login');
    }
    public function index(){
        $this->load->view('admin/admin_index');
    }
    public function category(){
        $this->load->view('admin/admin_category');
    }
    public function blog($cate_id=0,$offset=0){
        $title= $this->input->get('title');
        $this->load->model('blog_category_model');
        $this->load->model('blog_model');
        $total_row=$this->blog_model->get_all_count($cate_id,$title);
//        $offset=$this->uri->segment(3);
//        $offset=!$offset?0:$offset;
//        分页配置开始
        $this->load->library('pagination');
        $config['base_url']='admin/blog/'.$cate_id.'/';//注意后面加/
        $config['total_rows']=$total_row;
        $config['per_page']=6;
        $config['uri_segment']=4;
        $config['first_link']="首页";
        $config['last_link']="尾页";
        $config['prev_link']="上一页";
        $config['next_link']="下一页";
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        $config['first_tag_open']='<li>';
        $config['first_tag_close']='</li>';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['cur_tag_open']='<li class="am-active am-disabled"><a href="comment/paging/" class="comment_selected">';
        $config['cur_tag_close']='</a></li>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $this->pagination->initialize($config);
//        分页配置结束

        $categories=$this->blog_category_model->get_all();
        $blogs=$this->blog_model->get_by_page($cate_id,$title,$config['per_page'],$offset);
        $this->load->view('admin/admin_blog',array(
            'categories'=>$categories,
            'blogs'=>$blogs
        ));
    }
    public function add_blog(){
        $this->load->model('blog_category_model');
        $categories=$this->blog_category_model->get_all();
        $this->load->view('admin/add_blog',array(
            'categories'=>$categories,
        ));
    }
}
