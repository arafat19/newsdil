<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_user_model');
        $this->load->model('Main_ui_model');
    }

    public function index()
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

                $result = $this->App_user_model->login($email, $password);
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

    public function get_all_contacts()
    {
        if (($this->session->userdata('user_email') == "")) {
            redirect('/admin', 'refresh');
        } else {
            $contact_obj = $this->Main_ui_model->get_contacts();
            $data['all_contacts'] = $contact_obj;

            $data['title'] = 'All Services List - Shwapno Duar IT Ltd.';
            $data['navbar_title'] = 'SDIL Admin Panel';
            $data['active'] = 'all_contacts';
            $data['full_name'] = $this->session->userdata('full_name');

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_all_contact_list_view', $data);
            $this->load->view('admin/footer_view', $data);
        }
    }

    public function delete_contacts($contact_id)
    {
        $contact_id = base64_decode($contact_id);
        $this->Main_ui_model->delete_contact($contact_id);
        $this->session->set_flashdata('contact_delete_message', 'Selected Contact is successfully deleted!');
        redirect(base_url() . 'admin/contacts');
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

                $all_services = $this->App_user_model->get_service(); // Reading and showing the Service list from DB
                $data['all_services'] = $all_services;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_add_service_view', $data);
                $this->load->view('admin/footer_view', $data);

            } else {
                $this->add_service();
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
            $service = $this->App_user_model->get_service_by_id($service_id);
            // field name, error message, validation rules
            $this->form_validation->set_rules('service_name', 'This Service Name', 'trim|required|min_length[4]|callback_unique_service_name_edit');
            $this->form_validation->set_rules('service_details', 'This Service Details', 'required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            $this->form_validation->set_rules('service_page_url', 'This URL');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Edit Services - Shwapno Duar IT Ltd.';
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'add_service_page';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['service'] = $service;

                $all_services = $this->App_user_model->get_service(); // Reading and showing the Service list from DB
                $data['all_services'] = $all_services;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_edit_service_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->App_user_model->update_service($service_id);
                $this->session->set_flashdata('update_message', "Selected Service updated successfully.");
                //echo "<script> alert('Selected Service updated successfully.');</script>";
                redirect(base_url() . 'admin/service');
            }
        }
    }

    public function delete_service($service_id)
    {
        $service_id = base64_decode($service_id);
        $this->App_user_model->delete_service($service_id);
        $this->session->set_flashdata('delete_message', '<p>Service is successfully deleted!</p>');
        redirect(base_url() . 'admin/service');
    }

    public function add_service()
    {
        $this->App_user_model->add_services();
        $this->session->set_flashdata('success_msg', 'Service name has been saved successfully');
        redirect(base_url() . 'admin/service', 'refresh');

    }

    function unique_service_name($str)
    {
        $this->load->model('App_user_model');
        if (!$this->App_user_model->exist_service_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_service_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_service_name_edit($str)
    {
        $this->load->model('App_user_model');
        if (!$this->App_user_model->exist_service_name_edit($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_service_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function not_found_email($str)
    {
        $this->load->model('App_user_model');
        if (!$this->App_user_model->check_user_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('not_found_email', "%s {$str} not found!");
            return FALSE;
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

    /*public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('pass'));

        $result = $this->App_user_model->login($email, $password);
        if ($result) $this->welcome();
        else        $this->index();
    }*/

    public function thank()
    {
        $data['title'] = 'Admin Registration Completed- Shwapno Duar IT Ltd.';
        $data['completed'] = 'Admin Registration is Completed. You will be redirected to Log In page within 3 Seconds.';
        $this->load->view('admin/header_view', $data);
        $this->load->view('admin/thank_view.php', $data);
        $this->load->view('admin/footer_view', $data);
    }


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
            $this->App_user_model->add_user();
            $this->thank(); ?>
            <script language='javascript' type='text/javascript'>
                setTimeout(function () {
                    window.location.href = '<?php echo base_url(); ?>admin';
                }, 3000); // 3 seconds
            </script><?php
        }
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
                $particular_user = $this->App_user_model->get_user_by_id($user_id);
                $data['title'] = 'Edit Admin Profile- Shwapno Duar IT Ltd.';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['navbar_title'] = 'SDIL Admin Panel';
                $data['active'] = 'admin_profile';
                $data['particular_user'] = $particular_user;
                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_profile_update_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $this->App_user_model->update_user_info($user_id);
                $this->session->set_flashdata('user_info_update_message', "Your information updated successfully.");
                redirect(base_url() . '/admin/profile', 'refresh');
            }
        }
    }

    function unique_user_email_edit($str)
    {
        $this->load->model('App_user_model');
        if (!$this->App_user_model->exist_email_edit($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_user_email_edit', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_email($str)
    {
        $this->load->model('App_user_model');
        if (!$this->App_user_model->exist_user_email($str)) {
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
            'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/admin', 'refresh');
    }
}