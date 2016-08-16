<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {
        $all_active_news = $this->main_ui_model->get_active_news();
        $data['all_active_news'] = $all_active_news;

        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;


        $data['title'] = 'News & Events - Shwapno Duar IT Ltd.';
        $data['active'] = 'news';
        $data['title_area_heading_h2'] = 'News & Events';

        $this->load->view('index/header', $data);
        $this->load->view('news/body', $data);
        $this->load->view('index/footer', $data);
    }

    function details_news()
    {
        $this->url_segment = $this->uri->segment(3);
        $news_page_url = base_url() . 'news/details/' . $this->url_segment;

        $single_active_news = $this->main_ui_model->get_active_news_by_page_url($news_page_url);
        $data['single_active_news'] = $single_active_news;

        $all_active_news = $this->main_ui_model->get_active_news();
        $data['all_active_news'] = $all_active_news;

        $system_config_id = 1;
        $all_system_configuration = $this->app_user_model->get_system_configuration_by_id($system_config_id); // Reading and showing the System configuration from DB
        $data['all_system_configuration_ui'] = $all_system_configuration;

        $active_social_icons = $this->main_ui_model->get_social_icon_by_is_active(1); // Reading and showing Only the Active Social Icons list from DB by setting is_active = 1
        $data['active_social_icons'] = $active_social_icons;


        $all_services = $this->main_ui_model->get_service_by_is_active(1); // Reading and showing the Service list from DB by setting is_active = 1
        $data['all_services'] = $all_services;

        $data['title'] = $single_active_news['news_title'] . ' - Shwapno Duar IT Ltd.';
        $data['active'] = 'news';
        $data['title_area_heading_h2'] = $single_active_news['news_title'];
        $data['news_page_url'] = $news_page_url;

        $this->load->view('index/header', $data);
        $this->load->view('news/details_news', $data);
        $this->load->view('index/footer', $data);

    }
}