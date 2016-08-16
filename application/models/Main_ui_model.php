<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_ui_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_service_by_is_active($is_active)
    {
        $this->db->select('*');
        $this->db->where('is_active', $is_active);
        $result = $this->db->get('service_list');

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }

    }
    public function get_active_news()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_news');

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }

    }

    public function get_active_news_by_page_url($news_page_url)
    {
        $this->db->select('*');
        $this->db->where('news_page_url', $news_page_url);
        $this->db->where('is_active', 1);
        $query = $this->db->get('sdil_news');
        return $query->row_array();
    }

    public function get_jobs_by_is_active()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_jobs');

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }

    }

    public function get_project_by_project_category_is_active($active_project_category_id)
    {
        $this->db->select('*');
        $this->db->where('project_category_id', $active_project_category_id);
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_projects');

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

    function get_active_team_members()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('team_members');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_active_testimonials()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_testimonials');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_active_partners()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_partners');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_active_project_category()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_project_category');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    function get_active_skill_category()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_skill_category');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_active_skills()
    {
        $this->db->select('sdil_skills.*, sdil_skill_category.skill_category_name');
        $this->db->from('sdil_skills');
        $this->db->join('sdil_skill_category', 'sdil_skill_category.skill_category_id = sdil_skills.skill_category_id');
        $this->db->where('sdil_skills.is_active', 1);
        $this->db->group_by("sdil_skill_category.skill_category_name, sdil_skills.skill_name");
        $this->db->order_by("sdil_skill_category.skill_category_id", "ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else{
            return NULL;
        }
    }

    public function get_active_projects()
    {
        $this->db->select('sdil_projects.*, sdil_project_category.project_category_code');
        $this->db->from('sdil_projects');
        $this->db->join('sdil_project_category', 'sdil_project_category.project_category_id = sdil_projects.project_category_id');
        $this->db->where('sdil_projects.is_active', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    function get_project_category_name_by_id($project_category_id)
    {
        $this->db->select('project_category_name');
        $this->db->where('project_category_id', $project_category_id);
        $result = $this->db->get('sdil_project_category');
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

    public function submit_job_application($data)
    {
        $this->db->insert('sdil_job_applicants', $data);
    }


    public function total_count_of_contacts()
    {
        return $this->db->count_all("contact_us");
    }

    public function get_contacts($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("contact_us");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function delete_contact($contact_id)
    {
        $this->db->where('id', $contact_id);
        $this->db->delete('contact_us');
    }

    public function exist_applicant_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('sdil_job_applicants');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function exist_applicant_mobile_no($mobile_no)
    {
        $this->db->where('mobile_no', $mobile_no);
        $query = $this->db->get('sdil_job_applicants');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}