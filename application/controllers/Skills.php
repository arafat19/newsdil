<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {
        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $active_skills = $this->main_ui_model->get_active_skills();
        $data['active_skills'] = $active_skills;

        $data['title'] = 'Our Skills - Shwapno Duar IT Ltd.';
        $data['active'] = 'our_skills';
        $data['title_area_heading_h2'] = 'Our Skills';

        $this->load->view('index/header', $data);
        $this->load->view('skills/body', $data);
        $this->load->view('index/footer', $data);
    }
}