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
        // return ($delete == true) ? true : false;
        return $this->db->trans_complete();
    }

}