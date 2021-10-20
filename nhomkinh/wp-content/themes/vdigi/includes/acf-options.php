<?php
if ( function_exists('acf_add_options_page') )
{
    acf_add_options_page(array(
        'page_title'    => 'Thông Tin Website',
        'menu_title'    => 'Thông Tin Website',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
// 'redirect'       => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Quản lý thông tin chung',
        'menu_title'    => 'Quản lý thông tin chung',
        'parent_slug'   => 'theme-options',
    ));
// admin layout
//
    acf_add_options_page(array(
        'page_title'    => 'Quản Lý Giao Diện',
        'menu_title'    => 'Quản Lý Giao Diện',
        'menu_slug'     => 'layout-admin',
        'capability'    => 'edit_posts',
// 'redirect'       => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Quản lý thông tin chung',
        'menu_title'    => 'Quản lý thông tin chung',
        'parent_slug'   => 'layout-admin',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Hình Ảnh Website',
        'menu_title'    => 'Hình Ảnh Website',
        'parent_slug'   => 'layout-admin',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Vì Sao Chọn Chúng Tôi',
        'menu_title'    => 'Vì Sao Chọn Chúng Tôi',
        'parent_slug'   => 'layout-admin',
    ));
    
}
// END ACF OPTION
//
//
function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);
// ----------------
add_theme_support('post-thumbnails');
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_tax() ) {
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});
// ----- Register Custom Post -------
function createProductPostTypesp() {
    $labels = array(
        'name'                    =>        'Sản Phẩm',
        'singular_name'            =>        'Sản Phẩm',
        'add_new'                =>        'Thêm mới',
        'add_new_item'            =>        'Thêm Sản Phẩm Mới',
        'edit_item'                =>        'Sửa Sản Phẩm',
        'view_item'                =>        'Xem Sản Phẩm',
        'new_item'                =>        'Sản Phẩm Mới',
        'all_items'                =>        'Tất cả Sản Phẩm',
    );
    $args = array(
        'labels'                =>        $labels,
        'public'                 =>         true,
        'publicly_queryable'     =>         true,
        'show_ui'                =>         true,
        'show_in_menu'           =>         true,
        'query_var'              =>         true,
        'has_archive'            =>         true,
        'rewrite'                =>         array( 'slug' => 'san-pham' ),
        'menu_position'            =>        40,
        'menu_icon'                =>        'dashicons-grid-view',
        'supports'               => array( 'title', 'editor', 'thumbnail'),
    );
    register_post_type( 'san-pham',$args );
}
add_action( 'init' , 'createProductPostTypesp' );
function createTaxForCustomPostType() {
    $labels    = array(
        'name'              => 'Danh Mục Sản Phẩm',
        'singular_name'     => 'Danh Mục Sản Phẩm',
        'search_items'      => 'Tìm Danh Mục ',
        'all_items'         => 'Tất cả danh mục',
        'parent_item'       => 'Danh mục cha ',
        'parent_item_colon' => 'Danh mục cha: ',
        'edit_item'         => 'Sửa danh mục ',
        'update_item'       => 'Cập nhật danh mục ',
        'add_new_item'      => 'Thêm danh mục mới',
        'new_item_name'     => 'Tên danh mục mới',
        'menu_name'         => 'Danh mục sản phẩm',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc' ),
    );
    register_taxonomy( 'danh-muc', array( 'san-pham' ), $args );
}
add_action( 'init' , 'createTaxForCustomPostType' );