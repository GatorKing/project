<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervacia_model extends CI_Model
{

    public function __construct()
    {

    }
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idRezervacia, cas_od  cas_do, den, sposob_platby, Zakaznik_idZakaznik');

            $query = $this->db->get_where('rezervacia', array('idRezervacia' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idRezervacia, cas_od, cas_do, sposob_platby, Zakaznik_idZakaznik');

            $query = $this->db->get('rezervacia');
            return $query->result_array();
        }
    }


    public function insert($data = array()) {
        $insert = $this->db->insert('rezervacia', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;}}

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('rezervacia', $data,
                array('idRezervacia'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('rezervacia',array('idRezervacia'=>$id));
        return $delete?true:false;
    }

    public function get_users_dropdown($id = ""){
        $this->db->order_by('den')
            ->select('idRezervacia, den')
            ->from('rezervacia');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Vytvor rezervaciu';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("rezervacia");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("rezervacia");
    }

    public function record_count_per_user() {
        $this->db->select('Den, COUNT(idRezervacia) AS counts');
        $this->db->from('rezervacia');

        $this->db->group_by('Den');
        return $this->db->get();
    }

    public function record_count_per_user_array() {
        $this->db->select('Den, COUNT(idRezervacia) AS counts');
        $this->db->from('rezervacia');

        $this->db->group_by('Den');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
}

