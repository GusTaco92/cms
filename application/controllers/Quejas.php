<?php 

class Quejas extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Quejas';
		$this->db_b = $this->load->database('segunda', true);

		// $this->load->model('model_users');
		$this->load->model('model_quejas');
	}

	
	public function index()
	{
		if(!in_array('viewQuejas', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$quejas_data = $this->model_quejas->getDataQuejasActivas();
		$result = array();
		foreach ($quejas_data as $k => $v) {
			$result[$k]['user_info'] = $v;
		}
		$this->data['quejas_data'] = $result;
		$this->render_template('quejas/index', $this->data);
	}

	public function delete($id)
	{
		if(!in_array('deleteQuejas', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_quejas->eliminar($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
		        		redirect('quejas/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Ocurrió un error!!');
		        		redirect('quejas/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('quejas/delete', $this->data);
			}	
		}
	}
}