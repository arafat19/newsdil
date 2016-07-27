<?php
/**
 * Created by PhpStorm.
 * User: arafat
 * Date: 4/26/16
 * Time: 4:05 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public static $title = 'Admin LogIn - Shwapno Duar IT Ltd';

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {
        if (($this->session->userdata('user_email') != "")) {
            $this->welcome_admin_dashboard();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules

            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_not_found_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = Admin::$title;
                $this->load->view('admin/header_view', $data);
                $this->load->view('admin/admin_login_index_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $result = $this->app_user_model->login($email, $password);
                //echo $result;
                if ($result) {
                    $this->welcome_admin_dashboard();
                } else {
                    $data['title'] = 'Wrong Email or Password - Shwapno Duar IT Ltd.';
                    $data['wrong_pass'] = 'Wrong Email or Password!';
                    $this->load->view('admin/header_view', $data);
                    $this->load->view('admin/admin_login_index_wrong_view', $data);
                    $this->load->view('admin/footer_view', $data);
                }
            }

        }
    }

    public function welcome_admin_dashboard()
    {
        $data['title'] = 'Welcome SDIL Admin Panel - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['full_name'] = $this->session->userdata('full_name');
        $data['active'] = 'dashboard';
        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_dashboard_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function add_company_skill_category()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('skill_category_name', 'Skill Category Name', 'required|trim|min_length[2]|callback_unique_skill_category_name');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Company Skill Category - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'other_page';
                $data['common_header'] = 'Add Company Skill Category';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_skill_category();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_company_skill_category';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_skill_category = $this->app_user_model->get_all_skill_category($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_skill_category'] = $all_skill_category;
                $data['list_title'] = 'Company Skill Category List';


                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_company_skill_category_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'skill_category_name' => $this->input->post('skill_category_name'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_skill_category($data);
                $this->session->set_flashdata('add_success', 'Company skill category is successfully added');
                redirect(base_url() . 'admin/add/company/skill/category');
            }
        }
    }

    public function update_company_skill_category($skill_cat_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $skill_cat_id_dec = base64_decode($skill_cat_id);
            $single_skill_cat = $this->app_user_model->get_single_skill_cat_by_id($skill_cat_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_skill_cat_name_db = $single_skill_cat["skill_category_name"];
            $single_skill_cat_name = $this->input->post('skill_category_name');
            if ($single_skill_cat_name_db != $single_skill_cat_name) {
                $this->form_validation->set_rules('skill_category_name', 'Skill Category Name', 'required|trim|min_length[2]|callback_unique_skill_category_name');
            } else {
                $this->form_validation->set_rules('skill_category_name', 'Skill Category Name', 'required|trim|min_length[2]');
            }
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Company Skill Category - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'other_page';
                $data['common_header'] = 'Update Company Skill Category';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_skill_cat'] = $single_skill_cat;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_company_skill_cat_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'skill_category_name' => $this->input->post('skill_category_name'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_skill_cat($data, $skill_cat_id_dec);
                $this->session->set_flashdata('skill_cat_update_message', "Selected Skill Category is updated successfully.");
                redirect(base_url() . 'admin/add/company/skill/category');
            }
        }
    }


    public function delete_company_skill_category($skill_cat_id)
    {
        $skill_cat_id_dec = base64_decode($skill_cat_id);
        $single_skill_cat = $this->app_user_model->get_single_skill_cat_by_id($skill_cat_id_dec);
        $is_active = $single_skill_cat["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Company skill category can not be deleted.');
        } else {
            $this->app_user_model->delete_company_skill_category($skill_cat_id_dec);
            $this->session->set_flashdata('skill_cat_delete_message', 'Selected Skill category is successfully deleted.');
        }
        redirect(base_url() . 'admin/add/company/skill/category');
    }


    public function add_company_skills()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('skill_category_name', 'Skill Category Name', 'required');
            $this->form_validation->set_rules('skill_name', 'Skill Name', 'required|trim|min_length[4]|callback_unique_skill_name');
            $this->form_validation->set_rules('skill_description', 'Skill description', 'trim|min_length[2]');
            $this->form_validation->set_rules('skill_percentage', 'Skill Percentage', 'required|trim|min_length[1]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Company Skills - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'other_page';
                $data['common_header'] = 'Add Company Skills';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_skills();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_company_skills';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_skills = $this->app_user_model->get_all_skills($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_skills'] = $all_skills;
                $data['list_title'] = 'Company Skill List';

                $active_skill_category = $this->main_ui_model->get_active_skill_category(); // Reading and showing Only the Active project category list from DB by setting is_active = 1
                $data['active_skill_category'] = $active_skill_category;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_company_skill_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'skill_category_id' => $this->input->post('skill_category_name'),
                    'skill_name' => $this->input->post('skill_name'),
                    'skill_description' => $this->input->post('skill_description'),
                    'skill_percentage' => $this->input->post('skill_percentage'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_skills($data);
                $this->session->set_flashdata('add_success', 'Company skill is successfully added');
                redirect(base_url() . 'admin/add/company/skills');
            }
        }
    }

    public function update_company_skills($skill_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $skill_id_dec = base64_decode($skill_id);
            $single_skill = $this->app_user_model->get_single_skill_by_id($skill_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_skill_name_db = $single_skill["skill_name"];
            $single_skill_name = $this->input->post('skill_name');
            if ($single_skill_name_db != $single_skill_name) {
                $this->form_validation->set_rules('skill_name', 'Skill Name', 'required|trim|min_length[4]|callback_unique_skill_name');
            } else {
                $this->form_validation->set_rules('skill_name', 'Skill Name', 'required|trim|min_length[4]');
            }
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Company Skills - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'other_page';
                $data['common_header'] = 'Update Company Skills';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_skill'] = $single_skill;

                $active_skill_category = $this->main_ui_model->get_active_skill_category(); // Reading and showing Only the Active project category list from DB by setting is_active = 1
                $data['active_skill_category'] = $active_skill_category;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_company_skill_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'skill_category_id' => $this->input->post('skill_category_name'),
                    'skill_name' => $this->input->post('skill_name'),
                    'skill_description' => $this->input->post('skill_description'),
                    'skill_percentage' => $this->input->post('skill_percentage'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_skill($data, $skill_id_dec);
                $this->session->set_flashdata('skill_update_message', "Selected Skill is updated successfully.");
                redirect(base_url() . 'admin/add/company/skills');
            }
        }
    }


    public function delete_company_skills($skill_id)
    {
        $skill_id_dec = base64_decode($skill_id);
        $single_skill = $this->app_user_model->get_single_skill_by_id($skill_id_dec);
        $is_active = $single_skill["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Company skill can not be deleted.');
        } else {
            $this->app_user_model->delete_company_skill($skill_id_dec);
            $this->session->set_flashdata('skill_delete_message', 'Selected Skill is successfully deleted.');
        }
        redirect(base_url() . 'admin/add/company/skills');
    }


    public function show_single_applicant($applicant_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {

            $data['title'] = 'Single Applicant Details - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'career';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['common_header'] = 'Single Applicant Details';

            $applicant_id_dec = base64_decode($applicant_id);
            $single_applicant = $this->app_user_model->get_single_applicant_by_id($applicant_id_dec);
            $data['single_applicant'] = $single_applicant;

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_single_applicant_view', $data);
            $this->load->view('admin/footer_view', $data);
        }
    }

    public function show_all_applicants()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {

            $data['title'] = 'All Applicants List - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'career';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['common_header'] = 'All Applicants List';

            /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
            $config['total_rows'] = $this->app_user_model->total_count_of_applicants();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['base_url'] = base_url() . 'admin/show_all_applicants';
            $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data['paginglinks'] = $this->pagination->create_links();

            $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
            $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;

            $data['cur'] = $this->pagination->cur_page;

            // Showing total rows count
            if ($data['paginglinks'] != '') {
                $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
            }

            /*=================================================
                End of Pagination Code segment for service page
           ===================================================*/

            $all_applicants_obj = $this->app_user_model->get_all_applicants($config["per_page"], $offset);
            $data['all_applicants'] = $all_applicants_obj;


            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_all_applicants_list_view', $data);
            $this->load->view('admin/footer_view', $data);
        }
    }

    public function delete_job_applicant($applicant_id)
    {
        $applicant_id_dec = base64_decode($applicant_id);
        $single_applicant = $this->app_user_model->get_single_applicant_by_id($applicant_id_dec);
        $applicant_cv_file = $single_applicant["applicant_cv_file"];
        $path = "./uploaded/job_applicants_resume/" . $applicant_cv_file;
        unlink($path);
        $this->app_user_model->delete_applicant($applicant_id_dec);
        $this->session->set_flashdata('applicant_delete_message', 'Selected Applicant is successfully deleted with resume file.');
        redirect(base_url() . 'admin/job/applicants');
    }


    public function add_job()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('job_type', 'Please select a Job type', 'required');
            $this->form_validation->set_rules('job_title', 'Job title', 'required|trim|min_length[4]|callback_unique_job_title');
            $this->form_validation->set_rules('job_page_url', 'Job Page URL', 'required|trim|min_length[4]|callback_unique_job_page_url');
            $this->form_validation->set_rules('job_short_description', 'job short description', 'required|trim|min_length[8]');
            $this->form_validation->set_rules('job_experience', 'job experience', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('job_salary', 'job salary', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('working_hour', 'job working hour', 'trim|min_length[4]');
            $this->form_validation->set_rules('job_application_deadline', 'Job Application Deadline Date', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('other_conditions', 'others job conditions', 'trim|min_length[4]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Job - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'career';
                $data['common_header'] = 'Add Job';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_jobs();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_job';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_jobs = $this->app_user_model->get_all_jobs($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_jobs'] = $all_jobs;
                $data['list_title'] = 'Job List';


                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_job_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'job_title' => $this->input->post('job_title'),
                    'job_page_url' => $this->input->post('job_page_url'),
                    'job_short_description' => $this->input->post('job_short_description'),
                    'job_type' => $this->input->post('job_type'),
                    'job_salary' => $this->input->post('job_salary'),
                    'job_experience' => $this->input->post('job_experience'),
                    'working_hour' => $this->input->post('working_hour'),
                    'job_application_deadline' => $this->input->post('job_application_deadline'),
                    'other_conditions' => $this->input->post('other_conditions'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_jobs($data);
                $this->session->set_flashdata('add_success', 'Job is successfully added');
                redirect(base_url() . 'admin/add/job');
            }
        }
    }

    public function update_job($job_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $job_id_dec = base64_decode($job_id);
            $single_job = $this->app_user_model->get_single_job_by_id($job_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_job_title_db = $single_job["job_title"];
            $single_job_title = $this->input->post('job_title');

            $job_page_url_db = $single_job["job_page_url"];
            $job_page_url = strtolower($this->input->post('job_page_url'));

            if ($single_job_title_db != $single_job_title) {
                $this->form_validation->set_rules('job_title', 'Job title', 'required|trim|min_length[4]|callback_unique_job_title');
            } else {
                $this->form_validation->set_rules('job_title', 'Job title', 'required|trim|min_length[4]');
            }
            if ($job_page_url_db != $job_page_url) {
                $this->form_validation->set_rules('job_page_url', 'Job Page URL', 'required|trim|min_length[4]|callback_unique_job_page_url');
            } else {
                $this->form_validation->set_rules('job_page_url', 'Job Page URL', 'required|trim|min_length[4]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Job - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'career';
                $data['common_header'] = 'Update Job';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_job'] = $single_job;


                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_job_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'job_title' => $this->input->post('job_title'),
                    'job_page_url' => $this->input->post('job_page_url'),
                    'job_short_description' => $this->input->post('job_short_description'),
                    'job_type' => $this->input->post('job_type'),
                    'job_salary' => $this->input->post('job_salary'),
                    'job_experience' => $this->input->post('job_experience'),
                    'working_hour' => $this->input->post('working_hour'),
                    'job_application_deadline' => $this->input->post('job_application_deadline'),
                    'other_conditions' => $this->input->post('other_conditions'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_job($data, $job_id_dec);
                $this->session->set_flashdata('job_update_message', "Selected Job is updated successfully.");
                redirect(base_url() . 'admin/add/job/');
            }
        }
    }

    public function delete_job($job_id)
    {
        $job_id_dec = base64_decode($job_id);
        $single_job = $this->app_user_model->get_single_job_by_id($job_id_dec);
        $is_active = $single_job["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Job can not be deleted');
        } else {
            $this->app_user_model->delete_job($job_id_dec);
            $this->session->set_flashdata('job_delete_message', 'Selected Job is successfully deleted');
        }
        redirect(base_url() . 'admin/add/job/');
    }

    public function add_job_page()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('job_title', 'Please select a Job Title', 'required');
            $this->form_validation->set_rules('job_detail_description', 'Job Details description', 'required|trim|min_length[5]');
            $this->form_validation->set_rules('job_requirements', 'Job Requirements', 'required|trim|min_length[5]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Job Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'career';
                $data['common_header'] = 'Add Job Page';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_jobs();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_job_page';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_jobs = $this->app_user_model->get_all_jobs($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_jobs'] = $all_jobs;

                $job_title_list = $this->app_user_model->get_active_job_title_list();
                $data['job_title_list'] = $job_title_list;
                $data['list_title'] = 'Job List';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_job_page_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $job_id = $this->input->post('job_title');
                $single_job = $this->app_user_model->get_single_job_by_id($job_id);
                if ($single_job['job_detail_description'] == '' || $single_job['job_responsibilities'] == '') {
                    $this->app_user_model->add_job_pages($job_id);
                    $this->session->set_flashdata('add_success', 'Selected Job Page is successfully added');
                } else {
                    $this->session->set_flashdata('cant_add_success', 'Selected Job Page is already added. You can update the selected page.');
                }

                redirect(base_url() . 'admin/add/job/page');
            }
        }
    }

    public function update_job_page($job_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $job_id_dec = base64_decode($job_id);
            $this->load->library('Form_validation');
            $this->form_validation->set_rules('job_detail_description', 'Job Details description', 'required|trim|min_length[5]');
            $this->form_validation->set_rules('job_requirements', 'Job Requirements', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Job Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'career';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['common_header'] = 'Update Job Page';

                $single_job = $this->app_user_model->get_single_job_by_id($job_id_dec);
                $data['single_job'] = $single_job;

                $job_title_list = $this->app_user_model->get_active_job_title_list();
                $data['job_title_list'] = $job_title_list;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_job_page_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_job_page($job_id_dec);
                $this->session->set_flashdata('job_page_update_message', "Selected Job page updated successfully.");
                redirect(base_url() . 'admin/add/job/page');
            }
        }
    }

    public function add_project_page()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('project_title', 'Please select a Project Title', 'required');
            $this->form_validation->set_rules('page_description', 'This Page description', 'required|trim|min_length[5]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Project Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['common_header'] = 'Add Project Page';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_projects();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_project_page';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_projects = $this->app_user_model->get_all_projects($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_projects'] = $all_projects;

                $project_title_list = $this->app_user_model->get_project_title_list();
                $data['project_title_list'] = $project_title_list;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_project_page_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $project_id = $this->input->post('project_title');
                $single_project = $this->app_user_model->get_single_project_by_id($project_id);
                if ($single_project['project_page_description'] == '') {
                    $this->app_user_model->add_project_pages($project_id);
                    $this->session->set_flashdata('add_success', 'Selected Project Page is successfully added');
                } else {
                    $this->session->set_flashdata('cant_add_success', 'Selected Project Page is already added. You can update the selected page.');
                }

                redirect(base_url() . 'admin/add/project/page');
            }
        }
    }

    public function update_project_page($project_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $project_id_dec = base64_decode($project_id);
            $this->load->library('Form_validation');
            $this->form_validation->set_rules('page_description', 'This Page description', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Project Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['common_header'] = 'Update Project Page';

                $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);
                $data['single_project'] = $single_project;

                $project_title_list = $this->app_user_model->get_project_title_list();
                $data['project_title_list'] = $project_title_list;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_project_page_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_project_page($project_id_dec);
                $this->session->set_flashdata('update_message', "Selected Project page updated successfully.");
                redirect(base_url() . 'admin/add/project/page');
            }
        }
    }

    public function add_service_page()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('service_name', 'Please select a Service', 'required');
            $this->form_validation->set_rules('page_description', 'This Page description', 'required|trim|min_length[5]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Service Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'service_settings';
                $data['common_header'] = 'Add Service Page';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_service();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_service_page';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_services = $this->app_user_model->get_services($config["per_page"], $offset);
                $data['all_services'] = $all_services;

                $service_list = $this->app_user_model->get_service();
                $data['service_list'] = $service_list;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_service_page_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $service_id = $this->input->post('service_name');
                $single_service = $this->app_user_model->get_service_by_id($service_id);
                if ($single_service['service_page_description'] == '') {
                    $this->app_user_model->add_service_pages($service_id);
                    $this->session->set_flashdata('add_success', 'Selected Service Page is successfully added');
                } else {
                    $this->session->set_flashdata('cant_add_success', 'Selected Service Page is already added. You can update the selected page.');
                }
                redirect(base_url() . 'admin/add/service/page');
            }
        }
    }

    public function edit_service_page($service_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $service_id = base64_decode($service_id);
            $this->load->library('Form_validation');
            $this->form_validation->set_rules('page_description', 'This Page description', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Service Page - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'service_settings';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['common_header'] = 'Update Service Page';

                $single_service = $this->app_user_model->get_service_by_id($service_id);
                $data['single_service'] = $single_service;

                $service_list = $this->app_user_model->get_service();
                $data['service_list'] = $service_list;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_service_page_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_service_page($service_id);
                $this->session->set_flashdata('update_message', "Selected Service page updated successfully.");
                redirect(base_url() . 'admin/add/service/page');
            }
        }
    }


    public function update_company_overview()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('company_overview', 'This overview', 'trim|required|min_length[4]');


            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Company Overview - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'other_page';
                $data['common_header'] = 'Update Company Overview';
                $data['full_name'] = $this->session->userdata('full_name');

                $company_overview_id = 1;
                $all_company_overview = $this->app_user_model->get_company_overview_by_id($company_overview_id); // Reading and showing the System configuration from DB
                $data['all_company_overview'] = $all_company_overview;


                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_company_overview_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_company_overview();

                $this->session->set_flashdata('update_company_overview', "Company Overview updated successfully.");
                redirect(base_url() . 'admin/update/company/overview');
            }
        }
    }


    public function add_project()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('project_category', 'Please select a Project Category', 'required');
            $this->form_validation->set_rules('project_title', 'This Project title', 'required|trim|min_length[4]|callback_unique_project_title');
            $this->form_validation->set_rules('project_description', 'This Project description', 'required|trim|min_length[8]');
            $this->form_validation->set_rules('project_internal_link', 'This Project Internal Link', 'trim|min_length[4]|callback_unique_project_internal_link');
            $this->form_validation->set_rules('project_external_link', 'This Project External Link', 'trim|min_length[4]|callback_unique_project_external_link');
            $this->form_validation->set_rules('project_start_date', 'This Project Start Date', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('project_end_date', 'This Project End Date', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Project - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['common_header'] = 'Add Project';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_projects();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_project';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_projects = $this->app_user_model->get_all_projects($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_projects'] = $all_projects;
                $data['list_title'] = 'Project List';

                $active_project_category = $this->main_ui_model->get_active_project_category(); // Reading and showing Only the Active project category list from DB by setting is_active = 1
                $data['active_project_category'] = $active_project_category;


                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_project_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_description' => $this->input->post('project_description'),
                    'project_external_link' => $this->input->post('project_external_link'),
                    'project_internal_link' => $this->input->post('project_internal_link'),
                    'project_start_date' => $this->input->post('project_start_date'),
                    'project_end_date' => $this->input->post('project_end_date'),
                    'project_category_id' => $this->input->post('project_category'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_projects($data);
                $this->session->set_flashdata('add_success', 'Project is successfully added');
                redirect(base_url() . 'admin/add/project');
            }
        }
    }

    public function update_project($project_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $project_id_dec = base64_decode($project_id);
            $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_project_title_db = $single_project["project_title"];
            $single_project_title = $this->input->post('project_title');

            $project_internal_link_db = $single_project["project_internal_link"];
            $project_internal_link = strtolower($this->input->post('project_internal_link'));

            $project_external_link_db = $single_project["project_external_link"];
            $project_external_link = strtolower($this->input->post('project_external_link'));

            if ($single_project_title_db != $single_project_title) {
                $this->form_validation->set_rules('project_title', 'This Project title', 'required|trim|min_length[4]|callback_unique_project_title');
            } else {
                $this->form_validation->set_rules('project_title', 'This Project title', 'required|trim|min_length[4]');
            }
            if ($project_internal_link_db != $project_internal_link) {
                $this->form_validation->set_rules('project_internal_link', 'This Project Internal Link', 'trim|min_length[4]|callback_unique_project_internal_link');
            } else {
                $this->form_validation->set_rules('project_internal_link', 'This Project Internal Link', 'trim|min_length[4]');
            }
            if ($project_external_link_db != $project_external_link) {
                $this->form_validation->set_rules('project_external_link', 'This Project External Link', 'trim|min_length[4]|callback_unique_project_external_link');
            } else {
                $this->form_validation->set_rules('project_external_link', 'This Project External Link', 'trim|min_length[4]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Project - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['common_header'] = 'Update Project';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_project'] = $single_project;

                $active_project_category = $this->main_ui_model->get_active_project_category(); // Reading and showing Only the Active project category list from DB by setting is_active = 1
                $data['active_project_category'] = $active_project_category;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_project_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_description' => $this->input->post('project_description'),
                    'project_external_link' => $this->input->post('project_external_link'),
                    'project_internal_link' => $this->input->post('project_internal_link'),
                    'project_start_date' => $this->input->post('project_start_date'),
                    'project_end_date' => $this->input->post('project_end_date'),
                    'project_category_id' => $this->input->post('project_category'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_project($data, $project_id_dec);
                $this->session->set_flashdata('project_update_message', "Selected Project is updated successfully.");
                redirect(base_url() . 'admin/add/project/');
            }
        }
    }


    public function upload_project_file($project_id)
    {
        $project_id_dec = base64_decode($project_id);
        $data['title'] = 'Upload Project Image - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'pr_category';

        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';
        $data['project_id'] = $project_id;

        $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);
        $data['single_project'] = $single_project;
        $single_project_title = $single_project['project_title'];
        $data['common_header'] = 'Upload ' . $single_project_title . ' Image';

        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_project_image_upload_form_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function upload_project_photo($project_id)
    {
        $project_id_dec = base64_decode($project_id);
        $config['upload_path'] = './uploaded/projects';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 6000;
        $config['max_width'] = 600;
        $config['max_height'] = 600;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Upload Project Image - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'pr_category';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();
            $data['project_id'] = $project_id;

            $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);
            $data['single_project'] = $single_project;
            $single_project_title = $single_project['project_title'];
            $data['common_header'] = 'Upload ' . $single_project_title . ' Image';

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_project_image_upload_form_view', $data);
            $this->load->view('admin/footer_view', $data);

            /*$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);            */
        } else {
            $file = array(
                'project_image' => $this->upload->data('file_name')
            );
            $table_name = 'sdil_projects';
            $this->app_user_model->update_single_image($project_id_dec, $table_name, $file);
            $this->session->set_flashdata('upload_success', 'Your file is successfully uploaded');
            redirect(base_url() . 'admin/upload/project/photo/' . $project_id);
        }

    }


    public function delete_project_image($project_id)
    {
        $project_id_dec = base64_decode($project_id);
        $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);
        $this->app_user_model->delete_projects_image($project_id_dec);
        $image_name = $single_project["project_image"];
        $path = "./uploaded/projects/" . $image_name;
        unlink($path);
        $this->session->set_flashdata('image_delete_message', 'Selected image is successfully deleted with image file.');
        redirect(base_url() . 'admin/add/project');
    }

    public function delete_project($project_id)
    {
        $project_id_dec = base64_decode($project_id);
        $single_project = $this->app_user_model->get_single_project_by_id($project_id_dec);
        $is_active = $single_project["is_active"];
        $have_project_image = $single_project["project_image"];
        if ($is_active || $have_project_image) {
            $this->session->set_flashdata('cant_delete_message', 'Active Project or Project with image can not be deleted');
        } else {
            $this->app_user_model->delete_project($project_id_dec);
            $this->session->set_flashdata('project_delete_message', 'Selected Project is successfully deleted');
        }

        redirect(base_url() . 'admin/add/project/');
    }

    public function add_project_category()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('project_cat_name', 'This category name', 'trim|min_length[2]|callback_unique_project_cat_name');
            $this->form_validation->set_rules('project_cat_code', 'This category code', 'trim|min_length[2]|callback_unique_project_cat_code');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Project Category - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['common_header'] = 'Add Project Category';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_project_cat();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_project_category';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_project_cat = $this->app_user_model->get_all_project_cat($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_project_cat'] = $all_project_cat;
                $data['list_title'] = 'Project Category List';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_project_category_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $project_category_code = strtolower($this->input->post('project_cat_code'));
                $data = array(
                    'project_category_name' => $this->input->post('project_cat_name'),
                    'project_category_code' => $project_category_code,
                    'is_active' => $is_active
                );
                $this->app_user_model->add_project_category($data);
                $this->session->set_flashdata('add_success', 'Project Category is successfully added');
                redirect(base_url() . 'admin/add/project/category');
            }
        }
    }

    public function update_project_category($project_category_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $project_category_id_dec = base64_decode($project_category_id);
            $single_project_cat = $this->app_user_model->get_single_project_cat_by_id($project_category_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_project_cat_name_db = $single_project_cat["project_category_name"];
            $single_project_cat_name = $this->input->post('project_cat_name');
            $single_project_cat_code_db = $single_project_cat["project_category_code"];
            $single_project_cat_code = strtolower($this->input->post('project_cat_code'));

            if ($single_project_cat_name_db != $single_project_cat_name) {
                $this->form_validation->set_rules('project_cat_name', 'This category name', 'trim|min_length[2]|callback_unique_project_cat_name');
            } else {
                $this->form_validation->set_rules('project_cat_name', 'This category name', 'trim|min_length[2]');
            }
            if ($single_project_cat_code_db != $single_project_cat_code) {
                $this->form_validation->set_rules('project_cat_code', 'This category code', 'trim|min_length[2]|callback_unique_project_cat_code');
            } else {
                $this->form_validation->set_rules('project_cat_code', 'This category code', 'trim|min_length[2]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Project Category - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'pr_category';
                $data['common_header'] = 'Update Project Category';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_project_cat'] = $single_project_cat;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_project_cat_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $project_category_code = strtolower($this->input->post('project_cat_code'));
                $data = array(
                    'project_category_name' => $this->input->post('project_cat_name'),
                    'project_category_code' => $project_category_code,
                    'is_active' => $is_active
                );
                $this->app_user_model->update_project_cat($data, $project_category_id_dec);
                $this->session->set_flashdata('project_cat_update_message', "Selected Category is updated successfully.");
                redirect(base_url() . 'admin/add/project/category/');
            }
        }
    }

    public function delete_project_category($project_category_id)
    {
        $project_category_id_dec = base64_decode($project_category_id);
        $single_project_cat = $this->app_user_model->get_single_project_cat_by_id($project_category_id_dec);
        $is_active = $single_project_cat["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Project Category can not be deleted');
        } else {
            $this->app_user_model->delete_project_category($project_category_id_dec);
            $this->session->set_flashdata('project_cat_delete_message', 'Selected Project Category is successfully deleted');
        }

        redirect(base_url() . 'admin/add/project/category/');
    }


    public function add_partners()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('partner_name', 'This partner name', 'trim|min_length[2]|callback_unique_partner_name');
            $this->form_validation->set_rules('partner_internal_link', 'This internal link', 'trim|min_length[7]|callback_unique_partner_internal_link');
            $this->form_validation->set_rules('partner_external_link', 'This external link', 'trim|min_length[7]|callback_unique_partner_internal_link');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Partners - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Add Partners';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_partners();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_partners';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_partners = $this->app_user_model->get_all_partners($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_partners'] = $all_partners;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_partners_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'partner_name' => $this->input->post('partner_name'),
                    'partner_internal_link' => $this->input->post('partner_internal_link'),
                    'partner_external_link' => $this->input->post('partner_external_link'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_partners($data);
                $this->session->set_flashdata('add_success', 'Partner is successfully added');
                redirect(base_url() . 'admin/add/partners');
            }
        }
    }

    public function add_testimonials()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('title', 'This title', 'trim|min_length[2]');
            $this->form_validation->set_rules('testimonial_description', 'This description', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('testimonial_details_link', 'This link', 'trim|min_length[2]');
            $this->form_validation->set_rules('commented_by', 'This commentator', 'trim|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Testimonials - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Add Testimonials';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_testimonials();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_testimonials';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_testimonials = $this->app_user_model->get_all_testimonials($config["per_page"], $offset); // Reading and showing the Testimonials list from DB
                $data['all_testimonials'] = $all_testimonials;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_testimonials_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'title' => $this->input->post('title'),
                    'testimonial_description' => $this->input->post('testimonial_description'),
                    'testimonial_details_link' => $this->input->post('testimonial_details_link'),
                    'commented_by' => $this->input->post('commented_by'),
                    'is_active' => $is_active

                );
                $this->app_user_model->add_testimonials($data);
                $this->session->set_flashdata('add_success', 'Testimonial is successfully added');
                redirect(base_url() . 'admin/addtestimonials');
            }
        }
    }

    public function update_partners($partner_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $partner_id_dec = base64_decode($partner_id);
            $single_partner = $this->app_user_model->get_single_partner_by_id($partner_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');

            $partner_name_db = $single_partner["partner_name"];
            $partner_name = $this->input->post('partner_name');

            $partner_internal_link_db = $single_partner["partner_internal_link"];
            $partner_internal_link = $this->input->post('partner_internal_link');

            $partner_external_link_db = $single_partner["partner_external_link"];
            $partner_external_link = $this->input->post('partner_external_link');

            if ($partner_name_db != $partner_name) {
                $this->form_validation->set_rules('partner_name', 'This partner name', 'trim|min_length[2]|callback_unique_partner_name');
            } else {
                $this->form_validation->set_rules('partner_name', 'This partner name', 'trim|min_length[2]');
            }

            if ($partner_internal_link_db != $partner_internal_link) {
                $this->form_validation->set_rules('partner_internal_link', 'This internal link', 'trim|min_length[2]|callback_unique_partner_internal_link');
            } else {
                $this->form_validation->set_rules('partner_internal_link', 'This link', 'trim|min_length[2]');
            }

            if ($partner_external_link_db != $partner_external_link) {
                $this->form_validation->set_rules('partner_external_link', 'This external link', 'trim|min_length[2]|callback_unique_partner_external_link');
            } else {
                $this->form_validation->set_rules('partner_external_link', 'This link', 'trim|min_length[2]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Partners - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Update Partners';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_partner'] = $single_partner;
                $data['common_header'] = 'Update Partner Information';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_partner_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'partner_name' => $this->input->post('partner_name'),
                    'partner_internal_link' => $this->input->post('partner_internal_link'),
                    'partner_external_link' => $this->input->post('partner_external_link'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_partner($data, $partner_id_dec);
                $this->session->set_flashdata('partner_update_message', "Selected Partner information is updated successfully.");
                redirect(base_url() . 'admin/add/partners/');
            }
        }
    }

    public function update_testimonial($testimonial_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $testimonial_id_dec = base64_decode($testimonial_id);
            $single_testimonial = $this->app_user_model->get_single_testimonial_by_id($testimonial_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('title', 'This title', 'trim|min_length[2]');
            $this->form_validation->set_rules('testimonial_description', 'This description', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('testimonial_details_link', 'This link', 'trim|min_length[2]');
            $this->form_validation->set_rules('commented_by', 'This commentator', 'trim|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_testimonial_details_link_db = $single_testimonial["testimonial_details_link"];
            $single_testimonial_details_link = $this->input->post('testimonial_details_link');

            if ($single_testimonial_details_link_db != $single_testimonial_details_link) {
                $this->form_validation->set_rules('testimonial_details_link', 'This link', 'trim|min_length[2]|callback_unique_testimonial_details_link');
            } else {
                $this->form_validation->set_rules('testimonial_details_link', 'This link', 'trim|min_length[2]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Testimonial - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_testimonial'] = $single_testimonial;
                $data['common_header'] = 'Update Testimonial Information';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_testimonials_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'title' => $this->input->post('title'),
                    'testimonial_description' => $this->input->post('testimonial_description'),
                    'testimonial_details_link' => $this->input->post('testimonial_details_link'),
                    'commented_by' => $this->input->post('commented_by'),
                    'is_active' => $is_active
                );
                $this->app_user_model->update_testimonial($data, $testimonial_id_dec);
                $this->session->set_flashdata('testimonial_update_message', "Selected Testimonial information is updated successfully.");
                redirect(base_url() . 'admin/addtestimonials/');
            }
        }
    }

    public function delete_testimonial($testimonial_id)
    {
        $testimonial_id_dec = base64_decode($testimonial_id);
        $single_testimonial = $this->app_user_model->get_single_testimonial_by_id($testimonial_id_dec);
        $is_active = $single_testimonial["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Testimonial can not be deleted');
        } else {
            $this->app_user_model->delete_testimonial($testimonial_id_dec);
            $this->session->set_flashdata('testimonial_delete_message', 'Selected Testimonial is successfully deleted');
        }

        redirect(base_url() . 'admin/addtestimonials');
    }

    public function add_team_members()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('first_name', 'This first name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('last_name', 'This last name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('designation', 'This designation', 'trim|required|min_length[2]|callback_unique_designation');
            $this->form_validation->set_rules('member_description', 'Description', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('facebook_link', 'This Facebook link', 'trim|min_length[4]|callback_unique_facebook');
            $this->form_validation->set_rules('twitter_link', 'This Twitter link', 'trim|min_length[4]|callback_unique_twitter');
            $this->form_validation->set_rules('linkedin_link', 'This LinkedIn link', 'trim|min_length[4]|callback_unique_linkedin');
            $this->form_validation->set_rules('googleplus_link', 'This Google+ link', 'trim|min_length[4]|callback_unique_googleplus');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Team Members - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Add Team Members';
                $data['full_name'] = $this->session->userdata('full_name');

                $all_team_members = $this->app_user_model->get_all_team_members(); // Reading and showing the Team members list from DB
                $data['all_team_members'] = $all_team_members;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_team_members_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $first_name = $this->input->post('first_name');
                $data = array(
                    'first_name' => $this->$first_name,
                    'last_name' => $this->input->post('last_name'),
                    'designation' => $this->input->post('designation'),
                    'member_description' => $this->input->post('member_description'),
                    'facebook_link' => $this->input->post('facebook_link'),
                    'twitter_link' => $this->input->post('twitter_link'),
                    'linkedin_link' => $this->input->post('linkedin_link'),
                    'googleplus_link' => $this->input->post('googleplus_link'),
                    'is_active' => $is_active
                );
                $this->app_user_model->add_team_member($data);
                $this->session->set_flashdata('add_success', 'Team member is successfully added');
                redirect(base_url() . 'admin/addteam');
            }
        }

    }

    public function upload_partner_image_file($partner_id)
    {
        $partner_id_dec = base64_decode($partner_id);
        $data['title'] = 'Upload Partner Image - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'landing_page';

        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';
        $data['partner_id'] = $partner_id;

        $single_partner = $this->app_user_model->get_single_partner_by_id($partner_id_dec);
        $data['single_partner'] = $single_partner;
        $single_partner_full_name = $single_partner['partner_name'];
        $data['common_header'] = 'Upload ' . $single_partner_full_name . ' Photo';

        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_partner_image_upload_form_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function upload_partner_photo($partner_id)
    {
        $partner_id_dec = base64_decode($partner_id);
        $config['upload_path'] = './uploaded/partners/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 150;
        $config['maintain_ratio'] = TRUE;
        $config['max_width'] = 500;
        $config['max_height'] = 500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Upload Partner Image - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'landing_page';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();
            $data['partner_id'] = $partner_id;

            $single_partner = $this->app_user_model->get_single_partner_by_id($partner_id_dec);
            $data['single_partner'] = $single_partner;
            $single_partner_full_name = $single_partner['partner_name'];
            $data['common_header'] = 'Upload ' . $single_partner_full_name . ' Photo';

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_partner_image_upload_form_view', $data);
            $this->load->view('admin/footer_view', $data);

            /*$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);            */
        } else {
            $file = array(
                'partner_image' => $this->upload->data('file_name')
            );
            $table_name = 'sdil_partners';
            $this->app_user_model->update_single_image($partner_id_dec, $table_name, $file);
            $this->session->set_flashdata('upload_success', 'Your file is successfully uploaded');
            redirect(base_url() . 'admin/upload/partner/photo/' . $partner_id);
            /*$data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/upload_success', $data);*/
        }

    }

    public function delete_partner_image($partner_id)
    {
        $partner_id_dec = base64_decode($partner_id);
        $single_partner = $this->app_user_model->get_single_partner_by_id($partner_id_dec);
        $this->app_user_model->delete_partners_image($partner_id_dec);
        $image_name = $single_partner["partner_image"];
        $path = "./uploaded/partners/" . $image_name;
        unlink($path);
        $this->session->set_flashdata('image_delete_message', 'Selected partner image is successfully deleted');
        redirect(base_url() . 'admin/add/partners');
    }

    public function delete_partner($partner_id)
    {
        $partner_id_dec = base64_decode($partner_id);
        $single_partner = $this->app_user_model->get_single_partner_by_id($partner_id_dec);
        $is_active = $single_partner["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Partner can not be deleted');
        } else {
            $this->app_user_model->delete_partner($partner_id_dec);
            $this->session->set_flashdata('partner_delete_message', 'Selected Partner is successfully deleted');
        }

        redirect(base_url() . 'admin/add/partners');
    }

    public function upload_member_image_file($member_id)
    {
        $member_id_dec = base64_decode($member_id);
        $data['title'] = 'Upload Member Image - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'landing_page';

        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';
        $data['member_id'] = $member_id;

        $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
        $data['single_member'] = $single_member;
        $single_member_full_name = $single_member['first_name'] . " " . $single_member['last_name'];
        $data['common_header'] = 'Upload ' . $single_member_full_name . ' Photo';

        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_member_image_upload_form_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function upload_member_photo($member_id)
    {
        $member_id_dec = base64_decode($member_id);
        $config['upload_path'] = './uploaded/admin/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 150;
        $config['max_width'] = 150;
        $config['max_height'] = 150;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Upload Member Image - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'landing_page';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();
            $data['member_id'] = $member_id;

            $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
            $data['single_member'] = $single_member;
            $single_member_full_name = $single_member['first_name'] . " " . $single_member['last_name'];
            $data['common_header'] = 'Upload ' . $single_member_full_name . ' Photo';

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_member_image_upload_form_view', $data);
            $this->load->view('admin/footer_view', $data);

            /*$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);            */
        } else {
            $file = array(
                'personal_image' => $this->upload->data('file_name')
            );
            $table_name = 'team_members';
            $this->app_user_model->update_single_image($member_id_dec, $table_name, $file);
            $this->session->set_flashdata('upload_success', 'Your file is successfully uploaded');
            redirect(base_url() . 'admin/uploadmemberphoto/' . $member_id);
            /*$data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/upload_success', $data);*/
        }

    }

    public function update_team_member($member_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $member_id_dec = base64_decode($member_id);
            $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('first_name', 'This first name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('last_name', 'This last name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('member_description', 'Description', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('is_active', 'Is Active');

            $single_member_designation_db = $single_member["designation"];
            $single_member_facebook_db = $single_member["facebook_link"];
            $single_member_twitter_db = $single_member["twitter_link"];
            $single_member_linkedin_db = $single_member["linkedin_link"];
            $single_member_googleplus_db = $single_member["googleplus_link"];

            $single_member_designation = $this->input->post('designation');
            $single_member_facebook = $this->input->post('facebook_link');
            $single_member_twitter = $this->input->post('twitter_link');
            $single_member_linkedin = $this->input->post('linkedin_link');
            $single_member_googleplus = $this->input->post('googleplus_link');

            if ($single_member_designation_db != $single_member_designation) {
                $this->form_validation->set_rules('designation', 'This designation', 'trim|required|min_length[2]|callback_unique_designation_edit');
            } else {
                $this->form_validation->set_rules('designation', 'This designation', 'trim|required|min_length[2]');
            }

            if ($single_member_facebook_db != $single_member_facebook) {
                $this->form_validation->set_rules('facebook_link', 'This Facebook link', 'trim|min_length[4]|callback_unique_facebook_edit');
            } else {
                $this->form_validation->set_rules('facebook_link', 'This Facebook link', 'trim|min_length[4]');
            }

            if ($single_member_twitter_db != $single_member_twitter) {
                $this->form_validation->set_rules('twitter_link', 'This Twitter link', 'trim|min_length[4]|callback_unique_twitter_edit');
            } else {
                $this->form_validation->set_rules('twitter_link', 'This Twitter link', 'trim|min_length[4]');
            }

            if ($single_member_linkedin_db != $single_member_linkedin) {
                $this->form_validation->set_rules('linkedin_link', 'This LinkedIn link', 'trim|min_length[4]|callback_unique_linkedin_edit');
            } else {
                $this->form_validation->set_rules('linkedin_link', 'This LinkedIn link', 'trim|min_length[4]');
            }

            if ($single_member_googleplus_db != $single_member_googleplus) {
                $this->form_validation->set_rules('googleplus_link', 'This Google+ link', 'trim|min_length[4]|callback_unique_googleplus_edit');
            } else {
                $this->form_validation->set_rules('googleplus_link', 'This Google+ link', 'trim|min_length[4]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Team Member - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['full_name'] = $this->session->userdata('full_name');

                $data['single_member'] = $single_member;
                $single_member_full_name = $single_member['first_name'] . " " . $single_member['last_name'];
                $data['common_header'] = 'Update ' . $single_member_full_name . ' Information';

                $all_team_members = $this->app_user_model->get_all_team_members(); // Reading and showing the Team members list from DB
                $data['all_team_members'] = $all_team_members;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_team_members_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_team_members($member_id_dec);
                $this->session->set_flashdata('team_mem_update_message', "Selected Team Member information is updated successfully.");
                redirect(base_url() . 'admin/addteam/');
            }
        }
    }

    public function delete_member_image($member_id)
    {
        $member_id_dec = base64_decode($member_id);
        $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
        $this->app_user_model->delete_member_image($member_id_dec);
        $image_name = $single_member["personal_image"];
        $path = "./uploaded/admin/" . $image_name;
        unlink($path);
        $this->session->set_flashdata('image_delete_message', 'Selected image is successfully deleted');
        redirect(base_url() . 'admin/addteam');
    }

    public function delete_member($member_id)
    {
        $member_id_dec = base64_decode($member_id);
        $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
        $is_active = $single_member["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Member can not be deleted');
        } else {
            $this->app_user_model->delete_member($member_id_dec);
            $this->session->set_flashdata('member_delete_message', 'Selected Member is successfully deleted');
        }

        redirect(base_url() . 'admin/addteam');
    }

    public function update_system_configuration()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('top_heading1', 'This Top Heading 1', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('top_heading2', 'This Top Heading 2', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('footer_text', 'This Footer text', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('meta_keyword', 'This Meta Keyword', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('meta_desc', 'This Meta Description', 'required');


            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update System Configuration - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'system_configuration_page';
                $data['common_header'] = 'Update Settings';
                $data['full_name'] = $this->session->userdata('full_name');

                $system_config_id = 1;
                $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
                $data['all_system_configuration'] = $all_system_configuration;


                /*$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploaded/admin/";
                $config['upload_url']     = base_url()."uploaded/admin/";
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $config['max_size'] = '2048000';
                $config['overwrite'] = TRUE;
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);
                $this->upload->do_upload();
                if (!$this->upload->do_upload()) {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/system_configuration_view', $data);
                    $this->session->set_flashdata('error_config_message', "System Configuration is not updated!");

                } else {
                    $data = $this->upload->do_upload();
                    $file = array(
                        'favicon' => $data['full_path']
                    );
                    $data['upload_data'] = array('upload_data' => $this->upload->data());
                    $this->load->view('admin/upload_success',$data);
                    $this->app_user_model->update_image($file);
                }*/
                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/system_configuration_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_system_config();

                $this->session->set_flashdata('update_config_message', "System Configuration updated successfully.");
                redirect(base_url() . 'admin/configuration');
            }
        }
    }

    /**
     * Upload Favicon
     */
    public function upload_favicon_file()
    {
        $data['title'] = 'Update System Configuration - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'system_configuration_page';
        $data['common_header'] = 'Upload Favicon';
        $data['page_backlink'] = base_url() . 'admin/configuration';
        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration'] = $all_system_configuration;

        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_favicon_upload_form_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function upload_favicon()
    {
        $config['upload_path'] = './uploaded/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 100;
        $config['max_width'] = 30;
        $config['max_height'] = 30;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Update System Configuration - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'system_configuration_page';
            $data['common_header'] = 'Upload Favicon';
            $data['page_backlink'] = base_url() . 'admin/configuration';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();

            $system_config_id = 1;
            $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
            $data['all_system_configuration'] = $all_system_configuration;

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_favicon_upload_form_view', $data);
            $this->load->view('admin/footer_view', $data);

            /*$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);            */
        } else {
            $file = array(
                'favicon' => $this->upload->data('file_name')
            );
            $table_name = 'system_configuration';
            $this->app_user_model->update_image($table_name, $file);
            $this->session->set_flashdata('upload_success', 'Your file is successfully uploaded');
            redirect(base_url() . 'admin/uploadfavicon');
            /*$data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/upload_success', $data);*/
        }

    }

    public function upload_logo_file()
    {
        $data['title'] = 'Update System Configuration - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'system_configuration_page';
        $data['common_header'] = 'Upload Logo';
        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration'] = $all_system_configuration;

        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_logo_upload_form_view', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function upload_logo()
    {
        $config['upload_path'] = './uploaded/admin/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 1024;
        $config['max_width'] = 684;
        $config['max_height'] = 313;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Update System Configuration - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'system_configuration_page';
            $data['common_header'] = 'Upload Logo';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();

            $system_config_id = 1;
            $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
            $data['all_system_configuration'] = $all_system_configuration;

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_logo_upload_form_view', $data);
            $this->load->view('admin/footer_view', $data);

            /*$error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);            */
        } else {
            $file = array(
                'logo' => $this->upload->data('file_name')
            );
            $table_name = 'system_configuration';
            $this->app_user_model->update_image($table_name, $file);
            $this->session->set_flashdata('upload_success', 'Your file is successfully uploaded');
            redirect(base_url() . 'admin/uploadlogofile');
            /*$data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/upload_success', $data);*/
        }

    }

    public function get_all_contacts()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {

            $data['title'] = 'All Services List - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'all_contacts';
            $data['full_name'] = $this->session->userdata('full_name');

            /*==================================================
                Start of Pagination Code segment for service page
                ===================================================*/

            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
            $config['total_rows'] = $this->main_ui_model->total_count_of_contacts();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['base_url'] = base_url() . 'admin/get_all_contacts';
            $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data['paginglinks'] = $this->pagination->create_links();

            $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
            $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;

            $data['cur'] = $this->pagination->cur_page;

            // Showing total rows count
            if ($data['paginglinks'] != '') {
                $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
            }

            /*=================================================
                End of Pagination Code segment for service page
           ===================================================*/

            $contact_obj = $this->main_ui_model->get_contacts($config["per_page"], $offset);
            $data['all_contacts'] = $contact_obj;


            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_all_contact_list_view', $data);
            $this->load->view('admin/footer_view', $data);
        }
    }

    public function delete_contacts($contact_id)
    {
        $contact_id = base64_decode($contact_id);
        $this->main_ui_model->delete_contact($contact_id);
        $this->session->set_flashdata('contact_delete_message', 'Selected Contact is successfully deleted!');
        redirect(base_url() . 'admin/contacts');
    }

    public function social_icon_management()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('social_icon_name', 'This Social icon name', 'trim|required|min_length[2]|callback_unique_social_icon_name');
            $this->form_validation->set_rules('social_icon_link', 'This Social icon link URL', 'trim|required|min_length[4]|callback_unique_social_icon_link');
            $this->form_validation->set_rules('social_icon_class_name', 'This Social icon class name', 'trim|required|min_length[4]|callback_unique_social_icon_class_name');
            $this->form_validation->set_rules('is_active', 'Is Active');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Social Icon - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Add Social Icon';
                $data['full_name'] = $this->session->userdata('full_name');


                /*==================================================
              Start of Pagination Code segment for service page
              ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_social_icons();
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/social_icon_management';
                $config['suffix'] = '?==CoMnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;


                /*$data['serial'] = (($this->pagination->cur_page - 1) * $config["per_page"]) + 1;*/
                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/


                $all_social_icons = $this->app_user_model->get_social_icon($config["per_page"], $offset); // Reading and showing the Social Icon list from DB
                $data['all_social_icons'] = $all_social_icons;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_social_icon_manage_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'social_icon_name' => $this->input->post('social_icon_name'),
                    'social_icon_link' => $this->input->post('social_icon_link'),
                    'social_icon_logo_class_name' => $this->input->post('social_icon_class_name'),
                    'is_active' => $is_active

                );
                $this->app_user_model->add_social_icon($data);
                $this->session->set_flashdata('add_success', 'Social Icon is successfully added');
                redirect(base_url() . 'admin/socialicon');
            }
        }
    }

    public function social_icon_edit($social_icon_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $socialicon_id = base64_decode($social_icon_id);
            $this->load->library('Form_validation');
            $social_icon = $this->app_user_model->get_social_icon_by_id($socialicon_id);
            // field name, error message, validation rules
            $this->form_validation->set_rules('is_active', 'Is Active');


            $social_icon_db = $social_icon["social_icon_name"];
            $social_icon_link_db = $social_icon["social_icon_link"];
            $social_icon_class_db = $social_icon["social_icon_logo_class_name"];

            $social_icon_name = $this->input->post('social_icon_name');
            $social_icon_link = $this->input->post('social_icon_link');
            $social_icon_class_name = $this->input->post('social_icon_class_name');

            if ($social_icon_db != $social_icon_name) {
                $this->form_validation->set_rules('social_icon_name', 'This Social icon name', 'trim|required|min_length[2]|callback_unique_social_icon_name_edit');
            } else {
                $this->form_validation->set_rules('social_icon_name', 'This Social icon name', 'trim|required|min_length[2]');
            }

            if ($social_icon_link_db != $social_icon_link) {
                $this->form_validation->set_rules('social_icon_link', 'This Social icon link URL', 'trim|required|min_length[4]|callback_unique_social_icon_link_edit');
            } else {
                $this->form_validation->set_rules('social_icon_link', 'This Social icon link URL', 'trim|required|min_length[4]');
            }

            if ($social_icon_class_db != $social_icon_class_name) {
                $this->form_validation->set_rules('social_icon_class_name', 'This Social icon class name', 'trim|required|min_length[4]|callback_unique_social_icon_class_name_edit');
            } else {
                $this->form_validation->set_rules('social_icon_class_name', 'This Social icon class name', 'trim|required|min_length[4]');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Social Icon - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'landing_page';
                $data['common_header'] = 'Update Social Icon';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['social'] = $social_icon;

                /* $all_social_icons = $this->app_user_model->get_social_icon(); // Reading and showing the Social Icon list from DB
                 $data['all_social_icons'] = $all_social_icons;*/

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_social_icon_manage_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_social_icon($socialicon_id);
                $this->session->set_flashdata('update_message', "Selected Social icon updated successfully.");
                redirect(base_url() . 'admin/socialicon/');
            }
        }
    }

    public function social_icon_delete($social_icon_id)
    {
        $social_icon_id = base64_decode($social_icon_id);
        $social_icon = $this->app_user_model->get_social_icon_by_id($social_icon_id);
        $is_active = $social_icon["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Social icon can not be deleted');
        } else {
            $this->app_user_model->delete_social_icon($social_icon_id);
            $this->session->set_flashdata('delete_message', 'Selected Social icon is successfully deleted');
        }

        redirect(base_url() . 'admin/socialicon/');
    }

    /**
     * This is Add Service Page for admin
     * It contains Add service method to adding service to database
     */
    public function add_service()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('service_name', 'This Service Name', 'trim|required|min_length[4]|callback_unique_service_name');
            $this->form_validation->set_rules('service_details', 'This Service Details', 'required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            $this->form_validation->set_rules('service_page_url', 'This URL', 'trim|required|min_length[4]|callback_unique_service_link');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Services - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'service_settings';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                 Start of Pagination Code segment for service page
                 ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_service();
                $config['per_page'] = 10;
                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_service';
                $config['suffix'] = '?==MnZe==' . http_build_query($_GET, '', "&");
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $data['paginglinks'] = $this->pagination->create_links();

                $current_page = ($this->pagination->cur_page == 0) ? 1 : $this->pagination->cur_page;
                $data['start_from'] = ($current_page - 1) * $config["per_page"] + 1;

                $data['cur'] = $this->pagination->cur_page;

                // Showing total rows count
                if ($data['paginglinks'] != '') {
                    $to_serial = $this->pagination->cur_page * $this->pagination->per_page;
                    $data['pagermessage'] = 'Showing ' . ((($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1) . ' to ' . ($to_serial >= $config['total_rows'] ? $config['total_rows'] : $to_serial) . ' of ' . $config['total_rows'];
                }

                /*=================================================
                    End of Pagination Code segment for service page
               ===================================================*/

                $all_services = $this->app_user_model->get_services($config["per_page"], $offset);
                $data['all_services'] = $all_services;
                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_service_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $this->app_user_model->add_services();
                $this->session->set_flashdata('success_msg', 'Service is added successfully');
                redirect(base_url() . 'admin/service', 'refresh');
            }
        }
    }


    public function edit_service($service_id)
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $service_id = base64_decode($service_id);
            $this->load->library('Form_validation');
            $this->lang->load('form_validation', 'english');
            $service = $this->app_user_model->get_service_by_id($service_id);

            $service_name_db = $service["service_name"];
            $service_name = $this->input->post('service_name');

            if ($service_name_db != $service_name) {
                $this->form_validation->set_rules('service_name', 'This Service Name', 'trim|required|min_length[4]|callback_unique_service_name_edit');
            } else {
                $this->form_validation->set_rules('service_name', 'This Service Name', 'trim|required|min_length[4]');
            }

            // field name, error message, validation rules
