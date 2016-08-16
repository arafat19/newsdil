<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {

        $this->url_segment = $this->uri->segment(2);
        $job_page_url = base_url() . 'jobs/' . $this->url_segment;

        $single_active_job = $this->app_user_model->get_active_job_by_page_url($job_page_url);
        $data['single_active_job'] = $single_active_job;


        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;


        $data['title'] = $single_active_job['job_title'] . ' - Shwapno Duar IT Ltd.';
        $data['active'] = 'career';
        $data['title_area_heading_h2'] = $single_active_job['job_title'];
        $data['url_segment'] = $this->uri->segment(2);

        $this->load->view('index/header', $data);
        $this->load->view('jobs/body', $data);
        $this->load->view('index/footer', $data);
    }

    function job_application()
    {
        $job_page_url = base_url() . 'jobs/' . $this->uri->segment(3);

        $single_active_job = $this->app_user_model->get_active_job_by_page_url($job_page_url);
        $data['single_active_job'] = $single_active_job;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $config['upload_path'] = './uploaded/job_applicants_resume';
        $config['allowed_types'] = 'docx|pdf|doc';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('full_name', 'Your Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('dob', 'Your Date of Birth', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('last_education_degree', 'Your last degree', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_applicant_email');
            $this->form_validation->set_rules('mobile_no', 'This Mobile Number', 'trim|required|min_length[11]|callback_unique_applicant_mobile_no');
            $this->form_validation->set_rules('present_address', 'Your present address', 'required|trim|max_length[255]');
            $this->form_validation->set_rules('last_work_experience', 'Your last work experience', 'trim|max_length[255]');
            $this->form_validation->set_rules('expected_salary', 'Your expected salary', 'trim|min_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = $single_active_job['job_title'] . ' Application Form - Shwapno Duar IT Ltd.';
                $data['active'] = 'career';
                $data['title_area_heading_h2'] = $single_active_job['job_title'] . ' Application Form';

                $this->load->view('index/header', $data);
                $this->load->view('jobs/application_form', $data);
                $this->load->view('index/footer', $data);
            }
        } else {
            $data = array(
                'applicant_cv_file' => $this->upload->data('file_name'),
                'full_name' => $this->input->post('full_name'),
                'date_of_birth' => $this->input->post('dob'),
                'last_education_degree' => $this->input->post('last_education_degree'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile_no'),
                'present_address' => $this->input->post('present_address'),
                'last_work_experience' => $this->input->post('last_work_experience'),
                'expected_salary' => $this->input->post('expected_salary'),
                'applied_job_id' => $single_active_job['job_id']

            );
            $this->main_ui_model->submit_job_application($data);
            $this->session->set_flashdata('resume_upload_success', 'Your Resume is successfully submitted. Our representative will contact to you soon.');
            redirect(base_url() . 'jobs/apply/'.$this->uri->segment(3));
        }
        function unique_applicant_email($str)
        {
            $this->load->model('app_user_model');
            if (!$this->main_ui_model->exist_applicant_email($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('unique_applicant_email', "%s '{$str}' already exist!");
                return FALSE;
            }
        }
        function unique_applicant_mobile_no($str)
        {
            $this->load->model('app_user_model');
            if (!$this->main_ui_model->exist_applicant_mobile_no($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('unique_applicant_mobile_no', "%s '{$str}' already exist!");
                return FALSE;
            }
        }
    }
}