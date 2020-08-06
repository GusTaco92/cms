<?php 

class Inventario extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Inventario';
		$this->load->model('model_inventario');
	}

	
	public function index()
	{
		if(!in_array('viewInforme', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$informe_data = $this->model_informes->getDataInformesActivos();

		$result = array();
		foreach ($informe_data as $k => $v) {
			$result[$k]['user_info'] = $v;
		}
		$this->data['informe_data'] = $result;
		$this->render_template('informes/index', $this->data);
    }
    
    public function create()
    {
        if(!in_array('createInventario', $this->permission)) {
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
        	$ordenes_data = $this->model_inventario->getData();
        	$depto_data = $this->model_inventario->getDepto();
        	$inventario_finalData = array();
        	foreach ($ordenes_data as $k => $v) {
        		$inventario_finalData[$k]['inventario_data'] = $v;
        	}
        	$this->data['inventario'] = $inventario_finalData;	
        	$this->data['departamento'] = $depto_data;	
            $this->render_template('inventario/create', $this->data);
        }
    }


	public function delete($id)
	{
		if(!in_array('deleteInforme', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_informes->eliminar($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
		        		redirect('informes/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Ocurrió un error!!');
		        		redirect('informes/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('informes/delete', $this->data);
			}	
		}
	}
}