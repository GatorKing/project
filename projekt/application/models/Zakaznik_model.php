<?php
class Zakaznik_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    function getRows($id= "") {
        if(!empty($id)){
            $query = $this->db->get_where('zakaznik', array('idZakaznik' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('zakaznik');
            return $query->result_array();
        }
    }


    public function insert($data = array()) {
        $insert = $this->db->insert('zakaznik', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;}}

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('zakaznik', $data,
                array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('zakaznik',array('id'=>$id));
        return $delete?true:false;
    }
}