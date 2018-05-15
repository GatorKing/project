<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervacia extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Zakaznik_model');

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
        $data['zakaznik'] = $this->Zakaznik_model->getRows();
        $data['title'] = 'Zakaznik List';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Zakaznik/index', $data);
        $this->load->view('templates/template/footer');
    }

    public function view($idZakaznik) {
        $data = array();

        if (!empty($idZakaznik)) {
            $data['zakaznik'] = $this->Zakaznik_model->getRows($idZakaznik);
            $data['title'] = $data['Zakaznik']['idZakaznik'];

            $this->load->view('templates/template/header', $data);
            $this->load->view('Zakaznik/view', $data);
            $this->load->view('templates/template/footer');
        } else {
            redirect('/zakaznik');

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

            $this->form_validation->set_rules('idZakaznik', 'id zakaznika', 'required');
            $this->form_validation->set_rules('Meno', 'Meno',
                'required');
            $this->form_validation->set_rules('TelCislo', 'Telefonne Cislo', 'required');
            $this->form_validation->set_rules('Email', 'email', 'required');

            $postData = array(
                'idZakaznik' => $this->input->post('idZakaznik'),
                'Meno' => $this->input->post('Meno'),
                'TelCislo' => $this->input->post('TelCislo'),
                'Email' => $this->input->post('Email'),
                'description' => $this->input->post('description'),
            );

            if ($this->form_validation->run() == true) {

                $insert = $this->Zakaznik_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Zakaznik
bol uspesne pridany');
                    redirect('/zakaznik');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['users'] = $this->Zakaznik_model->get_users_dropdown();
        $data['users_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Create Zakaznik';
        $data['action'] = 'Add';

        $this->load->view('templates/template/header', $data);
        $this->load->view('temperatures/create', $data);
        $this->load->view('templates/template/footer');
    }

    public function edit($id)
    {
        $data = array();

        $postData = $this->Zakaznik_model->getRows($id);

        if ($this->input->post('postSubmit')) {

            $this->form_validation->set_rules('idZakaznik', 'id Zakaznika', 'required');
            $this->form_validation->set_rules('Meno', 'meno zakaznika', 'required');
            $this->form_validation->set_rules('TelCislo', 'telefonne cislo', 'required');
            $this->form_validation->set_rules('Email', 'email', 'required');

            $postData = array(
                'idZakaznik' => $this->input->post('idZakaznik'),
                'Meno' => $this->input->post("Meno"),
                'TelCislo' => $this->input->post('TelCislo'),
                'Email' => $this->input->post('Email'),
                'description' => $this->input->post('description'),
            );

            if ($this->form_validation->run() == true) {

                $update = $this->Zakaznik_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Zakaznik
has been updated successfully.');
                    redirect('/Zakaznik');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['users'] = $this->Zakaznik_model->get_users_dropdown();
        $data['users_selected'] = $postData['user'];
        $data['post'] = $postData;
        $data['title'] = 'Update Zakaznik';
        $data['action'] = 'Edit';

        $this->load->view('templates/template/header', $data);
        $this->load->view('Zakaznik/edit', $data);
        $this->load->view('templates/template/footer');

    }

    public function delete($id){

        if($id){

            $delete = $this->Zakaznik_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Zakaznik has
been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems
occurred, please try again.');
            }
        }
        redirect('/Zakaznik');
    }

}