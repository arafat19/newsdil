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
                $data['title'] = 'Admin LogIn - Shwapno Duar IT Ltd.';
                $this->load->view('admin/header_view', $data);
                $this->load->view('admin/admin_login_index_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $result = $this->app_user_model->login($email, $password);
                echo $result;
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
                $data['active'] = 'testimonials';
                $data['common_header'] = 'Add Testimonials';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
              Start of Pagination Code segment for service page
              ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_testimonials();
                $config['per_page'] = 5;
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
                $data['active'] = 'testimonials';
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
                $data['active'] = 'team_members';
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

    public function upload_member_image_file($member_id)
    {
        $member_id_dec = base64_decode($member_id);
        $data['title'] = 'Upload Member Image - Shwapno Duar IT Ltd.';
        $data['navbar_title'] = 'SDIL Admin Panel';
        $data['active'] = 'team_members';

        $data['full_name'] = $this->session->userdata('full_name');
        $data['error'] = '';
        $data['member_id'] = $member_id;

        $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
        $data['single_member'] = $single_member;
        $single_member_full_name = $single_member['full_name'];
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
            $data['active'] = 'team_members';
            $data['full_name'] = $this->session->userdata('full_name');
            $data['error'] = $this->upload->display_errors();
            $data['member_id'] = $member_id;

            $single_member = $this->app_user_model->get_single_member_by_id($member_id_dec);
            $data['single_member'] = $single_member;
            $single_member_full_name = $single_member['full_name'];
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
                $data['active'] = 'team_members';
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
        $this->app_user_model->delete_member_image($member_id_dec);
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
        $data['page_backlink'] = base_url().'admin/configuration';
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
            $data['page_backlink'] = base_url().'admin/configuration';
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
                $data['active'] = 'social_icon';
                $data['common_header'] = 'Add Social Icon';
                $data['full_name'] = $this->session->userdata('full_name');


                /*==================================================
              Start of Pagination Code segment for service page
              ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count_of_social_icons();
                $config['per_page'] = 5;
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
                $data['active'] = 'social_icon';
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
    public function add_service_page()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('service_name', 'This Service Name', 'trim|required|min_length[4]|callback_unique_service_name');
            $this->form_validation->set_rules('service_details', 'This Service Details', 'required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            $this->form_validation->set_rules('service_page_url', 'This URL');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Add Services - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'add_service_page';
                $data['full_name'] = $this->session->userdata('full_name');

                /*==================================================
                 Start of Pagination Code segment for service page
                 ===================================================*/

                $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
                $config['total_rows'] = $this->app_user_model->total_count();
                $config['per_page'] = 5;
                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                $config['uri_segment'] = 3;
                $config['base_url'] = base_url() . 'admin/add_service_page';
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
                $this->add_service();
            }
        }
    }

    public function add_service()
    {
        $this->app_user_model->add_services();
        $this->session->set_flashdata('success_msg', 'Service name has been saved successfully');
        redirect(base_url() . 'admin/service', 'refresh');

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
                $data['active'] = 'add_service_page';
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
        $this->session->set_flashdata('delete_message', '<p>Service is successfully deleted!</p>');
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
                redirect(base_url() . '/admin/profile', 'refresh');
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