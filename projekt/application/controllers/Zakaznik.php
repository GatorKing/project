<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Zakaznik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Zakaznik_model');
}

public function index(){
    $data = array();

    if($this->session->userdata('success_msg')){
        $data['success_msg'] = $this->session->userdata('success_msg');
        $this->session->unset_userdata('success_msg');
    }
    if($this->session->userdata('error_msg')){
        $data['error_msg'] = $this->session->userdata('error_msg');
        $this->session->unset_userdata('error_msg');
    }
    $data['zakaznik'] = $this->Zakaznik_model->getRows();
    $data['title'] = 'Zakaznik List';

    $this->load->view('templates/template/header', $data);
    $this->load->view('Zakaznik/index', $data);
    $this->load->view('templates/template/footer');
}

    public function view($id)
    {
        $data = array();

        if (!empty($id)) {
            $data['zakaznik'] = $this->Zakaznik_model->getRows($id);
            $data['title'] = $data['temperatures']['measurement_date'];

            $this->load->view('templates/template/header', $data);
            $this->load->view('Zakaznik/view', $data);
            $this->load->view('templates/template/footer');
        } else {
            redirect('/zakaznik');

        }
    }

    public function add(){
        $data = array();
        $postData = array();

        if($this->input->post('postSubmit')){

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

            if($this->form_validation->run() == true){

                $insert = $this->Zakaznik_model->insert($postData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Zakaznik
bol uspesne pridany');
                    redirect('/zakaznik');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try
again.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create Zakaznik';
        $data['action'] = 'Add';

        $this->load->view('templates/template/header', $data);
        $this->load->view('temperatures/create-edit', $data);
        $this->load->view('templates/template/footer');
    }
}