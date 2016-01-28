<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_ui_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_service_by_is_active($is_active)
    {
        $this->db->select('id, service_name, total_description_div, is_active,service_page_url');
        $this->db->where('is_active', $is_active);
        $result = $this->db->get('service_list');

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }

    }

    public function get_social_icon_by_is_active($is_active)
    {
        $this->db->select('id, social_icon_name, social_icon_link, social_icon_logo_class_name, is_active');
        $this->db->where('is_active', $is_active);
        $result = $this->db->get('social_icon');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }

    }

    public function submit_contact_request()
    {
        $human_check = $this->input->post('human');
        if ($human_check == 5) {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'cell_number' => $this->input->post('cell_number'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),

            );
            $this->db->insert('contact_us', $data);
            return TRUE;
        } else {
            return false;
        }

    }

    public function get_contacts()
    {
        $result = $this->db->get("contact_us");
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function delete_contact($contact_id)
    {
        $this->db->where('id', $contact_id);
        $this->db->delete('contact_us');
    }
}