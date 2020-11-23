<?php 

class Model_informes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// get the active atttributes data 
	public function getDataInformesActivos()
	{
		// $sql = "SELECT * FROM colmex_registrocostos where LIKE %?%";
		// $query = $this->db_b->query($sql, array($this->session->userdata('seccion')));
		// return $query->result_array();

		$this->db_b->select('*');
		$this->db_b->from('colmex_registrocostos');
		if(!empty($this->session->userdata('seccion'))){
			$contador= explode(",",$this->session->userdata('seccion'));
			foreach ($contador as $key => $secciones) {
				if($key == 0){
					$this->db_b->like('nivelE', trim($secciones));
				}else{
					$this->db_b->or_like('nivelE', trim($secciones));
				}
			}
		}
		$this->db_b->order_by('id', 'DESC');
        $query = $this->db_b->get();
        return $query->result_array();
	}

    public function Interesado($id)
	{
		$this->db_b->where('id', $id);
		return $this->db_b->get('colmex_registrocostos');
    }
    
    public function ActualizarEstatus($id)
	{
		$this->db_b->set('Enviado', 'SI');
		$this->db_b->where('id', $id);
		$this->db_b->update('colmex_registrocostos');
	}

	public function eliminar($id)
	{
		$this->db_b->where('id', $id);
		$delete = $this->db_b->delete('colmex_registrocostos');
		return ($delete == true) ? true : false;
	}
}