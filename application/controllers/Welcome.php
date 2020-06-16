<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $this->load->database();
	    
	    $this->db->select('*');    
        $this->db->from('selection_criteria');
        $this->db->join('selection_criteria_response', 'selection_criteria.id = selection_criteria_response.selection_criteria_id','left');
        $this->db->join('job_application', 'selection_criteria.job_application_id = job_application.id','left');
        $query = $this->db->get();
	    
	    
	    
        
        $data['selection_criteria_list'] = $query->result();
        //print_r($data);
        $this->load->view('welcome_message',$data);
    
	    
	}
}
