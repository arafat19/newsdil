<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');

    }

    function index()
    {
        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('full_name', 'Your Full Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cell_number', 'This Cell Number', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('message', 'Your Message', 'trim|max_length[255]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Contact Us - Shwapno Duar IT Ltd.';
            $data['top_heading_h1'] = 'WE ARE Shwapno Duar';
            $data['top_heading_h2'] = 'SOFTWARE DEVELOPMENT & BPO COMPANY';
            $data['title_area_heading_h2'] = 'CONTACT US';
            $data['active'] = 'contacts';

            $system_config_id = 1;
            $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
            $data['all_system_configuration_ui'] = $all_system_configuration;

            $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
            $data['active_social_icons'] = $active_social_icons;

            $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
            $data['all_services'] = $all_services;


            $this->load->view('index/header', $data);
            $this->load->view('contact/body', $data);
            $this->load->view('index/footer', $data);
        } else {
            $this->submit_contact();
        }
    }

    public function submit_contact()
    {
        $is_human = $this->main_ui_model->submit_contact_request();
        if ($is_human) {
            $this->session->set_flashdata('con_success_msg', 'Email has been sent successfully');
        } else {
            $this->session->set_flashdata('con_failure_msg', 'Email has not been sent.');
        }
        redirect(base_url() . 'contact', 'refresh');
    }

    public function get_all_contacts()
    {
       return $this->main_ui_model->get_contacts();
    }

}