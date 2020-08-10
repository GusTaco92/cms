<?php

class Model_inventario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
    }
    
    public function getData()
    { 
        $this->db->select('*');
        $this->db->from('inventario');
        $this->db->join('departamento', 'departamento.depto_id = inventario.inv_depto_id');
        // $this->db->join('inventario_evidencia', 'inventario_evidencia.id_inv = inventario.inv_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataProd($id)
    { 
        $this->db->select('*');
        $this->db->from('inventario');
        $this->db->join('departamento', 'departamento.depto_id = inventario.inv_depto_id');
        $this->db->where('inv_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getImgProd($id)
    { 
        $this->db->select('*');
        $this->db->from('inventario_evidencia');
        $this->db->where('id_inv', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDepto()
    {
        // $sql = "SELECT * FROM departamento WHERE depto_activo = 1";
		// $query = $this->db->query($sql, array(1));
        
        $this->db->select('depto_id, depto_nombre, firstname, lastname');
        $this->db->from('departamento');
        $this->db->join('users', 'users.id = departamento.depto_responsable');
        $query = $this->db->get();
        return $query->result();
    }

    public function create($data,$url)
    {
        $this->db->trans_start();
        if($data) {
            $insert = $this->db->insert('inventario', $data);
            $insert_id = $this->db->insert_id();
            
            foreach ($url as $key => $imgload) {
				$img=array(
                    'id_inv'=>$insert_id,
                    'inv_URL'=>$imgload['ruta'],
                    'inv_Tipo' => 1,
                );
                $insert = $this->db->insert('inventario_evidencia', $img);
			}
        }    
        return $this->db->trans_complete();
    }

    public function update($id,$data,$url)
    {
        $this->db->trans_start();
        if($data) {
            $this->db->where('inv_id', $id);
            $this->db->update('inventario', $data);
            if(!empty($url)){
                $this->db->where('id_inv', $id);
                $this->db->delete('inventario_evidencia');
                foreach ($url as $key => $imgload) {
                	$img=array(
                        'id_inv'=>$id,
                        'inv_URL'=>$imgload['ruta'],
                        'inv_Tipo' => 1,
                    );
                    $insert = $this->db->insert('inventario_evidencia', $img);
                }
            }
        }    
        return $this->db->trans_complete();
    }

    public function img($id)
	{
		$sql = "SELECT * FROM inventario_evidencia WHERE id_inv = ?";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
    }
    
    public function delete($id)
    {
        $this->db->trans_start();
        $this->db->where('inv_id', $id);
		$delete = $this->db->delete('inventario');
        $this->db->where('id_inv', $id);
		$delete = $this->db->delete('inventario_evidencia');
        // return ($delete == true) ? true : false;
        return $this->db->trans_complete();
    }
}
?>