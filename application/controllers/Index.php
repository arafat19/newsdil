<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_ui_model');
    }

    function index(){
        $all_services = $this->Main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;
        $data['title'] = 'Shwapno Duar IT Ltd.';
        $data['active'] = 'contacts';
        $data['top_heading_h1'] = 'WE ARE Shwapno Duar';
        $data['top_heading_h2'] = 'SOFTWARE DEVELOPMENT & BPO COMPANY';

        $this->load->view('index/header', $data);
        $this->load->view('index/body', $data);
        $this->load->view('index/footer', $data);
    }


}

