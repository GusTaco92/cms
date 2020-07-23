<?php 

class Model_quejas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// get the active atttributes data 
	public function getDataQuejasActivas()
	{
		$sql = "SELECT * FROM colmex_quejasSugerencias";
		$query = $this->db_b->query($sql, array(1));
		return $query->result_array();
	}

	public function eliminar($id)
	{
		$this->db_b->where('Quejas_id', $id);
		$delete = $this->db_b->delete('colmex_quejasSugerencias');
		return ($delete == true) ? true : false;
	}
}