<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');

    }

    function index()
    {
        $company_overviews = $this->app_user_model->get_company_overview_by_id(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['company_overviews'] = $company_overviews;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $data['title'] = 'About Us - Shwapno Duar IT Ltd.';
        $data['top_heading_h1'] = 'WE ARE Shwapno Duar';
        $data['top_heading_h2'] = 'SOFTWARE DEVELOPMENT & BPO COMPANY';
        $data['title_area_heading_h2'] = 'Company Overview';
        $data['active'] = 'about';

        $this->load->view('index/header', $data);
        $this->load->view('about/body', $data);
        $this->load->view('index/footer', $data);
    }
}