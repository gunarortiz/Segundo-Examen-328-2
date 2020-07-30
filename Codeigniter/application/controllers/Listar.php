<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model("ListarModel");
  }
	public function index()
	{
    $request['lista'] = $this->ListarModel->getAll();
    // echo  strval($request['lista']);
		$this->load->view('listar',$request);
  }
  
  public function create(){
    if($this->input->post("submit")){

      $this->load->view('listar',$request);
    }
  }
}
?>