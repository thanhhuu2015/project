<?php
/**
 * vdigi
 * Custom post type
 * @package vdigi
 * @author HieuD
 * @license GPL-2.0-or-later
 * @link
 */

if (!class_exists('VdigiCustomPostType')) {
    class VdigiCustomPostType
    {
        public function __construct()
        {
            $this->create_cpt_bds();
        }

        /**
         * Khu vực tạo các hàm trạng thái
         */
        public function create_cpt_bds()
        {
            add_action('init', array($this, 'custom_post_type_of_v_bds'), 0);
            add_action('init', array($this, 'custom_taxonomy_of_v_bds'), 0);
            //Các phần cấu hình cho post type và categry vừa tạo nếu có taxonomy
            new VdigiCustomPostTypeConfig('v_bds', 'v_category_of_bds');
        }

        /**
         * Khu vực tạo các hàm thực thi
         */
        public function custom_post_type_of_v_bds()
        {
            $labels = array(
                'name' => _x('Bất động sản', 'Post Type General Name', 'vdigi'),
                'singular_name' => _x('Bất động sản', 'Post Type Singular Name', 'vdigi'),
                'menu_name' => __('Bất động sản', 'vdigi'),
                'name_admin_bar' => __('Bất động sản', 'vdigi'),
                'archives' => __('Item Archives', 'vdigi'),
                'attributes' => __('Item Attributes', 'vdigi'),
                'parent_item_colon' => __('Parent Item:', 'vdigi'),
                'all_items' => __('Tất cả BĐS', 'vdigi'),
                'add_new_item' => __('Thêm mới BĐS', 'vdigi'),
                'add_new' => __('Thêm mới BĐS', 'vdigi'),
                'new_item' => __('Bất động sản mới', 'vdigi'),
                'edit_item' => __('Sửa BĐS', 'vdigi'),
                'update_item' => __('Cập nhật BĐS', 'vdigi'),
                'view_item' => __('Xem BĐS', 'vdigi'),
                'view_items' => __('Xem BĐS', 'vdigi'),
                'search_items' => __('Tìm kiếm', 'vdigi'),
                'not_found' => __('Không tìm thấy', 'vdigi'),
                'not_found_in_trash' => __('Không tìm thấy trong thùng rác', 'vdigi'),
                'featured_image' => __('Ảnh đại diện', 'vdigi'),
                'set_featured_image' => __('Chọn ảnh đại diện', 'vdigi'),
                'remove_featured_image' => __('Xóa ảnh đại diện', 'vdigi'),
                'use_featured_image' => __('Sử dụng ảnh đại diện', 'vdigi'),
                'insert_into_item' => __('Chèn BĐS', 'vdigi'),
                'uploaded_to_this_item' => __('Upload vào BĐS', 'vdigi'),
                'items_list' => __('Danh sách BĐS', 'vdigi'),
                'items_list_navigation' => __('Danh sách BĐS', 'vdigi'),
                'filter_items_list' => __('Lọc danh sách BĐS', 'vdigi'),
            );
            $rewrite = array(
                'slug' => _x('bat-dong-san', 'slug', 'vdigi'), //Slug của trang chi tiết Bất động sản
                'with_front' => true,
                'pages' => true,
                'feeds' => true,
            );
            $args = array(
                'label' => __('Bất động sản', 'vdigi'),
                'description' => __('Tạo bài viết vào mục BĐS', 'vdigi'),
                'labels' => $labels,
                'supports' => array('title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
                'taxonomies' => ['v_category_of_bds'],
                'hierarchical' => true,  //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
                'public' => true,   //Kích hoạt post type
                'show_ui' => true,   //Hiển thị khung quản trị như Post/Page
                'show_in_menu' => true,   //Hiển thị trên Admin Menu (tay trái)
                'menu_position' => 5,      //Thứ tự vị trí hiển thị trong menu (tay trái)
                'menu_icon' => 'dashicons-category', //Đường dẫn tới icon sẽ hiển thị, tại https://developer.wordpress.org/resource/dashicons/
                'show_in_admin_bar' => true,   //Hiển thị trong Appearance -> Menus
                'show_in_nav_menus' => true,
                'can_export' => true,   //Có thể export nội dung bằng Tools -> Export
                'has_archive' => true,   //Cho phép lưu trữ (month, date, year)
                'exclude_from_search' => false,  //Loại bỏ khỏi kết quả tìm kiếm
                'publicly_queryable' => true,   //Hiển thị các tham số trong query, phải đặt true
                'rewrite' => $rewrite,
                'capability_type' => 'post',  // or page
            );
            register_post_type('v_bds', $args);
        }

        public function custom_taxonomy_of_v_bds()
        {
            $labels = array(
                'name' => _x('Danh mục BĐS', 'Taxonomy General Name', 'vdigi'),
                'singular_name' => _x('Danh mục BĐS', 'Taxonomy Singular Name', 'vdigi'),
                'menu_name' => __('Danh mục BĐS', 'vdigi'),
                'all_items' => __('Tất cả danh mục', 'vdigi'),
                'parent_item' => __('Parent Item', 'vdigi'),
                'parent_item_colon' => __('Parent Item:', 'vdigi'),
                'new_item_name' => __('Danh mục mới', 'vdigi'),
                'add_new_item' => __('Thêm danh mục', 'vdigi'),
                'edit_item' => __('Sửa danh mục', 'vdigi'),
                'update_item' => __('Cập nhật danh mục', 'vdigi'),
                'view_item' => __('Xem danh mục', 'vdigi'),
                'separate_items_with_commas' => __('Separate items with commas', 'vdigi'),
                'add_or_remove_items' => __('Thêm hoặc xóa danh mục', 'vdigi'),
                'choose_from_most_used' => __('Chọn danh mục', 'vdigi'),
                'popular_items' => __('Danh mục dùng nhiều', 'vdigi'),
                'search_items' => __('Tìm kiếm', 'vdigi'),
                'not_found' => __('Không tìm thấy', 'vdigi'),
                'no_terms' => __('Không có danh mục', 'vdigi'),
                'items_list' => __('Danh sách danh mục', 'vdigi'),
                'items_list_navigation' => __('Items list navigation', 'vdigi'),
            );
            $rewrite = array(
                'slug' => 'danh-muc',
                'with_front' => true,
                'hierarchical' => false,
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'public' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'rewrite' => $rewrite,
                'show_in_rest' => false,
            );
            register_taxonomy('v_category_of_bds', array('v_bds'), $args);
        }
    }

    class VdigiCustomPostTypeConfig
    {
        public $data_post_type;
        public $data_taxonomy;

        function __construct($post_type, $taxonomy)
        {
            $this->data_post_type = $post_type;
            $this->data_taxonomy = $taxonomy;
            if ($taxonomy) {
                // Hiển thị form lọc theo danh mục ở admin
                add_action('restrict_manage_posts', array($this, 'v_filter_post_type_by_taxonomy'), 0);
                add_filter('parse_query', array($this, 'v_convert_id_to_term_in_query'));

                //BỎ TEXT MẶC ĐỊNH Ở SLUG KHI TẠO: TAXMONOMY
                //B1: xóa bỏ text mặc định ở url taxonomy
                add_filter('term_link', array($this, 'v_change_category_permalink'), 10, 3);

                //B2: Sửa đường dẫn taxonomy
                add_action('init', array($this, 'v_taxonomy_rewrite_rules'));

                // B3: Sửa lỗi khi tạo tax mới bị 404
                add_action('create_term', array($this, 'v_new_taxonomy_cat_edit_success'), 10, 2);
            }
        }

        /**
         * Hiển thị form lọc theo danh mục ở admin
         */

        public function v_filter_post_type_by_taxonomy()
        {
            global $typenow;
            $post_type = $this->data_post_type; // change to your post type
            $taxonomy = $this->data_taxonomy; // change to your taxonomy

            if ($typenow == $post_type) {
                $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
                $info_taxonomy = get_taxonomy($taxonomy);
                wp_dropdown_categories(array(
                    'show_option_all' => sprintf(__('Tất cả bài viết', 'vdigi'), $info_taxonomy->label),
                    'taxonomy' => $taxonomy,
                    'name' => $taxonomy,
                    'orderby' => 'name',
                    'selected' => $selected,
                    'show_count' => true,
                    'hide_empty' => true,
                ));
            };
        }

        public function v_convert_id_to_term_in_query($query)
        {
            global $pagenow;
            $post_type = $this->data_post_type; // change to your post type
            $taxonomy = $this->data_taxonomy; // change to your taxonomy

            $q_vars = &$query->query_vars;
            if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
                $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                $q_vars[$taxonomy] = $term->slug;
            }
        }

        /**
         * BỎ TEXT MẶC ĐỊNH Ở SLUG KHI TẠO: TAXMONOMY
         */

        //B1: xóa bỏ text mặc định ở url taxonomy

        public function v_change_category_permalink($url, $term, $taxonomy)
        {
            $taxonomy_slug = 'danh-muc'; //Thay bằng slug hiện tại của bạn. Mặc định là danh-muc dặt ở trên lúc tạo
            if (strpos($url, $taxonomy_slug) === FALSE) return $url;
            $url = str_replace('/' . $taxonomy_slug, '', $url);
            return $url;
        }

        //B2: Sửa đường dẫn taxonomy
        public function v_taxonomy_rewrite_rules($flash = false)
        {
            $terms = get_terms(array(
                'post_type' => $this->data_post_type,
                'taxonomy' => $this->data_taxonomy,
                'hide_empty' => false,
            ));

            if ($terms && !is_wp_error($terms)) {
                $siteurl = esc_url(home_url('/'));
                foreach ($terms as $term) {
                    $term_slug = $term->slug;
                    $baseterm = str_replace($siteurl, '', get_term_link($term->term_id, $this->data_taxonomy));
                    add_rewrite_rule($baseterm . '?$', 'index.php?' . $this->data_taxonomy . '=' . $term_slug, 'top');
                    add_rewrite_rule($baseterm . 'page/([0-9]{1,})/?$', 'index.php?' . $this->data_taxonomy . '=' . $term_slug . '&paged=$matches[1]', 'top');
                    add_rewrite_rule($baseterm . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?' . $this->data_taxonomy . '=' . $term_slug . '&feed=$matches[1]', 'top');
                }
            }

            if ($flash == true) {
                flush_rewrite_rules(false);
            }
        }

        // B3: Sửa lỗi khi tạo tax mới bị 404
        public function v_new_taxonomy_cat_edit_success($term_id, $taxonomy)
        {
            v_taxonomy_rewrite_rules(true);
        }
    }

    new VdigiCustomPostType();
}

function v_delete_post_type()
{
//    unregister_post_type('v_course');
//     unregister_post_type('v_course');

}

//$delete = add_action('init','v_delete_post_type'); var_dump($delete);