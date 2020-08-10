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
		if(!in_array('viewInventario', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$inventario_data = $this->model_inventario->getData();
		$this->data['inventario_data'] = $inventario_data;
		$this->render_template('inventario/index', $this->data);
    }
    
    public function create()
    {
        if(!in_array('createInventario', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if (empty($_FILES['product_image']['name'][0]))
		{
			$this->form_validation->set_rules('product_image', 'Imagen(es)', 'required');
		}
		$this->form_validation->set_rules('departamento', 'Departamento', 'required');
		$this->form_validation->set_rules('marca', 'Marca', 'trim|required');
		$this->form_validation->set_rules('modelo', 'Modelo', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
        $this->form_validation->set_rules('barras', 'Código de barras', 'trim|max_length[25]');
        $this->form_validation->set_rules('serie', 'Número de serie', 'trim|max_length[25]');
        $this->form_validation->set_rules('importe', 'Importe', 'trim|required|numeric');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$upload_image = $this->upload_image($_FILES['product_image']);

        	$data = array(
        		'inv_depto_id' => $this->input->post('departamento'),
        		'inv_marca' => $this->input->post('marca'),
        		'inv_modelo' => $this->input->post('modelo'),
        		'inv_descripcion' => $this->input->post('descripcion'),
                'inv_codigoB' => $this->input->post('barras'),
                'inv_serie' => $this->input->post('serie'),
                'inv_importe' => $this->input->post('importe'),                
        	);
        	$create = $this->model_inventario->create($data,$upload_image);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Guardado correctamente');
        		redirect('inventario/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrió un error, contacta al administrador del sistema!!');
        		redirect('inventario/create', 'refresh');
        	}
        }else {
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

	private function upload_image($files)
	{
		$config = array(
			'upload_path'   => 'assets/images/inventario',
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
		if(!in_array('deleteInventario', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_inventario->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
		        		redirect('inventario/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Ocurrió un error!!');
		        		redirect('inventario/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('inventario/delete', $this->data);
			}	
		}
	}

	public function detail($id)
	{
		if(!in_array('viewInventario', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['pictures']=$this->model_inventario->img($id);
		$this->render_template('inventario/detail', $this->data);
	}

	public function update($id)
	{
		if(!in_array('updateInventario', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('departamento', 'Departamento', 'required');
		$this->form_validation->set_rules('marca', 'Marca', 'trim|required');
		$this->form_validation->set_rules('modelo', 'Modelo', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
        $this->form_validation->set_rules('barras', 'Código de barras', 'trim|max_length[25]');
        $this->form_validation->set_rules('serie', 'Número de serie', 'trim|max_length[25]');
        $this->form_validation->set_rules('importe', 'Importe', 'trim|required|numeric');
		
	
        if ($this->form_validation->run() == TRUE) {
			// true case
			if (!empty($_FILES['product_image']['name'][0]))
			{
				$upload_image = $this->upload_image($_FILES['product_image']);
			}else{
				$upload_image="";
			}

        	$data = array(
        		'inv_depto_id' => $this->input->post('departamento'),
        		'inv_marca' => $this->input->post('marca'),
        		'inv_modelo' => $this->input->post('modelo'),
        		'inv_descripcion' => $this->input->post('descripcion'),
                'inv_codigoB' => $this->input->post('barras'),
                'inv_serie' => $this->input->post('serie'),
                'inv_importe' => $this->input->post('importe'),                
        	);
        	$create = $this->model_inventario->update($id,$data,$upload_image);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Actualizado correctamente');
        		redirect('inventario/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrió un error, contacta al administrador del sistema!!');
        		redirect('inventario/update', 'refresh');
        	}
        }else {
			$depto_data = $this->model_inventario->getDepto();
			$inventario_data= $this->model_inventario->getDataProd($id);
			$img_data= $this->model_inventario->getImgProd($id);
        	$this->data['departamento'] = $depto_data;
        	$this->data['producto'] = $inventario_data;
        	$this->data['imagenes'] = $img_data;
            $this->render_template('inventario/edit', $this->data);
        }
	}
}