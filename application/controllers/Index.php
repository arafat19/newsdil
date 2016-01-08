<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_ui_model');
        $this->load->model('App_user_model');
    }

    function index(){
        $all_services = $this->Main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $system_config_id = 1;
        $all_system_configuration = $this->App_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $data['title'] = 'Shwapno Duar IT Ltd.';
        $data['active'] = 'contacts';
        $data['top_heading_h1'] = 'WE ARE Shwapno Duar';
        $data['top_heading_h2'] = 'SOFTWARE DEVELOPMENT & BPO COMPANY';

        $this->load->view('index/header', $data);
        $this->load->view('index/body', $data);
        $this->load->view('index/footer', $data);
    }


}

