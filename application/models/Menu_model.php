<?php
	class Menu_model extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function get_drinks($slug = FALSE) {
			if ($slug === FALSE) {
				return NULL;
			}
			$query = $this->db->get_where('drinks', array('slug' => $slug));
			return $query -> row_array();
		}

		public function update_drink() {
			$id = $this -> input -> post('id');

			$data = array(
				'drink_name' => $this->input->post('drink_name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
			);

			return $this->db->update('drinks', $data, array('id' => $id));
		}

		public function update_venue() {
			$slug = $this -> input -> post('slug');

			$data = array(
				'venue_name' => $this->input->post('venue_name'),
				'description' => $this->input->post('description'),
				'admin_email' => $this->input->post('admin_email')
			);

			return $this->db->update('venues', $data, array('slug' => $slug));
		}

		
	}
?>