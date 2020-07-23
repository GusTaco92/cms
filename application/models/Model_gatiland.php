<?php 

class Model_gatiland extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// get the active atttributes data 
	public function getDataGatilandActivos()
	{
		$sql = "SELECT * FROM colmex_gatilandAportaciones";
		$query = $this->db_b->query($sql, array(1));
		return $query->result_array();
	}

    // public function Interesado($id)
	// {
	// 	$this->db_b->where('id', $id);
	// 	return $this->db_b->get('colmex_registrocostos');
    // }
    
    // public function ActualizarEstatus($id)
	// {
	// 	$this->db->set('Enviado', 'SI');
	// 	$this->db->where('id', $id);
	// 	$this->db->update('colmex_registrocostos');
	// }

	public function eliminar($id)
	{
		$this->db_b->where('Gat_id', $id);
		$delete = $this->db_b->delete('colmex_gatilandAportaciones');
		return ($delete == true) ? true : false;
	}
}