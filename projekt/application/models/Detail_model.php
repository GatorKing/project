<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends CI_Model
{

    public function __construct()
    {

    }
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('Rezervacia_idRezervacia, Sportoviska_idSportoviska, idDetail, cena_hod, obsadene');

            $query = $this->db->get_where('detail', array('idDetail' => $id));
            return $query->row_array();
        }else{
            $this->db->select('Rezervacia_idRezervacia, Sportoviska_idSportoviska, idDetail, cena_hod, obsadene');

            $query = $this->db->get('detail');
            return $query->result_array();
        }
    }


    public function insert($data = array()) {
        $insert = $this->db->insert('detail', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;}}

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('detail', $data,
                array('idDetail'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('detail',array('idDetail'=>$id));
        return $delete?true:false;
    }

    public function get_users_dropdown($id = ""){
        $this->db->order_by('cena_hod')
            ->select('idDetail, cena_hod')
            ->from('detail');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Detail';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get("detail");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all("detail");
    }

    public function record_count_per_user() {
        $this->db->select('cena_hod, COUNT(idDetail) AS counts');
        $this->db->from('detail');

        $this->db->group_by('cena_hod');
        return $this->db->get();
    }

    public function record_count_per_user_array() {
        $this->db->select('cena_hod, COUNT(idDetail) AS counts');
        $this->db->from('detail');

        $this->db->group_by('cena_hod');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
}