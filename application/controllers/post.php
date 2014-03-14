<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller {
	public function new_()
	{
		$this->load->view('post/new',Array(
			"pageTitle" => "Post new message"
		));
	}

	public function create(){
		$name = $this->input->post("poster");
		$content = $this->input->post("content");
		$time = time()*1000.0;

		$this->mongo->insert("messages",Array("name" => $name,"content" => $content,"createDate" => $time));
		redirect(site_url("/"));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */