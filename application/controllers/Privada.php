<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privada extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Privada';

		// $this->load->model('model_orders');
    }

    public function Index()
    {
        if(!in_array('viewPrivada', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->render_template('privada/index', $this->data);
    }

    public function create()
	{
		if(!in_array('createPrivada', $this->permission)) {
            redirect('dashboard', 'refresh');
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
        	$upload_image = $this->upload_image();

        	$data = array(
        		'Casa/Dto' => $this->input->post('tipoV'),
        		'Edificio' => $this->input->post('edif'),
        		'Materiales' => $this->input->post('mat'),
        		'Factura' => $this->input->post('fact'),
                'Cotización' => $this->input->post('cot'),
                'Fecha de inicio' => $this->input->post('f_ini'),
                'Fecha de termino' => $this->input->post('f_fin'),                
        	);

        	$create = $this->model_products->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('products/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('products/create', 'refresh');
        	}
        }
        else {
            // false case

        	// attributes 
        	$attribute_data = $this->model_attributes->getActiveAttributeData();

        	$attributes_final_data = array();
        	foreach ($attribute_data as $k => $v) {
        		$attributes_final_data[$k]['attribute_data'] = $v;

        		$value = $this->model_attributes->getAttributeValueData($v['id']);

        		$attributes_final_data[$k]['attribute_value'] = $value;
        	}

        	$this->data['attributes'] = $attributes_final_data;
			$this->data['brands'] = $this->model_brands->getActiveBrands();        	
			$this->data['category'] = $this->model_category->getActiveCategroy();        	
			$this->data['stores'] = $this->model_stores->getActiveStore();        	

            $this->render_template('products/create', $this->data);
        }	
	}
}