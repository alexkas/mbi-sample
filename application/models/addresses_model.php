<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addresses_model extends CI_Model {

	function get_addresses($options = array()) {

		// single address
		if (isset($options['id'])) {

			$this->db->where('id', $options['id']);
			$address = $this->db->get('addresses')->row_array();

			return $address;

		}
		// list
		else {

			$this->db->order_by('last_name');
			$addresses = $this->db->get('addresses')->result_array();

			return $addresses;

		}

	}

	function add_address($post) {

		$this->db->insert('addresses', $post);

		return $this->db->insert_id();

	}

	function edit_address($id, $post) {

		$this->db->where('id', $id);
		$this->db->update('addresses', $post);

		return $id;

	}

}
?>