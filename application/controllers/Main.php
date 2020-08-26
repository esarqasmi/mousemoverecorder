<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
        parent::__construct();
    
        // Load Model
        $this->load->model('Main_model'); 
        // Load base_url
        $this->load->helper('url');
    }
    
    public function index(){  
	
		$list = $this->Main_model->getDetails(); 
		// Render List
		$data['data'] = $list;
        $this->load->view('index_view',$data);
    }

	public function details($id=NULL){
		 
		// Fetch data 
		$data = $this->Main_model->getCordinates($id); 
		// Render data 
		 $data['data'] = ($data[0]['cordinates']);
        $this->load->view('render_view',$data);
		//echo json_encode($data);
	}
	
	public function saveCordinates(){
		// POST data
		$postData = $this->input->post('cordinates');
		//var_dump($postData);
		$save = $this->Main_model->saveDetails(array('cordinates'=>serialize($postData)));
		echo $save; 
		//echo json_encode($data);
	}
	
	

}
