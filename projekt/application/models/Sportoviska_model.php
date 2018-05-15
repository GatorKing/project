<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sportoviska_model extends CI_Model
{

    public function __construct()
    {

    }
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idSportoviska, Objekt, otvorene_od, otvorene_do, adresa');

            $query = $this->db->get_where('Sportoviska', array('idSportoviska' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idSportoviska, Objekt, otvorene_od, otvorene_do, adresa');

            $query = $this->db->get('Sportoviska');
            return $query->result_array();
        }
    }


    public function insert($data = array()) {
        $insert = $this->db->insert('Sportoviska', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;}}

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('Sportoviska', $data,
                array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('Sportoviska',array('id'=>$id));
        return $delete?true:false;
    }

    public function get_users_dropdown($id = ""){
        $this->db->order_by('Objekt')
            ->select('idSportoviska, Objekt')
            ->from('Sportoviska');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Vyber sportovisko ';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("Sportovisko");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("Sportovisko");
    }

    public function record_count_per_user() {
        $this->db->select('Objekt, COUNT(idSportovisko) AS counts');
        $this->db->from('Sportovisko');

        $this->db->group_by('Objekt');
        return $this->db->get();
    }

    public function record_count_per_user_array() {
        $this->db->select('Objekt, COUNT(idSportovisko) AS counts');
        $this->db->from('Sportovisko');

        $this->db->group_by('Objekt');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
}

