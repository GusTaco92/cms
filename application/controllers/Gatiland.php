<?php 

class Gatiland extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Gatiland';
		$this->db_b = $this->load->database('segunda', true);

		// $this->load->model('model_users');
		$this->load->model('model_gatiland');
	}

	
	public function index()
	{
		if(!in_array('viewGatiland', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$gatiland_data = $this->model_gatiland->getDataGatilandActivos();
		$result = array();
		foreach ($gatiland_data as $k => $v) {
			$result[$k]['user_info'] = $v;
		}
		$this->data['gatiland_data'] = $result;
		$this->render_template('gatiland/index', $this->data);
	}

	public function delete($id)
	{
		if(!in_array('deleteGatiland', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_gatiland->eliminar($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
		        		redirect('gatiland/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Ocurrió un error!!');
		        		redirect('gatiland/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('gatiland/delete', $this->data);
			}	
		}
	}
}