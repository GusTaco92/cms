<?php 

class Model_informesCucm extends CI_Model
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

		$this->db_bd->select('*');
		$this->db_bd->from('Interesados_cucm');
		$this->db_bd->order_by('ID', 'DESC');
        $query = $this->db_bd->get();
        return $query->result_array();
	}

    public function Interesado($id)
	{
		$this->db_bd->where('ID', $id);
		return $this->db_bd->get('Interesados_cucm');
    }
    
    public function ActualizarEstatus($id)
	{
		$this->db_bd->set('Enviado', 1);
		$this->db_bd->where('ID', $id);
		$this->db_bd->update('Interesados_cucm');
	}

	public function eliminar($id)
	{
		$this->db_bd->where('ID', $id);
		$delete = $this->db_bd->delete('Interesados_cucm');
		return ($delete == true) ? true : false;
	}
}