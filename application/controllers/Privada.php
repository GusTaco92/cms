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

		if (empty($_FILES['product_image']['name'][0]))
		{
			$this->form_validation->set_rules('product_image', 'Imagenes', 'required');
		}
		$this->form_validation->set_rules('tipoV', 'Tipo de vivienda', 'required');
		$this->form_validation->set_rules('edif', 'Edificio', 'trim|required');
		$this->form_validation->set_rules('mat', 'Materiales', 'trim|required|max_length[2000]');
		$this->form_validation->set_rules('encargado', 'Encargado', 'trim|required|max_length[24]');
		$this->form_validation->set_rules('fact', 'Factura', 'trim');
        $this->form_validation->set_rules('cot', 'Cotización', 'trim|required');
        $this->form_validation->set_rules('f_ini', 'Fecha de inicio', 'trim|required');
        $this->form_validation->set_rules('f_fin', 'Fecha de fin', 'trim');
        $this->form_validation->set_rules('total', 'Total de factura', 'trim|numeric');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$upload_image = $this->upload_image($_FILES['product_image']);

        	$data = array(
        		'CasaDepto' => $this->input->post('tipoV'),
        		'Edificio' => $this->input->post('edif'),
        		'Materiales' => $this->input->post('mat'),
        		'Factura' => $this->input->post('fact'),
                'Cotización' => $this->input->post('cot'),
                'Fecha_de_inicio' => $this->input->post('f_ini'),
                'Fecha_de_termino' => $this->input->post('f_fin'),
                'Total_f' => $this->input->post('total'),
                'Encargado' => $this->input->post('encargado'),
        	);
			
        	$create = $this->model_privada->create($data,$upload_image);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Orden creada correctamente');
        		redirect('privada/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrió un error, contacta al administrador del sistema!!');
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
			'max_size'     => '1000',                
		);
		$this->load->library('upload', $config);

		foreach ($files['name'] as $key => $image) {
			$_FILES['product_image[]']['name']= $files['name'][$key];
			$_FILES['product_image[]']['type']= $files['type'][$key];
			$_FILES['product_image[]']['tmp_name']= $files['tmp_name'][$key];
			$_FILES['product_image[]']['error']= $files['error'][$key];
			$_FILES['product_image[]']['size']= $files['size'][$key];
			$datos[]=array(
				'ruta' => $config['upload_path'].'/'.$files['name'][$key],
			);
			
			$this->upload->initialize($config);
			$this->upload->do_upload('product_image[]');
		}
		return $datos;
	}

	public function delete($id)
	{
		if(!in_array('deletePrivada', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
				$img_data= $this->model_privada->imgDelete($id);
				foreach ($img_data as $key => $value) {
					unlink($value["URL"]);
				}
				$delete = $this->model_privada->delete($id);
				if($delete == true) {
					$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
					redirect('privada/', 'refresh');
				}
				else {
					$this->session->set_flashdata('error', 'Ocurrió un error!!');
					redirect('privada/delete/'.$id, 'refresh');
				}
			}
			else {
				$this->data['id'] = $id;
				$this->render_template('privada/delete', $this->data);
			}	
		}
	}

	public function detail($id)
	{
		if(!in_array('viewPrivada', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['pictures']=$this->model_privada->img($id);
		$this->render_template('privada/detail', $this->data);
	}

	public function detalle($id)
	{
		if(!in_array('viewPrivada', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['pictures']=$this->model_privada->imgafter($id);
		$this->render_template('privada/detail', $this->data);
	}

	public function edit($id)
	{
		if(!in_array('updatePrivada', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('tipoV', 'Tipo de vivienda', 'required');
		$this->form_validation->set_rules('edif', 'Edificio', 'trim|required');
		$this->form_validation->set_rules('mat', 'Materiales', 'trim|required|max_length[2000]');
		$this->form_validation->set_rules('encargado', 'Encargado', 'trim|required|max_length[24]');
		$this->form_validation->set_rules('fact', 'Factura', 'trim');
        $this->form_validation->set_rules('cot', 'Cotización', 'trim|required');
        $this->form_validation->set_rules('f_ini', 'Fecha de inicio', 'trim|required');
        $this->form_validation->set_rules('f_fin', 'Fecha de fin', 'trim');
        $this->form_validation->set_rules('total', 'Total de factura', 'trim|numeric');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
        	if (!empty($_FILES['product_image']['name'][0]))
			{
				$upload_image = $this->upload_image($_FILES['product_image']);
			}else{
				$upload_image="";
			}

        	$data = array(
        		'CasaDepto' => $this->input->post('tipoV'),
        		'Edificio' => $this->input->post('edif'),
        		'Materiales' => $this->input->post('mat'),
        		'Factura' => $this->input->post('fact'),
                'Cotización' => $this->input->post('cot'),
                'Fecha_de_inicio' => $this->input->post('f_ini'),
                'Fecha_de_termino' => $this->input->post('f_fin'),
                'Total_f' => $this->input->post('total'),
                'Encargado' => $this->input->post('encargado'),
        	);
			
        	$create = $this->model_privada->update($id,$data,$upload_image);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Orden actualizada correctamente');
        		redirect('privada/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrió un error, contacta al administrador del sistema!!');
        		redirect('privada/edit', 'refresh');
        	}
        }else {
			$inventario_data= $this->model_privada->getDataOrdenUpdate($id);
			$img_data= $this->model_privada->getImgProd($id);
        	$this->data['orden'] = $inventario_data;
        	$this->data['imagenes'] = $img_data;
            $this->render_template('privada/update', $this->data);
        }
	}
}