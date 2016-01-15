<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function login($email, $password)
    {
        $this->db->where("email", $email);
        $this->db->where("password", $password);

        $query = $this->db->get("app_user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $newdata = array(
                    'user_id' => $rows->id,
                    'user_email' => $rows->email,
                    'full_name' => $rows->full_name,
                    'logged_in' => TRUE,
                );
            }
            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }

    function get_service()
    {
        $result = $this->db->get("service_list");
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }


    public function get_system_configuration_by_id($system_config_id)
    {
        $this->db->select('top_heading1, top_heading2, footer_text, meta_keyword, meta_description');
        $this->db->where('id', $system_config_id);
        $query = $this->db->get('system_configuration');

        return $query->row_array();
    }

    public function add_user()
    {
        $data = array(
            'full_name' => $this->input->post('name'),
            'cell_number' => $this->input->post('cell_number'),
            'enabled' => $this->input->post('enabled'),
            'password' => md5($this->input->post('password')),
            'password_expired' => $this->input->post('password_expired'),
            'password_reset_validity' => $this->input->post(date("Y-m-d")),
            'email' => $this->input->post('email')

        );
        $this->db->insert('app_user', $data);
    }

    public function update_system_config()
    {
        $data = array(
            'top_heading1' => $this->input->post('top_heading1'),
            'top_heading2' => $this->input->post('top_heading2'),
            'footer_text' => $this->input->post('footer_text'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_desc'),
            'favicon' => $this->input->post('show_favicon'),
        );
        $this->db->update('system_configuration', $data);
    }
    function update_image($data)
    {
        $this->db->update('system_configuration',$data);
    }

    public function add_services()
    {
        $total_des_div = $this->input->post('service_details');
        $is_active = $this->input->post('is_active') ? 1 : 0;
        $service_page_url = $this->input->post('service_page_url');

        $data = array(
            'service_name' => $this->input->post('service_name'),
            'total_description_div' => $total_des_div,
            'is_active' => $is_active,
            'service_page_url' => $service_page_url
        );
        $this->db->insert('service_list', $data);
    }

    public function delete_service($service_id)
    {
        $this->db->where('id', $service_id);
        $this->db->delete('service_list');
    }

    public function get_service_by_id($service_id)
    {
        $this->db->select('id, service_name, total_description_div, is_active, service_page_url');
        $this->db->where('id', $service_id);
        $query = $this->db->get('service_list');

        return $query->row_array();
    }
    public function get_user_by_id($user_id)
    {
        $this->db->select('id, full_name, cell_number, password, email');
        $this->db->where('id', $user_id);
        $result = $this->db->get('app_user');

        return $result->row_array();
    }

    public function exist_user_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('app_user');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_service_name($name)
    {
        $this->db->where('service_name', $name);
        $query = $this->db->get('service_list');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_service_name_edit($name)
    {
        $this->db->where('service_name', $name);
        $query = $this->db->get('service_list');
        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function exist_email_edit($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('app_user');
        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_user_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('app_user');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update_service($service_id)
    {
        $total_des_div = $this->input->post('service_details');
        $is_active = $this->input->post('is_active') ? 1 : 0;
        $service_page_url = $this->input->post('service_page_url');

        $data = array(
            'service_name' => $this->input->post('service_name'),
            'total_description_div' => $total_des_div,
            'is_active' => $is_active,
            'service_page_url' => $service_page_url
        );
        $this->db->where('id', $service_id);
        $this->db->update('service_list', $data);
    }
    public function update_user_info($user_id)
    {
        $data = array(
            'full_name' => $this->input->post('name'),
            'cell_number' => $this->input->post('cell_number'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );

        $this->db->where('id', $user_id);
        $this->db->update('app_user', $data);
    }


}