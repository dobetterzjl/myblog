<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('blog_category_model');
		$this->load->model('blog_model');
		$categories=$this->blog_category_model->get_all();
		$blogs = $this->blog_model->get_all();
		$this->load->view('index',array(
			'categories'=>$categories,
			'blogs'=>$blogs
		));
		
	}
	public function get_blog(){
		$this->load->model('blog_model');
		$cate_id =$this->input->get('cateId');
		if($cate_id==0){
			$blogs = $this->blog_model->get_all();
		}else{
			$blogs=$this->blog_model->get_by_category($cate_id);
		}
		echo json_encode($blogs);
	}
	public function view_blog(){
		$id=$this->input->get('blogId');
		$this->load->model('blog_model');
		$this->load->model('comment_model');
		$blog=$this->blog_model->get_by_id($id);
		$blog->comments= $this->comment_model->get_by_blog($id);
		$this->load->view('blog_detail',array(
			'blog'=>$blog

		));
	}
	public function save_comment(){
		$username = $this->input->get('username');
		$email = $this->input->get('email');
		$phone = $this->input->get('phone');
		$message = $this->input->get('message');
		$hid = $this->input->get('blogHid');
		$this->load->model('comment_model');
		$addcomment=$this->comment_model->insert_comment($username,$email,$phone,$message,$hid);
		if($addcomment){
			echo "success";
		}else{
			echo "failed";
		};
	}
	public function blog_list(){
		$this->load->model('blog_model');
		$blogs=$this->blog_model->get_by_page();
		$this->load->view('blog_list',array(
			'blogs'=>$blogs
		));
	}
	public function get_more(){
		$offset = $this->input->get('clickNum');
		$this->load->model('blog_model');
		$blogs=$this->blog_model->get_by_page(6,$offset);
		echo json_encode($blogs);
	}
	
}

