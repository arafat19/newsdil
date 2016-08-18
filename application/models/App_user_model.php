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

    /*function get_service()
    {
        $result = $this->db->get("service_list");
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }*/

    function get_project_title_list()
    {
        $this->db->select('project_id, project_title');
        $result = $this->db->get('sdil_projects');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_news_title_list()
    {
        $this->db->select('id, news_title');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_news');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_active_job_title_list()
    {
        $this->db->select('job_id, job_title');
        $this->db->where('is_active', 1);
        $result = $this->db->get('sdil_jobs');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_service()
    {
        $this->db->select('id, service_name');
        $result = $this->db->get('service_list');
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function total_count_of_service()
    {
        return $this->db->count_all("service_list");
    }

    public function total_count_of_active_service()
    {
        return $this->db
            ->where('is_active', 1)
            ->count_all_results("service_list");
    }

    public function get_services($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("service_list");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function get_active_service_by_page_url($service_page_url)
    {
        $this->db->select('*');
        $this->db->where('service_page_url', $service_page_url);
        $this->db->where('is_active', 1);
        $query = $this->db->get('service_list');
        return $query->row_array();
    }

    public function get_active_project_by_page_url($project_page_url)
    {

        $this->db->select('sdil_projects.*, sdil_project_category.project_category_name');
        $this->db->from('sdil_projects');
        $this->db->join('sdil_project_category', 'sdil_project_category.project_category_id = sdil_projects.project_category_id');
        $this->db->where('sdil_projects.project_internal_link', $project_page_url);
        $this->db->where('sdil_projects.is_active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_active_job_by_page_url($job_page_url)
    {
        $this->db->select('*');
        $this->db->where('job_page_url', $job_page_url);
        $this->db->where('is_active', 1);
        $query = $this->db->get('sdil_jobs');
        return $query->row_array();
    }

    public function get_active_news_by_page_url($news_page_url)
    {
        $this->db->select('*');
        $this->db->where('news_page_url', $news_page_url);
        $this->db->where('is_active', 1);
        $query = $this->db->get('sdil_news');
        return $query->row_array();
    }

    public function total_count_of_testimonials()
    {
        return $this->db->count_all("sdil_testimonials");
    }

    public function total_count_of_partners()
    {
        return $this->db->count_all("sdil_partners");
    }

    public function total_count_of_project_cat()
    {
        return $this->db->count_all("sdil_project_category");
    }

    public function total_count_of_test_questions()
    {
        return $this->db->count_all("sdil_question");
    }

    public function total_count_of_test_questions_by_job_id($job_id)
    {
        return $this->db
            ->where('job_id', $job_id)
            ->count_all_results('sdil_question');
    }

    public function total_count_of_active_projects()
    {
        return $this->db
            ->where('is_active', 1)
            ->count_all_results("sdil_projects");
    }

    public function total_count_of_projects()
    {
        return $this->db->count_all("sdil_projects");
    }

    public function total_count_of_jobs()
    {
        return $this->db->count_all("sdil_jobs");
    }

    public function total_count_of_skill_category()
    {
        return $this->db->count_all("sdil_skill_category");
    }

    public function total_count_of_skills()
    {
        return $this->db->count_all("sdil_skills");
    }

    public function total_count_of_applicants()
    {
        return $this->db->count_all("sdil_job_applicants");
    }

    public function get_all_testimonials($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("sdil_testimonials");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function get_all_partners($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("sdil_partners");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function get_all_project_cat($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("project_category_id", "desc");
        $query = $this->db->get("sdil_project_category");

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function get_all_projects($limit, $start)
    {
        $this->db->select('sdil_projects.*, sdil_project_category.project_category_name');
        $this->db->from('sdil_projects');
        $this->db->join('sdil_project_category', 'sdil_project_category.project_category_id = sdil_projects.project_category_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("project_id", "desc");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function get_all_jobs($limit, $start)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->order_by("job_id", "desc");
        $query = $this->db->get('sdil_jobs');

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function get_all_news($limit, $start)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('sdil_news');

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function get_all_questions($limit, $start)
    {
        $this->db->select('sdil_question.*, sdil_jobs.job_title');
        $this->db->from('sdil_question');
        $this->db->join('sdil_jobs', 'sdil_jobs.job_id = sdil_question.job_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("question_id", "desc");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function get_all_questions_by_job_id($job_id)
    {
        $this->db->select('sdil_question.*, sdil_jobs.job_title');
        $this->db->from('sdil_question');
        $this->db->join('sdil_jobs', 'sdil_jobs.job_id = sdil_question.job_id');
        $this->db->where('sdil_question.job_id', $job_id);
        $this->db->order_by("question_id", "ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }


    public function get_all_skills($limit, $start)
    {
        $this->db->select('sdil_skills.*, sdil_skill_category.skill_category_name');
        $this->db->from('sdil_skills');
        $this->db->join('sdil_skill_category', 'sdil_skill_category.skill_category_id = sdil_skills.skill_category_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function get_all_skill_category($limit, $start)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->order_by("skill_category_id", "desc");
        $query = $this->db->get('sdil_skill_category');

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function get_all_applicants($limit, $start)
    {
        $this->db->select('sdil_job_applicants.*, sdil_jobs.job_title');
        $this->db->from('sdil_job_applicants');
        $this->db->join('sdil_jobs', 'sdil_jobs.job_id = sdil_job_applicants.applied_job_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("sdil_job_applicants.applied_job_id", "ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    public function delete_applicant($applicant_id)
    {
        $this->db->where('id', $applicant_id);
        $this->db->delete('sdil_job_applicants');
    }

    public function total_count_of_social_icons()
    {
        return $this->db->count_all("social_icon");
    }

    public function total_count_of_news()
    {
        return $this->db->count_all("sdil_news");
    }

    public function total_count_of_active_news()
    {
        return $this->db
            ->where('is_active', 1)
            ->count_all_results("sdil_news");
    }

    public function get_social_icon($limit, $start)
    {
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

    public function get_company_overview_by_id($company_overview_id)
    {
        $this->db->select('*');
        $this->db->where('id', $company_overview_id);
        $query = $this->db->get('sdil_overview');

        return $query->row_array();
    }

    public function get_single_member_by_id($member_id)
    {
        $this->db->select('*');
        $this->db->where('id', $member_id);
        $query = $this->db->get('team_members');

        return $query->row_array();
    }

    public function get_single_partner_by_id($partner_id)
    {
        $this->db->select('*');
        $this->db->where('id', $partner_id);
        $query = $this->db->get('sdil_partners');

        return $query->row_array();
    }

    public function get_single_project_cat_by_id($project_category_id)
    {
        $this->db->select('*');
        $this->db->where('project_category_id', $project_category_id);
        $query = $this->db->get('sdil_project_category');

        return $query->row_array();
    }


    public function get_single_project_by_id($project_id)
    {
        $this->db->select('sdil_projects.*, sdil_project_category.project_category_name');
        $this->db->from('sdil_projects');
        $this->db->join('sdil_project_category', 'sdil_project_category.project_category_id = sdil_projects.project_category_id');
        $this->db->where('project_id', $project_id);
        $query = $this->db->get();

        return $query->row_array();
    }


    public function get_single_test_question_by_id($question_id)
    {
        $this->db->select('sdil_question.*, sdil_jobs.job_title');
        $this->db->from('sdil_question');
        $this->db->join('sdil_jobs', 'sdil_question.job_id = sdil_jobs.job_id');
        $this->db->where('question_id', $question_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_single_job_by_id($job_id)
    {
        $this->db->select('*');
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('sdil_jobs');
        return $query->row_array();
    }

    public function get_single_news_by_id($news_id)
    {
        $this->db->select('*');
        $this->db->where('id', $news_id);
        $query = $this->db->get('sdil_news');
        return $query->row_array();
    }

    public function get_single_skill_by_id($skill_id)
    {
        $this->db->select('sdil_skills.*, sdil_skill_category.skill_category_name');
        $this->db->from('sdil_skills');
        $this->db->join('sdil_skill_category', 'sdil_skill_category.skill_category_id = sdil_skills.skill_category_id');
        $this->db->where('id', $skill_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_single_skill_cat_by_id($skill_cat_id)
    {
        $this->db->select('*');
        $this->db->where('skill_category_id', $skill_cat_id);
        $query = $this->db->get('sdil_skill_category');
        return $query->row_array();
    }

    public function get_single_applicant_by_id($applicant_id)
    {
        $this->db->select('sdil_job_applicants.*, sdil_jobs.job_title');
        $this->db->from('sdil_job_applicants');
        $this->db->join('sdil_jobs', 'sdil_jobs.job_id = sdil_job_applicants.applied_job_id');
        $this->db->where('sdil_job_applicants.id', $applicant_id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_single_testimonial_by_id($testimonial_id)
    {
        $this->db->select('*');
        $this->db->where('id', $testimonial_id);
        $query = $this->db->get('sdil_testimonials');

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

    public function update_company_overview()
    {
        $data = array(
            'company_overview' => $this->input->post('company_overview')
        );
        $this->db->update('sdil_overview', $data);
    }

    function update_image($table_name, $data)
    {
        $this->db->update($table_name, $data);
    }

    function update_single_image($table_id_dec, $table_name, $data)
    {
        $id = 'id';
        if ($table_name == 'sdil_projects') {
            $id = 'project_id';
        }
        $this->db->where($id, $table_id_dec);
        $this->db->update($table_name, $data);
    }

    public function add_services()
    {
        $total_des_div = $this->input->post('service_details');
        $is_active = $this->input->post('is_active') ? 1 : 0;
        $service_page_url = $this->input->post('service_page_url');

        $data = array(
            'service_name' => $this->input->post('service_name'),
            'icon_class_name' => $this->input->post('icon_class_name'),
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

    public function add_project_category($data)
    {
        $this->db->insert('sdil_project_category', $data);
    }

    public function add_projects($data)
    {
        $this->db->insert('sdil_projects', $data);
    }

    public function add_jobs($data)
    {
        $this->db->insert('sdil_jobs', $data);
    }

    public function add_news($data)
    {
        $this->db->insert('sdil_news', $data);
    }

    public function add_test_question($data)
    {
        $this->db->insert('sdil_question', $data);
    }

    public function add_skills($data)
    {
        $this->db->insert('sdil_skills', $data);
    }

    public function add_skill_category($data)
    {
        $this->db->insert('sdil_skill_category', $data);
    }

    public function add_project_pages($project_id)
    {
        $data = array(
            'project_page_description' => $this->input->post('page_description')
        );
        $this->db->where('project_id', $project_id);
        $this->db->update('sdil_projects', $data);
    }

    public function add_news_pages($news_id)
    {
        $data = array(
            'news_details' => $this->input->post('news_details')
        );
        $this->db->where('id', $news_id);
        $this->db->update('sdil_news', $data);
    }

    public function add_job_pages($job_id)
    {
        $data = array(
            'job_detail_description' => $this->input->post('job_detail_description'),
            'job_requirements' => $this->input->post('job_requirements')
        );
        $this->db->where('job_id', $job_id);
        $this->db->update('sdil_jobs', $data);
    }

    public function add_service_pages($service_id)
    {
        $data = array(
            'service_page_description' => $this->input->post('page_description')
        );
        $this->db->where('id', $service_id);
        $this->db->update('service_list', $data);
    }

    public function add_partners($data)
    {
        $this->db->insert('sdil_partners', $data);
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

    public function delete_projects_image($project_id)
    {
        $data = array(
            'project_image' => ''
        );
        $this->db->where('project_id', $project_id);
        $this->db->update('sdil_projects', $data);
    }

    public function delete_news_image($news_id)
    {
        $data = array(
            'news_image' => ''
        );
        $this->db->where('id', $news_id);
        $this->db->update('sdil_news', $data);
    }

    public function delete_partners_image($member_id)
    {
        $data = array(
            'partner_image' => ''
        );
        $this->db->where('id', $member_id);
        $this->db->update('sdil_partners', $data);
    }

    public function delete_member($member_id)
    {
        $this->db->where('id', $member_id);
        $this->db->delete('team_members');
    }

    public function delete_partner($partner_id)
    {
        $this->db->where('id', $partner_id);
        $this->db->delete('sdil_partners');
    }

    public function delete_project_category($project_category_id)
    {
        $this->db->where('project_category_id', $project_category_id);
        $this->db->delete('sdil_project_category');
    }

    public function delete_testimonial($testimonial_id)
    {
        $this->db->where('id', $testimonial_id);
        $this->db->delete('sdil_testimonials');
    }

    public function delete_project($project_id)
    {
        $this->db->where('project_id', $project_id);
        $this->db->delete('sdil_projects');
    }

    public function delete_job($job_id)
    {
        $this->db->where('job_id', $job_id);
        $this->db->delete('sdil_jobs');
    }

    public function delete_test_question($question_id)
    {
        $this->db->where('question_id', $question_id);
        $this->db->delete('sdil_question');
    }

    public function delete_news($news_id)
    {
        $this->db->where('id', $news_id);
        $this->db->delete('sdil_news');
    }

    public function delete_company_skill($skill_id)
    {
        $this->db->where('id', $skill_id);
        $this->db->delete('sdil_skills');
    }

    public function delete_company_skill_category($skill_cat_id)
    {
        $this->db->where('skill_category_id', $skill_cat_id);
        $this->db->delete('sdil_skill_category');
    }

    public function delete_social_icon($social_icon_id)
    {
        $this->db->where('id', $social_icon_id);
        $this->db->delete('social_icon');
    }


    public function get_service_by_id($service_id)
    {
        $this->db->select('*');
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

    public function exist_test_question($question)
    {
        $this->db->where('question_description', $question);
        $query = $this->db->get('sdil_question');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_skill_name($name)
    {
        $this->db->where('skill_name', $name);
        $query = $this->db->get('sdil_skills');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_skill_category_name($name)
    {
        $this->db->where('skill_category_name', $name);
        $query = $this->db->get('sdil_skill_category');
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

    public function exist_project_cat_code($cat_code)
    {
        $this->db->where('project_category_code', $cat_code);
        $query = $this->db->get('sdil_project_category');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_job_page_url($job_page_url)
    {
        $this->db->where('job_page_url', $job_page_url);
        $query = $this->db->get('sdil_jobs');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_project_cat_name($cat_name)
    {
        $this->db->where('project_category_name', $cat_name);
        $query = $this->db->get('sdil_project_category');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_project_title($project_title)
    {
        $this->db->where('project_title', $project_title);
        $query = $this->db->get('sdil_projects');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_job_title($job_title)
    {
        $this->db->where('job_title', $job_title);
        $query = $this->db->get('sdil_jobs');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_page_title($page_title)
    {
        $this->db->where('page_title', $page_title);
        $query = $this->db->get('sdil_page_manager');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_page_link($page_link)
    {
        $this->db->where('service_page_url', $page_link);
        $query = $this->db->get('service_list');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_partner_name($partner_name)
    {
        $this->db->where('partner_name', $partner_name);
        $query = $this->db->get('sdil_partners');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_news_title($news_title)
    {
        $this->db->where('news_title', $news_title);
        $query = $this->db->get('sdil_news');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_news_page_url($news_page_url)
    {
        $this->db->where('news_page_url', $news_page_url);
        $query = $this->db->get('sdil_news');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function exist_partner_internal_link($partner_internal_link)
    {
        $this->db->where('partner_internal_link', $partner_internal_link);
        $query = $this->db->get('sdil_partners');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_partner_external_link($partner_external_link)
    {
        $this->db->where('partner_external_link', $partner_external_link);
        $query = $this->db->get('sdil_partners');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_project_internal_link($partner_internal_link)
    {
        $this->db->where('project_internal_link', $partner_internal_link);
        $query = $this->db->get('sdil_projects');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_project_external_link($partner_external_link)
    {
        $this->db->where('project_external_link', $partner_external_link);
        $query = $this->db->get('sdil_projects');
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

        if ($count_row == 1) {
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

    public function exist_team_member_edit($field, $attr)
    {
        $this->db->where($field, $attr);
        $query = $this->db->get('team_members');
        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function exist_testimonial_edit($field, $attr)
    {
        $this->db->where($field, $attr);
        $query = $this->db->get('sdil_testimonials');
        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function exist_social_icon_edit($field, $attr)
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

    public function update_service_page($service_id)
    {
        $data = array(
            'service_page_description' => $this->input->post('page_description')
        );
        $this->db->where('id', $service_id);
        $this->db->update('service_list', $data);
    }

    public function update_project_page($project_id)
    {
        $data = array(
            'project_page_description' => $this->input->post('page_description')
        );
        $this->db->where('project_id', $project_id);
        $this->db->update('sdil_projects', $data);
    }

    public function update_job_page($job_id)
    {
        $data = array(
            'job_detail_description' => $this->input->post('job_detail_description'),
            'job_requirements' => $this->input->post('job_requirements')
        );
        $this->db->where('job_id', $job_id);
        $this->db->update('sdil_jobs', $data);
    }

    public function update_news_page($news_id)
    {
        $data = array(
            'news_details' => $this->input->post('news_details')
        );
        $this->db->where('id', $news_id);
        $this->db->update('sdil_news', $data);
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

    public function update_testimonial($data, $testimonial_id)
    {
        $this->db->where('id', $testimonial_id);
        $this->db->update('sdil_testimonials', $data);
    }

    public function update_partner($data, $partner_id)
    {
        $this->db->where('id', $partner_id);
        $this->db->update('sdil_partners', $data);
    }

    public function update_project_cat($data, $project_category_id)
    {
        $this->db->where('project_category_id', $project_category_id);
        $this->db->update('sdil_project_category', $data);
    }

    public function update_project($data, $project_id)
    {
        $this->db->where('project_id', $project_id);
        $this->db->update('sdil_projects', $data);
    }

    public function update_job($data, $job_id)
    {
        $this->db->where('job_id', $job_id);
        $this->db->update('sdil_jobs', $data);
    }

    public function update_test_question($data, $question_id_dec)
    {
        $this->db->where('question_id', $question_id_dec);
        $this->db->update('sdil_question', $data);
    }

    public function update_news($data, $news_id)
    {
        $this->db->where('id', $news_id);
        $this->db->update('sdil_news', $data);
    }

    public function update_skill($data, $skill_id)
    {
        $this->db->where('id', $skill_id);
        $this->db->update('sdil_skills', $data);
    }

    public function update_skill_cat($data, $skill_cat_id)
    {
        $this->db->where('skill_category_id', $skill_cat_id);
        $this->db->update('sdil_skill_category', $data);
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