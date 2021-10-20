<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Thông Tin Website',
        'menu_title' => 'Thông Tin Website',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        // 'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý thông tin chung',
        'menu_title' => 'Quản lý thông tin chung',
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_page(array(
        'page_title' => 'Quản lý giao diện',
        'menu_title' => 'Quản lý giao diện',
        'menu_slug' => 'layout-options',
        'capability' => 'edit_posts',
        // 'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý slider',
        'menu_title' => 'Quản lý slider',
        'parent_slug' => 'layout-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý hình ảnh',
        'menu_title' => 'Quản lý hình ảnh',
        'parent_slug' => 'layout-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý trang chủ',
        'menu_title' => 'Quản lý trang chủ',
        'parent_slug' => 'layout-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý Header',
        'menu_title' => 'Quản lý Header',
        'parent_slug' => 'layout-options',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Quản lý Footer',
        'menu_title' => 'Quản lý Footer',
        'parent_slug' => 'layout-options',
    ));
}