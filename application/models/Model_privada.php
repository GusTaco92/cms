<?php 

class Model_privada extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// get the active ordenes data 
	public function getOrdenesData()
	{
		$sql = "SELECT * FROM Privada_Ordenes";
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    
	public function getDataOrdenUpdate($id)
	{
		$this->db->select('*');
        $this->db->from('Privada_Ordenes');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
	}

    public function create($data,$url)
    {
        $this->db->trans_start();
        if($data) {
            $insert = $this->db->insert('Privada_Ordenes', $data);
            $insert_id = $this->db->insert_id();
            
            foreach ($url as $key => $imgload) {
				$img=array(
                    'id_ordenes'=>$insert_id,
                    'URL'=>$imgload['ruta'],
                    'Tipo' => 1,
                );
                $insert = $this->db->insert('Privada_OrdenesEvidencia', $img);
			}
        }    
        return $this->db->trans_complete();
    }

    public function delete($id)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
		$delete = $this->db->delete('Privada_Ordenes');
        $this->db->where('id_ordenes', $id);
		$delete = $this->db->delete('Privada_OrdenesEvidencia');
        return $this->db->trans_complete();
    }

    public function imgDelete($id)
	{
		$sql = "SELECT * FROM Privada_OrdenesEvidencia WHERE id_ordenes = ?";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
    }

    public function img($id)
	{
		$sql = "SELECT * FROM Privada_OrdenesEvidencia WHERE id_ordenes = ? and Tipo = 1";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
    }
    
    public function imgafter($id)
	{
		$sql = "SELECT * FROM Privada_OrdenesEvidencia WHERE id_ordenes = ? and Tipo = 0";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
    }
    
    public function getImgProd($id)
    { 
        $this->db->select('*');
        $this->db->from('Privada_OrdenesEvidencia');
        $this->db->where('id_ordenes', $id);
        $this->db->where('Tipo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function update($id,$data,$url)
    {
        $this->db->trans_start();
        if($data) {
            $this->db->where('id', $id);
            $this->db->update('Privada_Ordenes', $data);
            if(!empty($url)){
                $this->db->where('id_ordenes', $id);
                $this->db->where('Tipo', 0);
                $this->db->delete('Privada_OrdenesEvidencia');
                foreach ($url as $key => $imgload) {
                	$img=array(
                        'id_ordenes'=>$id,
                        'URL'=>$imgload['ruta'],
                        'Tipo' => 0,
                    );
                    $insert = $this->db->insert('Privada_OrdenesEvidencia', $img);
                }
            }
        }    
        return $this->db->trans_complete();
    }
}