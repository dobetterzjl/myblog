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
    public function blog(){
        $this->load->model('blog_category');
        $categories=$this->blog_category->get_all();
        
        $this->load->view('admin/admin_blog');
    }
}
