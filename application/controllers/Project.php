<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {
        $this->url_segment = $this->uri->segment(2, 3);
        $project_page_url = base_url() . 'project/' . $this->url_segment;

        $active_project = $this->app_user_model->get_active_project_by_page_url($project_page_url);
        $data['active_project_page'] = $active_project;

        $active_project_category_id = $active_project['project_category_id'];
        $category_wise_active_project_list = $this->main_ui_model->get_project_by_project_category_is_active($active_project_category_id);
        $data['category_wise_active_project_list'] = $category_wise_active_project_list;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;


        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $data['title'] = $active_project['project_title'] . ' - Shwapno Duar IT Ltd.';
        $data['active'] = '';
        $data['title_area_heading_h2'] = $active_project['project_title'];
        $data['current_project_category_name'] = $active_project['project_category_name'];

        $this->load->view('index/header', $data);
        $this->load->view('project/body', $data);
        $this->load->view('index/footer', $data);
    }
}