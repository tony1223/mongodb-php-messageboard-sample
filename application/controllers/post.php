<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller {
	public function new_()
	{
		$this->load->view('post/new',Array(
			"pageTitle" => "Post new message"
		));
	}

	public function reply($id)
	{
		$mid = new MongoID($id);
		$results = $this->mongo->where("_id",$mid)->get("messages");
		if(count($results) == 0 ){
			return show_404();
		}

		$this->load->view('post/reply',Array(
			"pageTitle" => "Post new message",
			"id" => $id,
			"message" => $results[0]
		));
	}

	public function replying($id){
		$name = $this->input->post("poster");
		$content = $this->input->post("content");
		$time = time()*1000.0;


		$mid = new MongoID($id);
		$results = $this->mongo->where("_id",$mid)
			->push("replied", Array("name" => $name,"content" => $content,"createDate" => $time))
			->update("messages");
		redirect(site_url("/"));
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