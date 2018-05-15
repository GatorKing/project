<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervacia_model extends CI_Model
{

    public function __construct()
    {

    }
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idZakaznik,Meno, TelCislo, Email');

            $query = $this->db->get_where('Zakaznik', array('idZakaznik' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idZakaznik,Meno, TelCislo, Email');

            $query = $this->db->get('Zakaznik');
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

    public function get_users_dropdown($id = ""){
        $this->db->order_by('Meno')
            ->select('idZakaznik, Meno')
            ->from('Zakaznik');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Select a user ... ';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("Zakaznik");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("Zakaznik");
    }

    public function record_count_per_user() {
        $this->db->select('Meno, COUNT(Zakaznik.id) AS counts');
        $this->db->from('Zakaznik');

        $this->db->group_by('Meno');
        return $this->db->get();
    }

    public function record_count_per_user_array() {
        $this->db->select('Meno, COUNT(Zakaznik.id) AS counts');
        $this->db->from('Zakaznik');

        $this->db->group_by('Meno');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
}

