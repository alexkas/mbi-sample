<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addresses extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('addresses_model');
	}

	function index() {

		header("Location: /addresses/list_addresses");
		exit;

	}

	function list_addresses() {

		// load header
		$this->load->view('header', array('title' => "List Addresses"));

		// load list
		$data = array();
		$data['addresses'] = $this->addresses_model->get_addresses();
		$this->load->view('list', $data);

		// load footer
		$this->load->view('footer');

	}

	function add_address() {

		// process form
		if (count($_POST)) {

			$id = $this->addresses_model->add_address($_POST);
			$this->session->set_flashdata("message", 'You have successfully added an address! <a href="/addresses/edit_address/' . $id . '">Click here</a> to make additional changes.');
			header("Location: /addresses/list_addresses");
			exit;

		}

		// load header
		$this->load->view('header', array('title' => "Add Address"));

		// load form
		$data = array();
		$this->load->view('form', $data);

		// load footer
		$this->load->view('footer');
		
	}

	function edit_address() {

		// process form
		if (count($_POST)) {

			$id = $this->addresses_model->edit_address($this->uri->segment(3), $_POST);
			$this->session->set_flashdata("message", 'You have successfully updated an address! <a href="/addresses/edit_address/' . $id . '">Click here</a> to make additional changes.');
			header("Location: /addresses/list_addresses");
			exit;

		}

		// load header
		$this->load->view('header', array('title' => "Edit Address"));

		// load form
		$data = array();
		$data['address'] = $this->addresses_model->get_addresses(array("id" => $this->uri->segment(3)));
		$this->load->view('form', $data);

		// load footer
		$this->load->view('footer');
		
	}

	function delete_address() {

		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('addresses');

		$this->session->set_flashdata("message", 'You have successfully deleted an address!');
		header("Location: /addresses/list_addresses");
		exit;

	}

}