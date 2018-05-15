<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sportoviska extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Sportoviska_model');

        $this->load->library('pagination');
    }

    public function index() {
        $data = array();

        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['zakaznik'] = $this->Sportoviska_model->getRows();
        $data['title'] = 'Sportoviska List';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Sportoviska/index', $data);
        $this->load->view('templates/template/footer');
    }

    public function view($idSportoviska) {
        $data = array();

        if (!empty($idSportoviska)) {
            $data['zakaznik'] = $this->Sportoviska_model->getRows($idSportoviska);
            $data['title'] = $data['Sportoviska']['idSportoviska'];

            $this->load->view('templates/template/header', $data);
            $this->load->view('Sportoviska/view', $data);
            $this->load->view('templates/template/footer');
        } else {
            redirect('/sportoviska');

        }
    }

    public function index_pagination(){
        $data = array();

        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $config = array();
        $config["base_url"] = base_url() . "index.php/Zakaznik/index_pagination";
        $config["total_rows"] = $this->Zakaznik_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $this->Zakaznik_model->record_count();
        $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 0;
        }
        $data["temperatures"] = $this->Zakaznik_model->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['records_per_user'] = $this->Zakaznik_model->record_count_per_user();
        $data['json_records_per_user'] = json_encode($this->Zakaznik_model->record_count_per_user_array());
        $data['zakaznik'] = $this->Zakaznik_model->getRows();
        $data['title'] = 'Zakaznik List';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Zakaznik/index_pagination', $data);
        $this->load->view('templates/template/footer');
    }

    public function json_records_per_user() {
        $data = $this->Zakaznik_model->record_count_per_user_array();

        $responce = nil;
        $responce->cols[] = array(
            "id" => "",
            "label" => "User",
            "pattern" => "",
            "type" => "string"
        );
        $responce->cols[] = array(
            "id" => "",
            "label" => "Counts",
            "pattern" => "",
            "type" => "number"
        );
        foreach($data as $row)
        {
            $responce->rows[]["c"] = array(
                array(
                    "v" => $row['user'],
                    "f" => null
                ) ,
                array(
                    "v" => (int)$row['counts'],
                    "f" => null
                )
            );
        }
        echo json_encode($responce);
    }

    public function add()
    {
        $data = array();
        $postData = array();

        if ($this->input->post('postSubmit')) {

            $this->form_validation->set_rules('idSportoviska', 'idSportoviska', 'required');
            $this->form_validation->set_rules('Objekt', 'Objekt',
                'required');
            $this->form_validation->set_rules('otvorene_od', 'otvorene_od', 'required');
            $this->form_validation->set_rules('otvorene_do', 'otvorene_do', 'required');

            $postData = array(
                'idZakaznik' => $this->input->post('idSportoviska'),
                'Meno' => $this->input->post('Objekt'),
                'TelCislo' => $this->input->post('otvorene_od'),
                'Email' => $this->input->post('otvorene_do'),

            );

            if ($this->form_validation->run() == true) {

                $insert = $this->Sportoviska_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Zakaznik
bol uspesne pridany');
                    redirect('index.php/sportoviska');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['users'] = $this->Sportoviska_model->get_users_dropdown();
        $data['users_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Create Sportoviska';
        $data['action'] = 'Add';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Sportoviska/create', $data);
        $this->load->view('templates/template/footer');
    }

    public function edit($id)
    {
        $data = array();

        $postData = $this->Sportoviska_model->getRows($id);

        if ($this->input->post('postSubmit')) {

            $this->form_validation->set_rules('idSportoviska', 'idSportoviska', 'required');
            $this->form_validation->set_rules('Objekt', 'meno zakaznika', 'required');
            $this->form_validation->set_rules('otvorene_od', 'otvorene_od', 'required');
            $this->form_validation->set_rules('otvorene_do', 'otvorene_do', 'required');

            $postData = array(
                'idSportoviska' => $this->input->post('idSportoviska'),
                'Objekt' => $this->input->post("Objekt"),
                'otvorene_od' => $this->input->post('otvorene_od'),
                'otvorene_do' => $this->input->post('otvorene_do'),

            );

            if ($this->form_validation->run() == true) {

                $update = $this->Sportoviska_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Sportoviska
has been updated successfully.');
                    redirect('/Sportoviska');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['users'] = $this->Sportoviska_model->get_users_dropdown();
        $data['users_selected'] = $postData['user'];
        $data['post'] = $postData;
        $data['title'] = 'Update Sportoviska';
        $data['action'] = 'Edit';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Sportoviska/edit', $data);
        $this->load->view('templates/template/footer');

    }

    public function delete($id){

        if($id){

            $delete = $this->Sportoviska_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Zakaznik has
been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems
occurred, please try again.');
            }
        }
        redirect('/Sportoviska');
    }

}