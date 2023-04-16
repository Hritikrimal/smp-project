<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function insert()
	{



		$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lastname', 'Lat Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('education', 'Education', 'required');
		if ($this->form_validation->run() == TRUE) {
			$response['status'] = 1;
			$object = array();
			$object['firstName'] = $this->input->post('firstname');
			$object['lastName'] = $this->input->post('lastname');
			$object['email'] = $this->input->post('email');
			$object['address'] = $this->input->post('address');
			$object['gender'] = $this->input->post('gender');
			$object['education'] = $this->input->post('education');
			$this->User_model->insert($object);
			$response['msg'] = "<div class= \"alert alert-success\"> Record has been added</div>";
		} else {
			//error message in input feild
			$response['status'] = 0;
			$response['first'] = strip_tags(form_error('firstname'));
			$response['lastname'] = strip_tags(form_error('lastname'));
			$response['email'] = strip_tags(form_error('email'));
			$response['address'] = strip_tags(form_error('address'));
			$response['gender'] = strip_tags(form_error('gender'));
			$response['education'] = strip_tags(form_error('education'));
		}
		echo json_encode($response);
	}

	function fetch()
	{
		$post = $this->User_model->get();
		echo json_encode($post);
	}

	public function del()
	{
		$del_id = $this->input->post('del_id');
		$this->User_model->delet_entry($del_id);
		$response['delete'] = "<div class= \"alert alert-success\"> Record has been deleted</div>";
		echo json_encode($response);
	}

	public function edit()
	{



		$edit_id = $this->input->post('edit_id');

		$post = $this->User_model->edit_entry($edit_id);
		// 	$data = array('response' => "success", 'post' => $post);
		// } else {
		// 	$data = array('response' => "error", 'message' => 'failed');
		// }
		echo json_encode($post);

		// $edit_id = $this->input->post('edit_id');
		// $response = $this->User_model->edit_entry($edit_id);
		// // $response['delete'] = "<div class= \"alert alert-success\"> Record has been deleted</div>";
		// // var_dump($response);
		// echo json_encode($response);
	}


	public function update()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lastname', 'Lat Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('education', 'Education', 'required');
		if ($this->form_validation->run() == TRUE) {


			$response['status'] = 1;
			$object = array();


			$id = $this->input->post('modal_id');
			$object['firstName'] = $this->input->post('firstname');
			$object['lastName'] = $this->input->post('lastname');
			$object['email'] = $this->input->post('email');
			$object['address'] = $this->input->post('address');
			$object['gender'] = $this->input->post('gender');
			$object['education'] = $this->input->post('education');
			$this->User_model->update_entry($object, $id);
			$response['msg'] = "<div class= \"alert alert-success\"> Record has been edited</div>";
		} else {
			//error message in input feild
			$response['status'] = 0;
			$response['first'] = strip_tags(form_error('firstname'));
			$response['lastname'] = strip_tags(form_error('lastname'));
			$response['email'] = strip_tags(form_error('email'));
			$response['address'] = strip_tags(form_error('address'));
			$response['gender'] = strip_tags(form_error('gender'));
			$response['education'] = strip_tags(form_error('education'));
		}
		echo json_encode($response);
	}
}
