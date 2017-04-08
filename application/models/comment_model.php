<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Comment_model extends CI_Model{
    public function get_by_blog($blog_id){
        $this->db->order_by('post_date','desc');
        return $this->db->get_where('t_comment',array(
           'blog_id'=>$blog_id
        ))->result();
    }
    public function insert_comment($username,$email,$phone,$message,$hid){
        $this->db->insert('t_comment',array(
           'username'=>$username,
            'email'=>$email,
            'phone'=>$phone,
            'message'=>$message,
            'blog_id'=>$hid
        ));
        return $this->db->affected_rows();
    }
}
?>