<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privada extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Privada';

		$this->load->model('model_privada');
    }

    public function Index()
    {
        if(!in_array('viewPrivada', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$privada_data = $this->model_privada->getOrdenesData();
		$result = array();
		foreach ($privada_data as $k => $v) {
			$result[$k]['ordenes_info'] = $v;
		}
		$this->data['privada_data'] = $result;
		$this->render_template('privada/index', $this->data);
    }

    public function create()
	{
		if(!in_array('createPrivada', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if (empty($_FILES['product_image']['name']))
		{
			$this->form_validation->set_rules('product_image', 'Imagenes', 'required');
		}
		$this->form_validation->set_rules('tipoV', 'Tipo de vivienda', 'required');
		$this->form_validation->set_rules('edif', 'Edificio', 'trim|required');
		$this->form_validation->set_rules('mat', 'Materiales', 'trim|required');
		$this->form_validation->set_rules('fact', 'Factura', 'trim');
        $this->form_validation->set_rules('cot', 'Cotización', 'trim|required');
        $this->form_validation->set_rules('f_ini', 'Fecha de inicio', 'trim|required');
        $this->form_validation->set_rules('f_fin', 'Fecha de fin', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$upload_image = $this->upload_image($_FILES['product_image']);

        	$data = array(
        		'Casa/Dto' => $this->input->post('tipoV'),
        		'Edificio' => $this->input->post('edif'),
        		'Materiales' => $this->input->post('mat'),
        		'Factura' => $this->input->post('fact'),
                'Cotización' => $this->input->post('cot'),
                'Fecha_de_inicio' => $this->input->post('f_ini'),
                'Fecha_de_termino' => $this->input->post('f_fin'),                
        	);
			
        	$create = $this->model_privada->create($data,$upload_image);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Orden creada correctamente');
        		redirect('privada/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Corrió un error, contacta al administrador del sistema!!');
        		redirect('privada/create', 'refresh');
        	}
        }
        else {
        	// ordenes
        	$ordenes_data = $this->model_privada->getOrdenesData();
        	$ordenes_finalData = array();
        	foreach ($ordenes_data as $k => $v) {
        		$ordenes_finalData[$k]['ordenes_data'] = $v;
        	}
        	$this->data['ordenes'] = $ordenes_finalData;    	
            $this->render_template('privada/create', $this->data);
        }	
	}
	
	private function upload_image($files)
	{
		$config = array(
			'upload_path'   => 'assets/images/evidencias',
			'allowed_types' => 'jpg|gif|png',
			'file_name'     => uniqid(),                
			'max_size'     => '1000',                
		);

		$this->load->library('upload', $config);

		foreach ($files['name'] as $key => $image) {
			$_FILES['product_image[]']['name']= $files['name'][$key];
			$_FILES['product_image[]']['type']= $files['type'][$key];
			$_FILES['product_image[]']['tmp_name']= $files['tmp_name'][$key];
			$_FILES['product_image[]']['error']= $files['error'][$key];
			$_FILES['product_image[]']['size']= $files['size'][$key];
			$type = explode('.', $files['name'][$key]);
			$type = $type[count($type) - 1];
			$datos[]=array(
				'ruta' => $config['upload_path'].'/'.$config['file_name'].'.'.$type,
			);
			
			$this->upload->initialize($config);
			$this->upload->do_upload('product_image[]');
		}
		return $datos;
	}
}