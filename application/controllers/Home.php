<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index(){
        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_team_members = $this->main_ui_model->get_active_team_members(); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_team_members'] = $active_team_members;

        $active_testimonials = $this->main_ui_model->get_active_testimonials(); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_testimonials'] = $active_testimonials;

        $data['title'] = 'Shwapno Duar IT Ltd.';
        $data['active'] = 'contacts';
        $data['top_heading_h1'] = 'WE ARE Shwapno Duar';
        $data['top_heading_h2'] = 'SOFTWARE DEVELOPMENT & BPO COMPANY';

        $this->load->view('index/header', $data);
        $this->load->view('index/body', $data);
        $this->load->view('index/footer', $data);
    }


}