//            $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required|min_length[4]|is_unique[service_list.service_name]');
            $this->form_validation->set_rules('service_details', 'This Service Details', 'required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            $this->form_validation->set_rules('service_page_url', 'This URL');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Edit Services - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'service_settings';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['service'] = $service;

                /*$all_services = $this->app_user_model->get_service(); // Reading and showing the Service list from DB
                $data['all_services'] = $all_services;*/

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_edit_service_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_service($service_id);
                $this->session->set_flashdata('update_message', "Selected Service updated successfully.");
                redirect(base_url() . 'admin/service');
            }
        }
    }

    public function delete_service($service_id)
    {
        $service_id = base64_decode($service_id);
        $this->app_user_model->delete_service($service_id);
        $this->session->set_flashdata('service_delete_message', 'Selected Service is successfully deleted');
        redirect(base_url() . 'admin/service');
    }

    function unique_designation_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_team_member_edit('designation', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_designation_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_testimonial_details_link($str)
    {
        if ($this->app_user_model->exist_testimonial_edit('testimonial_details_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_testimonial_details_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_facebook_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_team_member_edit('facebook_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_facebook_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_twitter_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_team_member_edit('twitter_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_twitter_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_linkedin_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_team_member_edit('linkedin_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_linkedin_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_googleplus_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_team_member_edit('googleplus_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_googleplus_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_service_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_service_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_service_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_skill_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_skill_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_skill_name', "%s {$str} already exist!");
            return FALSE;
        }
    }
    function unique_skill_category_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_skill_category_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_skill_category_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_sicon_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_designation($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_designation($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_designation', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_project_cat_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_project_cat_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_project_cat_name', "%s '{$str}' already exist!");
            return FALSE;
        }
    }

    function unique_project_title($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_project_title($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_project_title', "%s '{$str}' already exist!");
            return FALSE;
        }
    }

    function unique_job_title($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_job_title($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_job_title', "%s '{$str}' already exist!");
            return FALSE;
        }
    }


    function unique_service_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_page_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_service_link', "%s '{$str}' already exist!");
            return FALSE;
        }
    }

    function unique_job_page_url($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_job_page_url($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_job_page_url', "%s '{$str}' already exist!");
            return FALSE;
        }
    }

    function unique_project_cat_code($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_project_cat_code($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_project_cat_code', "%s '{$str}' already exist!");
            return FALSE;
        }
    }

    function unique_partner_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_partner_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_partner_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_partner_internal_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_partner_internal_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_partner_internal_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_partner_external_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_partner_external_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_partner_external_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_project_internal_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_project_internal_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_project_internal_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_project_external_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_project_external_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_project_external_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_facebook($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_facebook($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_facebook', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_twitter($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_twitter($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_twitter', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_linkedin($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_linkedin($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_linkedin', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_googleplus($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_googleplus($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_googleplus', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_link($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_sicon_link($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_link', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_class_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_sicon_class_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_class_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_name_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_social_icon_edit('social_icon_name', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_name_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_link_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_social_icon_edit('social_icon_link', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_link_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_social_icon_class_name_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_social_icon_edit('social_icon_logo_class_name', $str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_social_icon_class_name_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_service_name_edit($str)
    {
        $this->load->model('app_user_model');
        if ($this->app_user_model->exist_service_name_edit($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_service_name_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function not_found_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->check_user_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('not_found_email', "%s {$str} not found!");
            return FALSE;
        }
    }

    /*public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('pass'));

        $result = $this->app_user_model->login($email, $password);
        if ($result) $this->welcome();
        else        $this->index();
    }*/

    public function registration()
    {
        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Registration- Shwapno Duar IT Ltd.';
            $this->load->view('admin/header_view', $data);
            $this->load->view('admin/app_user_registration_view.php', $data);
            $this->load->view('admin/footer_view', $data);
        } else {
            $this->app_user_model->add_user();
            $this->thank();
        }
    }

    public function thank()
    {
        $data['title'] = 'Admin Registration Completed- Shwapno Duar IT Ltd.';
        $data['completed'] = 'Admin Registration is Completed. You will be redirected to Log In page within 3 Seconds.';
        $this->load->view('admin/header_view', $data);
        $this->load->view('admin/thank_view.php', $data);
        $this->load->view('admin/footer_view', $data);
    }

    public function edit_admin_user()
    {
        $user_id = $this->session->userdata('user_id');
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_user_email_edit');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $particular_user = $this->app_user_model->get_user_by_id($user_id);
                $data['title'] = 'Edit Admin Profile- Shwapno Duar IT Ltd.';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'admin_profile';
                $data['particular_user'] = $particular_user;
                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_profile_update_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->app_user_model->update_user_info($user_id);
                $this->session->set_flashdata('user_info_update_message', "Your information updated successfully.");
                redirect(base_url() . 'admin/sdil/profile', 'refresh');
            }
        }
    }

    function unique_user_email_edit($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_email_edit($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_user_email_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_user_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_email', "%s {$str} already exist!");
            return FALSE;
        }
    }

    public function logout()
    {
        $newdata = array(
            'user_id' => '',
            'user_email' => '',
            'full_name' => '',
            'logged_in' => FALSE
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/admin', 'refresh');
    }
}