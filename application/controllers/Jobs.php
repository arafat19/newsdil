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
        if($job_page_url == base_url().'jobs/')
        {
            redirect(base_url() . 'career');
        }

        $single_active_job = $this->app_user_model->get_active_job_by_page_url($job_page_url);
        $data['single_active_job'] = $single_active_job;

        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $all_active_jobs = $this->main_ui_model->get_jobs_by_is_active(); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_active_jobs'] = $all_active_jobs;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $active_testimonials = $this->main_ui_model->get_active_testimonials(); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_testimonials'] = $active_testimonials;

        $unique_session_id = md5(uniqid());
        $s_data = array(
            'session_u_id' => $unique_session_id,
            'job_id' => $single_active_job['job_id']
        );
        $this->session->set_userdata('session_data', $s_data);


        $data['title'] = $single_active_job['job_title'] . ' - Shwapno Duar IT Ltd.';
        $data['active'] = 'career';
        $data['title_area_heading_h2'] = $single_active_job['job_title'];
        $data['url_segment'] = $this->uri->segment(2);
        $data['unique_session_id'] = $unique_session_id;
        $data['job_page_url'] = $job_page_url;

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

        $all_active_jobs = $this->main_ui_model->get_jobs_by_is_active(); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_active_jobs'] = $all_active_jobs;
        $data['job_title'] = $single_active_job['job_title'];

        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $config['upload_path'] = './uploaded/job_applicants_resume'; //01534147154
        $config['allowed_types'] = 'docx|pdf|doc';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        $this->load->library('Form_validation');
        $this->form_validation->set_error_delimiters('', '');
        // field name, error message, validation rules
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('current_employer_name', 'Current Employer Name', 'trim|min_length[4]');
        $this->form_validation->set_rules('education_institute_name', 'Education Institute Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('passing_year', 'Passing year', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('last_education_degree', 'last degree', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|min_length[11]');
        $this->form_validation->set_rules('present_address', 'present address', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('last_work_experience', 'last work experience', 'trim|max_length[255]');
        $this->form_validation->set_rules('linkedin_profile', 'LinkedIn Profile', 'trim]');
        $this->form_validation->set_rules('years_of_experience', 'Years of experience', 'trim]');
        $this->form_validation->set_rules('expected_salary', 'expected salary', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('current_salary', 'Current salary', 'trim|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = $single_active_job['job_title'] . ' Application Form - Shwapno Duar IT Ltd.';
            $data['active'] = 'career';
            $data['title_area_heading_h2'] = $single_active_job['job_title'] . ' Application Form';
            $file_errors = '';
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));

            $this->load->view('index/header', $data);
            $this->load->view('jobs/application_form', $data);
            $this->load->view('index/footer', $data);
            return false;
        }
        if (!$this->upload->do_upload()) {
            $data['title'] = $single_active_job['job_title'] . ' Application Form - Shwapno Duar IT Ltd.';
            $data['active'] = 'career';
            $data['title_area_heading_h2'] = $single_active_job['job_title'] . ' Application Form';
            $file_errors = $this->upload->display_errors();
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));

            $this->load->view('index/header', $data);
            $this->load->view('jobs/application_form', $data);
            $this->load->view('index/footer', $data);

        } else {
            $data = array(
                'applicant_cv_file' => $this->upload->data('file_name'),
                'full_name' => $this->input->post('full_name'),
                'education_institute_name' => $this->input->post('education_institute_name'),
                'passing_year' => $this->input->post('passing_year'),
                'linkedin_profile' => $this->input->post('linkedin_profile'),
                'years_of_experience' => $this->input->post('years_of_experience'),
                'date_of_birth' => $this->input->post('dob'),
                'last_education_degree' => $this->input->post('last_education_degree'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile_no'),
                'present_address' => $this->input->post('present_address'),
                'last_work_experience' => $this->input->post('last_work_experience'),
                'expected_salary' => $this->input->post('expected_salary'),
                'current_salary' => $this->input->post('current_salary'),
                'applied_job_id' => $single_active_job['job_id']

            );
            $email = $this->input->post('email');
            $mobile_no = $this->input->post('mobile_no');
            if ($this->main_ui_model->exist_applicant_email($email)) {
                $this->session->set_flashdata('email_not_unique', 'Your given email address is already used.');
            } else if ($this->main_ui_model->exist_applicant_mobile_no($mobile_no)) {
                $this->session->set_flashdata('mobile_no_not_unique', 'Your given Mobile Number is already used.');
            } else {
                $this->main_ui_model->submit_job_application($data);
                $this->session->set_flashdata('resume_upload_success', 'Your Resume is successfully submitted. Our representative will contact to you soon.');
            }

            redirect(base_url() . 'jobs/apply/' . $this->uri->segment(3));
        }

        function unique_applicant_email($str)
        {
            if (!$this->main_ui_model->exist_applicant_email($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('unique_applicant_email', "%s '{$str}' already exist!");
                return FALSE;
            }
        }

        function unique_applicant_mobile_no($str)
        {
            if (!$this->main_ui_model->exist_applicant_mobile_no($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('unique_applicant_mobile_no', "%s '{$str}' already exist!");
                return FALSE;
            }
        }

    }

    function job_online_test()
    {
        // echo $job_id =  $this->uri->segment(4);
        //echo $session_id =  $this->uri->segment(5);

        $session_data = $this->session->userdata('session_data');
        $session_id = $session_data['session_u_id'];
        $job_id = $session_data['job_id'];

        $all_questions_by_job_id = $this->app_user_model->get_all_questions_by_job_id($job_id); // Reading and showing the Testimonials list from DB
        $data['all_questions_by_job_id'] = $all_questions_by_job_id;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;

        $this->load->library('Form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('news_title', 'News title', 'required');
        $data['title'] = 'Online Test - Shwapno Duar IT Ltd.';
        $data['active'] = 'career';
        $data['title_area_heading_h2'] = 'Online Test';
        $data['session_id'] = $session_id;
        $data['job_id'] = $job_id;

        $this->load->view('index/header', $data);
        $this->load->view('jobs/job_online_test', $data);
        $this->load->view('index/footer', $data);

        $old_s_data = array(
            'session_u_id' => '',
            'job_id' => ''
        );
        $this->session->unset_userdata($old_s_data);
        $this->session->sess_destroy();
        /*if ($session_id == '') {
            redirect(base_url() . 'career');
        } */

    }
}