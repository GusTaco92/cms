<?php

class Model_inventario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
    }
    
    public function getData()
    {
        $sql = "SELECT * FROM inventario";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
    }

    public function getDepto()
    {
        $sql = "SELECT * FROM departamento WHERE depto_activo = 1";
		$query = $this->db->query($sql, array(1));
        
        $this->db->select('depto_id, depto_nombre, firstname, lastname');
        $this->db->from('departamento');
        $this->db->join('users', 'users.id = departamento.depto_responsable');
        $query = $this->db->get();
        return $query->result();
    }
}
?>