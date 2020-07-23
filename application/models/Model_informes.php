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
		$sql = "SELECT * FROM colmex_registrocostos";
		$query = $this->db_b->query($sql, array(1));
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