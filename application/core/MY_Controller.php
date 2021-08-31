<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	function __construct() {
        parent::__construct();
        
        $this->data['message'] = '';
        

    }
	
	public function layout($view){

		//Check token
		$token = $this->session->userdata('parent_token');
		
 
		if(!$token){

			$this->data['message'] = 'You must be logged in to proceed';
			$this->load->view('Parent/Mobile_Login_Parent');
		
		}
		else
		{	
			//Check view
			if($view != ''){
				$this->load->view('Parent/Parent_header');
				$this->load->view($view);
				$this->load->view('Parent/Parent_footer');
			}
			else{
				$this->load->view('Parent/Parent_header');
				$this->load->view('Parent/Parent_footer');
			}
		}

	}
	
	


		

	
	
	
	
	
}
?>