<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class app_user_model extends CI_Model
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

    public function total_count() {
        return $this->db->count_all("service_list");
    }

    public function get_services($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("service_list");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function total_count_of_testimonials() {
        return $this->db->count_all("sdil_testimonials");
    }

    public function get_all_testimonials($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("sdil_testimonials");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function total_count_of_social_icons() {
        return $this->db->count_all("social_icon");
    }

    public function get_social_icon($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("social_icon");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }



    function get_all_team_members()
    {
        $result = $this->db->get("team_members");
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }


    public function get_system_configuration_by_id($system_config_id)
    {
        $this->db->select('top_heading1, top_heading2, footer_text, meta_keyword, meta_description,favicon,logo');
        $this->db->where('id', $system_config_id);
        $query = $this->db->get('system_configuration');

        return $query->row_array();
    }

    public function get_single_member_by_id($member_id)
    {
        $this->db->select('*');
        $this->db->where('id', $member_id);
        $query = $this->db->get('team_members');

        return $query->row_array();
    }

    public function get_system_favcion_by_id($system_config_id)
    {
        $this->db->select('favicon');
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

    function update_image($table_name,$data)
    {
        $this->db->update($table_name, $data);
    }

    function update_single_image($member_id_dec,$table_name,$data)
    {
        $this->db->where('id', $member_id_dec);
        $this->db->update($table_name, $data);
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

    public function add_social_icon($data)
    {
        $this->db->insert('social_icon', $data);
    }

    public function add_team_member($data)
    {
        $this->db->insert('team_members', $data);
    }
    public function add_testimonials($data)
    {
        $this->db->insert('sdil_testimonials', $data);
    }

    public function delete_service($service_id)
    {
        $this->db->where('id', $service_id);
        $this->db->delete('service_list');
    }
    public function delete_member_image($member_id)
    {
        $data = array(
            'personal_image' => ''
        );
        $this->db->where('id', $member_id);
        $this->db->update('team_members', $data);
    }

    public function delete_member($member_id)
    {
        $this->db->where('id', $member_id);
        $this->db->delete('team_members');
    }

    public function delete_social_icon($social_icon_id)
    {
        $this->db->where('id', $social_icon_id);
        $this->db->delete('social_icon');
    }


    public function get_service_by_id($service_id)
    {
        $this->db->select('id, service_name, total_description_div, is_active, service_page_url');
        $this->db->where('id', $service_id);
        $query = $this->db->get('service_list');

        return $query->row_array();
    }

    public function get_social_icon_by_id($socialicon_id)
    {
        $this->db->select('id, social_icon_name, social_icon_link, social_icon_logo_class_name, is_active');
        $this->db->where('id', $socialicon_id);
        $query = $this->db->get('social_icon');

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

    public function exist_sicon_name($name)
    {
        $this->db->where('social_icon_name', $name);
        $query = $this->db->get('social_icon');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_designation($designation)
    {
        $this->db->where('designation', $designation);
        $query = $this->db->get('team_members');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function exist_facebook($facebook_link)
    {
        $this->db->where('facebook_link', $facebook_link);
        $query = $this->db->get('team_members');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_twitter($twitter_link)
    {
        $this->db->where('twitter_link', $twitter_link);
        $query = $this->db->get('team_members');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function exist_linkedin($linkedin_link)
    {
        $this->db->where('linkedin_link', $linkedin_link);
        $query = $this->db->get('team_members');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_googleplus($googleplus_link)
    {
        $this->db->where('googleplus_link', $googleplus_link);
        $query = $this->db->get('team_members');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_sicon_link($name)
    {
        $this->db->where('social_icon_link', $name);
        $query = $this->db->get('social_icon');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_sicon_class_name($name)
    {
        $this->db->where('social_icon_logo_class_name', $name);
        $query = $this->db->get('social_icon');
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

        echo $count_row = $query->num_rows();

        if ( $count_row == 1) {
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
    public function exist_team_member_edit($field,$attr)
    {
        $this->db->where($field, $attr);
        $query = $this->db->get('team_members');
        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function exist_social_icon_edit($field,$attr)
    {
        $this->db->where($field, $attr);
        $query = $this->db->get('social_icon');
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

    public function update_social_icon($social_icon_id)
    {
        $is_active = $this->input->post('is_active') ? 1 : 0;
        $data = array(
            'social_icon_name' => $this->input->post('social_icon_name'),
            'social_icon_link' => $this->input->post('social_icon_link'),
            'social_icon_logo_class_name' => $this->input->post('social_icon_class_name'),
            'is_active' => $is_active
        );
        $this->db->where('id', $social_icon_id);
        $this->db->update('social_icon', $data);
    }

    public function update_team_members($member_id)
    {
        $is_active = $this->input->post('is_active') ? 1 : 0;
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'designation' => $this->input->post('designation'),
            'member_description' => $this->input->post('member_description'),
            'facebook_link' => $this->input->post('facebook_link'),
            'twitter_link' => $this->input->post('twitter_link'),
            'linkedin_link' => $this->input->post('linkedin_link'),
            'googleplus_link' => $this->input->post('googleplus_link'),
            'is_active' => $is_active
        );
        $this->db->where('id', $member_id);
        $this->db->update('team_members', $data);
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