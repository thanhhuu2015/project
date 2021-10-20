<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists('Mega_Menu_Font_Awesome') ) :

/**
 *
 */
class Mega_Menu_Font_Awesome {

	/**
	 * Constructor
	 *
	 * @since 1.0
	 */
	public function __construct() {

		add_filter( 'megamenu_load_scss_file_contents', array( $this, 'append_fontawesome_scss'), 10 );
		add_filter( 'megamenu_icon_tabs', array( $this, 'font_awesome_selector'), 10, 5 );
		add_action( 'megamenu_enqueue_public_scripts', array ( $this, 'enqueue_public_scripts'), 10 );
        add_action( "megamenu_admin_scripts", array( $this, 'enqueue_admin_styles') );
		add_action( "admin_print_scripts-nav-menus.php", array( $this, 'enqueue_admin_styles' ) );
	}

    /**
     * Enqueue required CSS and JS for Mega Menu
     *
     */
    public function enqueue_admin_styles( $hook ) {
        wp_enqueue_style( 'megamenu-fontawesome4', plugins_url( 'css/font-awesome.min.css' , __FILE__ ), false, MEGAMENU_PRO_VERSION );
    }



	/**
	 * Add the CSS required to display fontawesome icons to the main SCSS file
	 *
	 * @since 1.0
	 * @param string $scss
	 * @return string
	 */
	public function append_fontawesome_scss( $scss ) {

		$path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'scss/fontawesome.scss';

		$contents = file_get_contents( $path );

 		return $scss . $contents;

	}


	/**
	 * Enqueue fontawesome CSS
	 *
	 * @since 1.0
	 */
	public function enqueue_public_scripts() {
		$settings = get_option("megamenu_settings");

        if ( is_array( $settings ) && isset( $settings['enqueue_fa_4'] ) && $settings['enqueue_fa_4'] == 'disabled' ) {
        	return;
        }

        wp_enqueue_style( 'megamenu-fontawesome', plugins_url( 'css/font-awesome.min.css' , __FILE__ ), false, MEGAMENU_PRO_VERSION );
	}


	/**
	 * Generate HTML for the font awesome selector
	 *
	 * @since 1.0
	 * @param array $tabs
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return array
	 */
	public function font_awesome_selector( $tabs, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {
		$settings = get_option("megamenu_settings");
        
        if ( is_array( $settings ) && isset( $settings['enqueue_fa_4'] ) && $settings['enqueue_fa_4'] == 'disabled' ) {
        	$html = "<div class='notice notice-warning'>" . __("Font Awesome 4 has been dequeued under Mega Menu > General Settings.", "megamenupro") . "</div>";
        } else {
        	$html = "";
        }

        foreach ( $this->icons() as $code => $class ) {

            $bits = explode( "-", $code );
            $code = "&#x" . $bits[1] . "";
            $type = $bits[0];

            $html .= "<div class='{$type}'>";
            $html .= "    <input class='radio' id='{$class}' type='radio' rel='{$code}' name='settings[icon]' value='{$class}' " . checked( $menu_item_meta['icon'], $class, false ) . " />";
            $html .= "    <label rel='{$code}' for='{$class}' title='{$class}'></label>";
            $html .= "</div>";

        }

		$tabs['fontawesome'] = array(
			'title' => __("Font Awesome 4", "megamenupro"),
			'active' => isset( $menu_item_meta['icon'] ) && substr( $menu_item_meta['icon'], 0, strlen("fa-") ) === "fa-",
			'content' => $html
		);

		return $tabs;

	}


	/**
	 * Return an array of font awesome icons
	 *
	 * @since 1.0
	 * @return array $icons
	 */
	public function icons() {

		$icons = array(
			"fa-f000" => "fa-glass",
			"fa-f001" => "fa-music",
			"fa-f002" => "fa-search",
			"fa-f003" => "fa-envelope-o",
			"fa-f004" => "fa-heart",
			"fa-f005" => "fa-star",
			"fa-f006" => "fa-star-o",
			"fa-f007" => "fa-user",
			"fa-f008" => "fa-film",
			"fa-f009" => "fa-th-large",
			"fa-f00a" => "fa-th",
			"fa-f00b" => "fa-th-list",
			"fa-f00c" => "fa-check",
			"fa-f00d" => "fa-times",
			"fa-f00e" => "fa-search-plus",
			"fa-f010" => "fa-search-minus",
			"fa-f011" => "fa-power-off",
			"fa-f012" => "fa-signal",
			"fa-f013" => "fa-cog",
			"fa-f014" => "fa-trash-o",
			"fa-f015" => "fa-home",
			"fa-f016" => "fa-file-o",
			"fa-f017" => "fa-clock-o",
			"fa-f018" => "fa-road",
			"fa-f019" => "fa-download",
			"fa-f01a" => "fa-arrow-circle-o-down",
			"fa-f01b" => "fa-arrow-circle-o-up",
			"fa-f01c" => "fa-inbox",
			"fa-f01d" => "fa-play-circle-o",
			"fa-f01e" => "fa-repeat",
			"fa-f021" => "fa-refresh",
			"fa-f022" => "fa-list-alt",
			"fa-f023" => "fa-lock",
			"fa-f024" => "fa-flag",
			"fa-f025" => "fa-headphones",
			"fa-f026" => "fa-volume-off",
			"fa-f027" => "fa-volume-down",
			"fa-f028" => "fa-volume-up",
			"fa-f029" => "fa-qrcode",
			"fa-f02a" => "fa-barcode",
			"fa-f02b" => "fa-tag",
			"fa-f02c" => "fa-tags",
			"fa-f02d" => "fa-book",
			"fa-f02e" => "fa-bookmark",
			"fa-f02f" => "fa-print",
			"fa-f030" => "fa-camera",
			"fa-f031" => "fa-font",
			"fa-f032" => "fa-bold",
			"fa-f033" => "fa-italic",
			"fa-f034" => "fa-text-height",
			"fa-f035" => "fa-text-width",
			"fa-f036" => "fa-align-left",
			"fa-f037" => "fa-align-center",
			"fa-f038" => "fa-align-right",
			"fa-f039" => "fa-align-justify",
			"fa-f03a" => "fa-list",
			"fa-f03b" => "fa-outdent",
			"fa-f03c" => "fa-indent",
			"fa-f03d" => "fa-video-camera",
			"fa-f03e" => "fa-picture-o",
			"fa-f040" => "fa-pencil",
			"fa-f041" => "fa-map-marker",
			"fa-f042" => "fa-adjust",
			"fa-f043" => "fa-tint",
			"fa-f044" => "fa-pencil-square-o",
			"fa-f045" => "fa-share-square-o",
			"fa-f046" => "fa-check-square-o",
			"fa-f047" => "fa-arrows",
			"fa-f048" => "fa-step-backward",
			"fa-f049" => "fa-fast-backward",
			"fa-f04a" => "fa-backward",
			"fa-f04b" => "fa-play",
			"fa-f04c" => "fa-pause",
			"fa-f04d" => "fa-stop",
			"fa-f04e" => "fa-forward",
			"fa-f050" => "fa-fast-forward",
			"fa-f051" => "fa-step-forward",
			"fa-f052" => "fa-eject",
			"fa-f053" => "fa-chevron-left",
			"fa-f054" => "fa-chevron-right",
			"fa-f055" => "fa-plus-circle",
			"fa-f056" => "fa-minus-circle",
			"fa-f057" => "fa-times-circle",
			"fa-f058" => "fa-check-circle",
			"fa-f059" => "fa-question-circle",
			"fa-f05a" => "fa-info-circle",
			"fa-f05b" => "fa-crosshairs",
			"fa-f05c" => "fa-times-circle-o",
			"fa-f05d" => "fa-check-circle-o",
			"fa-f05e" => "fa-ban",
			"fa-f060" => "fa-arrow-left",
			"fa-f061" => "fa-arrow-right",
			"fa-f062" => "fa-arrow-up",
			"fa-f063" => "fa-arrow-down",
			"fa-f064" => "fa-share",
			"fa-f065" => "fa-expand",
			"fa-f066" => "fa-compress",
			"fa-f067" => "fa-plus",
			"fa-f068" => "fa-minus",
			"fa-f069" => "fa-asterisk",
			"fa-f06a" => "fa-exclamation-circle",
			"fa-f06b" => "fa-gift",
			"fa-f06c" => "fa-leaf",
			"fa-f06d" => "fa-fire",
			"fa-f06e" => "fa-eye",
			"fa-f070" => "fa-eye-slash",
			"fa-f071" => "fa-exclamation-triangle",
			"fa-f072" => "fa-plane",
			"fa-f073" => "fa-calendar",
			"fa-f074" => "fa-random",
			"fa-f075" => "fa-comment",
			"fa-f076" => "fa-magnet",
			"fa-f077" => "fa-chevron-up",
			"fa-f078" => "fa-chevron-down",
			"fa-f079" => "fa-retweet",
			"fa-f07a" => "fa-shopping-cart",
			"fa-f07b" => "fa-folder",
			"fa-f07c" => "fa-folder-open",
			"fa-f07d" => "fa-arrows-v",
			"fa-f07e" => "fa-arrows-h",
			"fa-f080" => "fa-bar-chart",
			"fa-f081" => "fa-twitter-square",
			"fa-f082" => "fa-facebook-square",
			"fa-f083" => "fa-camera-retro",
			"fa-f084" => "fa-key",
			"fa-f085" => "fa-cogs",
			"fa-f086" => "fa-comments",
			"fa-f087" => "fa-thumbs-o-up",
			"fa-f088" => "fa-thumbs-o-down",
			"fa-f089" => "fa-star-half",
			"fa-f08a" => "fa-heart-o",
			"fa-f08b" => "fa-sign-out",
			"fa-f08c" => "fa-linkedin-square",
			"fa-f08d" => "fa-thumb-tack",
			"fa-f08e" => "fa-external-link",
			"fa-f090" => "fa-sign-in",
			"fa-f091" => "fa-trophy",
			"fa-f092" => "fa-github-square",
			"fa-f093" => "fa-upload",
			"fa-f094" => "fa-lemon-o",
			"fa-f095" => "fa-phone",
			"fa-f096" => "fa-square-o",
			"fa-f097" => "fa-bookmark-o",
			"fa-f098" => "fa-phone-square",
			"fa-f099" => "fa-twitter",
			"fa-f09a" => "fa-facebook",
			"fa-f09b" => "fa-github",
			"fa-f09c" => "fa-unlock",
			"fa-f09d" => "fa-credit-card",
			"fa-f09e" => "fa-rss",
			"fa-f0a0" => "fa-hdd-o",
			"fa-f0a1" => "fa-bullhorn",
			"fa-f0f3" => "fa-bell",
			"fa-f0a3" => "fa-certificate",
			"fa-f0a4" => "fa-hand-o-right",
			"fa-f0a5" => "fa-hand-o-left",
			"fa-f0a6" => "fa-hand-o-up",
			"fa-f0a7" => "fa-hand-o-down",
			"fa-f0a8" => "fa-arrow-circle-left",
			"fa-f0a9" => "fa-arrow-circle-right",
			"fa-f0aa" => "fa-arrow-circle-up",
			"fa-f0ab" => "fa-arrow-circle-down",
			"fa-f0ac" => "fa-globe",
			"fa-f0ad" => "fa-wrench",
			"fa-f0ae" => "fa-tasks",
			"fa-f0b0" => "fa-filter",
			"fa-f0b1" => "fa-briefcase",
			"fa-f0b2" => "fa-arrows-alt",
			"fa-f0c0" => "fa-users",
			"fa-f0c1" => "fa-link",
			"fa-f0c2" => "fa-cloud",
			"fa-f0c3" => "fa-flask",
			"fa-f0c4" => "fa-scissors",
			"fa-f0c5" => "fa-files-o",
			"fa-f0c6" => "fa-paperclip",
			"fa-f0c7" => "fa-floppy-o",
			"fa-f0c8" => "fa-square",
			"fa-f0c9" => "fa-bars",
			"fa-f0ca" => "fa-list-ul",
			"fa-f0cb" => "fa-list-ol",
			"fa-f0cc" => "fa-strikethrough",
			"fa-f0cd" => "fa-underline",
			"fa-f0ce" => "fa-table",
			"fa-f0d0" => "fa-magic",
			"fa-f0d1" => "fa-truck",
			"fa-f0d2" => "fa-pinterest",
			"fa-f0d3" => "fa-pinterest-square",
			"fa-f0d4" => "fa-google-plus-square",
			"fa-f0d5" => "fa-google-plus",
			"fa-f0d6" => "fa-money",
			"fa-f0d7" => "fa-caret-down",
			"fa-f0d8" => "fa-caret-up",
			"fa-f0d9" => "fa-caret-left",
			"fa-f0da" => "fa-caret-right",
			"fa-f0db" => "fa-columns",
			"fa-f0dc" => "fa-sort",
			"fa-f0dd" => "fa-sort-desc",
			"fa-f0de" => "fa-sort-asc",
			"fa-f0e0" => "fa-envelope",
			"fa-f0e1" => "fa-linkedin",
			"fa-f0e2" => "fa-undo",
			"fa-f0e3" => "fa-gavel",
			"fa-f0e4" => "fa-tachometer",
			"fa-f0e5" => "fa-comment-o",
			"fa-f0e6" => "fa-comments-o",
			"fa-f0e7" => "fa-bolt",
			"fa-f0e8" => "fa-sitemap",
			"fa-f0e9" => "fa-umbrella",
			"fa-f0ea" => "fa-clipboard",
			"fa-f0eb" => "fa-lightbulb-o",
			"fa-f0ec" => "fa-exchange",
			"fa-f0ed" => "fa-cloud-download",
			"fa-f0ee" => "fa-cloud-upload",
			"fa-f0f0" => "fa-user-md",
			"fa-f0f1" => "fa-stethoscope",
			"fa-f0f2" => "fa-suitcase",
			"fa-f0a2" => "fa-bell-o",
			"fa-f0f4" => "fa-coffee",
			"fa-f0f5" => "fa-cutlery",
			"fa-f0f6" => "fa-file-text-o",
			"fa-f0f7" => "fa-building-o",
			"fa-f0f8" => "fa-hospital-o",
			"fa-f0f9" => "fa-ambulance",
			"fa-f0fa" => "fa-medkit",
			"fa-f0fb" => "fa-fighter-jet",
			"fa-f0fc" => "fa-beer",
			"fa-f0fd" => "fa-h-square",
			"fa-f0fe" => "fa-plus-square",
			"fa-f100" => "fa-angle-double-left",
			"fa-f101" => "fa-angle-double-right",
			"fa-f102" => "fa-angle-double-up",
			"fa-f103" => "fa-angle-double-down",
			"fa-f104" => "fa-angle-left",
			"fa-f105" => "fa-angle-right",
			"fa-f106" => "fa-angle-up",
			"fa-f107" => "fa-angle-down",
			"fa-f108" => "fa-desktop",
			"fa-f109" => "fa-laptop",
			"fa-f10a" => "fa-tablet",
			"fa-f10b" => "fa-mobile",
			"fa-f10c" => "fa-circle-o",
			"fa-f10d" => "fa-quote-left",
			"fa-f10e" => "fa-quote-right",
			"fa-f110" => "fa-spinner",
			"fa-f111" => "fa-circle",
			"fa-f112" => "fa-reply",
			"fa-f113" => "fa-github-alt",
			"fa-f114" => "fa-folder-o",
			"fa-f115" => "fa-folder-open-o",
			"fa-f118" => "fa-smile-o",
			"fa-f119" => "fa-frown-o",
			"fa-f11a" => "fa-meh-o",
			"fa-f11b" => "fa-gamepad",
			"fa-f11c" => "fa-keyboard-o",
			"fa-f11d" => "fa-flag-o",
			"fa-f11e" => "fa-flag-checkered",
			"fa-f120" => "fa-terminal",
			"fa-f121" => "fa-code",
			"fa-f122" => "fa-reply-all",
			"fa-f123" => "fa-star-half-o",
			"fa-f124" => "fa-location-arrow",
			"fa-f125" => "fa-crop",
			"fa-f126" => "fa-code-fork",
			"fa-f127" => "fa-chain-broken",
			"fa-f128" => "fa-question",
			"fa-f129" => "fa-info",
			"fa-f12a" => "fa-exclamation",
			"fa-f12b" => "fa-superscript",
			"fa-f12c" => "fa-subscript",
			"fa-f12d" => "fa-eraser",
			"fa-f12e" => "fa-puzzle-piece",
			"fa-f130" => "fa-microphone",
			"fa-f131" => "fa-microphone-slash",
			"fa-f132" => "fa-shield",
			"fa-f133" => "fa-calendar-o",
			"fa-f134" => "fa-fire-extinguisher",
			"fa-f135" => "fa-rocket",
			"fa-f136" => "fa-maxcdn",
			"fa-f137" => "fa-chevron-circle-left",
			"fa-f138" => "fa-chevron-circle-right",
			"fa-f139" => "fa-chevron-circle-up",
			"fa-f13a" => "fa-chevron-circle-down",
			"fa-f13b" => "fa-html5",
			"fa-f13c" => "fa-css3",
			"fa-f13d" => "fa-anchor",
			"fa-f13e" => "fa-unlock-alt",
			"fa-f140" => "fa-bullseye",
			"fa-f141" => "fa-ellipsis-h",
			"fa-f142" => "fa-ellipsis-v",
			"fa-f143" => "fa-rss-square",
			"fa-f144" => "fa-play-circle",
			"fa-f145" => "fa-ticket",
			"fa-f146" => "fa-minus-square",
			"fa-f147" => "fa-minus-square-o",
			"fa-f148" => "fa-level-up",
			"fa-f149" => "fa-level-down",
			"fa-f14a" => "fa-check-square",
			"fa-f14b" => "fa-pencil-square",
			"fa-f14c" => "fa-external-link-square",
			"fa-f14d" => "fa-share-square",
			"fa-f14e" => "fa-compass",
			"fa-f150" => "fa-caret-square-o-down",
			"fa-f151" => "fa-caret-square-o-up",
			"fa-f152" => "fa-caret-square-o-right",
			"fa-f153" => "fa-eur",
			"fa-f154" => "fa-gbp",
			"fa-f155" => "fa-usd",
			"fa-f156" => "fa-inr",
			"fa-f157" => "fa-jpy",
			"fa-f158" => "fa-rub",
			"fa-f159" => "fa-krw",
			"fa-f15a" => "fa-btc",
			"fa-f15b" => "fa-file",
			"fa-f15c" => "fa-file-text",
			"fa-f15d" => "fa-sort-alpha-asc",
			"fa-f15e" => "fa-sort-alpha-desc",
			"fa-f160" => "fa-sort-amount-asc",
			"fa-f161" => "fa-sort-amount-desc",
			"fa-f162" => "fa-sort-numeric-asc",
			"fa-f163" => "fa-sort-numeric-desc",
			"fa-f164" => "fa-thumbs-up",
			"fa-f165" => "fa-thumbs-down",
			"fa-f166" => "fa-youtube-square",
			"fa-f167" => "fa-youtube",
			"fa-f168" => "fa-xing",
			"fa-f169" => "fa-xing-square",
			"fa-f16a" => "fa-youtube-play",
			"fa-f16b" => "fa-dropbox",
			"fa-f16c" => "fa-stack-overflow",
			"fa-f16d" => "fa-instagram",
			"fa-f16e" => "fa-flickr",
			"fa-f170" => "fa-adn",
			"fa-f171" => "fa-bitbucket",
			"fa-f172" => "fa-bitbucket-square",
			"fa-f173" => "fa-tumblr",
			"fa-f174" => "fa-tumblr-square",
			"fa-f175" => "fa-long-arrow-down",
			"fa-f176" => "fa-long-arrow-up",
			"fa-f177" => "fa-long-arrow-left",
			"fa-f178" => "fa-long-arrow-right",
			"fa-f179" => "fa-apple",
			"fa-f17a" => "fa-windows",
			"fa-f17b" => "fa-android",
			"fa-f17c" => "fa-linux",
			"fa-f17d" => "fa-dribbble",
			"fa-f17e" => "fa-skype",
			"fa-f180" => "fa-foursquare",
			"fa-f181" => "fa-trello",
			"fa-f182" => "fa-female",
			"fa-f183" => "fa-male",
			"fa-f184" => "fa-gratipay",
			"fa-f185" => "fa-sun-o",
			"fa-f186" => "fa-moon-o",
			"fa-f187" => "fa-archive",
			"fa-f188" => "fa-bug",
			"fa-f189" => "fa-vk",
			"fa-f18a" => "fa-weibo",
			"fa-f18b" => "fa-renren",
			"fa-f18c" => "fa-pagelines",
			"fa-f18d" => "fa-stack-exchange",
			"fa-f18e" => "fa-arrow-circle-o-right",
			"fa-f190" => "fa-arrow-circle-o-left",
			"fa-f191" => "fa-caret-square-o-left",
			"fa-f192" => "fa-dot-circle-o",
			"fa-f193" => "fa-wheelchair",
			"fa-f194" => "fa-vimeo-square",
			"fa-f195" => "fa-try",
			"fa-f196" => "fa-plus-square-o",
			"fa-f197" => "fa-space-shuttle",
			"fa-f198" => "fa-slack",
			"fa-f199" => "fa-envelope-square",
			"fa-f19a" => "fa-wordpress",
			"fa-f19b" => "fa-openid",
			"fa-f19c" => "fa-university",
			"fa-f19d" => "fa-graduation-cap",
			"fa-f19e" => "fa-yahoo",
			"fa-f1a0" => "fa-google",
			"fa-f1a1" => "fa-reddit",
			"fa-f1a2" => "fa-reddit-square",
			"fa-f1a3" => "fa-stumbleupon-circle",
			"fa-f1a4" => "fa-stumbleupon",
			"fa-f1a5" => "fa-delicious",
			"fa-f1a6" => "fa-digg",
			"fa-f1a7" => "fa-pied-piper-pp",
			"fa-f1a8" => "fa-pied-piper-alt",
			"fa-f1a9" => "fa-drupal",
			"fa-f1aa" => "fa-joomla",
			"fa-f1ab" => "fa-language",
			"fa-f1ac" => "fa-fax",
			"fa-f1ad" => "fa-building",
			"fa-f1ae" => "fa-child",
			"fa-f1b0" => "fa-paw",
			"fa-f1b1" => "fa-spoon",
			"fa-f1b2" => "fa-cube",
			"fa-f1b3" => "fa-cubes",
			"fa-f1b4" => "fa-behance",
			"fa-f1b5" => "fa-behance-square",
			"fa-f1b6" => "fa-steam",
			"fa-f1b7" => "fa-steam-square",
			"fa-f1b8" => "fa-recycle",
			"fa-f1b9" => "fa-car",
			"fa-f1ba" => "fa-taxi",
			"fa-f1bb" => "fa-tree",
			"fa-f1bc" => "fa-spotify",
			"fa-f1bd" => "fa-deviantart",
			"fa-f1be" => "fa-soundcloud",
			"fa-f1c0" => "fa-database",
			"fa-f1c1" => "fa-file-pdf-o",
			"fa-f1c2" => "fa-file-word-o",
			"fa-f1c3" => "fa-file-excel-o",
			"fa-f1c4" => "fa-file-powerpoint-o",
			"fa-f1c5" => "fa-file-image-o",
			"fa-f1c6" => "fa-file-archive-o",
			"fa-f1c7" => "fa-file-audio-o",
			"fa-f1c8" => "fa-file-video-o",
			"fa-f1c9" => "fa-file-code-o",
			"fa-f1ca" => "fa-vine",
			"fa-f1cb" => "fa-codepen",
			"fa-f1cc" => "fa-jsfiddle",
			"fa-f1cd" => "fa-life-ring",
			"fa-f1ce" => "fa-circle-o-notch",
			"fa-f1d0" => "fa-rebel",
			"fa-f1d1" => "fa-empire",
			"fa-f1d2" => "fa-git-square",
			"fa-f1d3" => "fa-git",
			"fa-f1d4" => "fa-hacker-news",
			"fa-f1d5" => "fa-tencent-weibo",
			"fa-f1d6" => "fa-qq",
			"fa-f1d7" => "fa-weixin",
			"fa-f1d8" => "fa-paper-plane",
			"fa-f1d9" => "fa-paper-plane-o",
			"fa-f1da" => "fa-history",
			"fa-f1db" => "fa-circle-thin",
			"fa-f1dc" => "fa-header",
			"fa-f1dd" => "fa-paragraph",
			"fa-f1de" => "fa-sliders",
			"fa-f1e0" => "fa-share-alt",
			"fa-f1e1" => "fa-share-alt-square",
			"fa-f1e2" => "fa-bomb",
			"fa-f1e3" => "fa-futbol-o",
			"fa-f1e4" => "fa-tty",
			"fa-f1e5" => "fa-binoculars",
			"fa-f1e6" => "fa-plug",
			"fa-f1e7" => "fa-slideshare",
			"fa-f1e8" => "fa-twitch",
			"fa-f1e9" => "fa-yelp",
			"fa-f1ea" => "fa-newspaper-o",
			"fa-f1eb" => "fa-wifi",
			"fa-f1ec" => "fa-calculator",
			"fa-f1ed" => "fa-paypal",
			"fa-f1ee" => "fa-google-wallet",
			"fa-f1f0" => "fa-cc-visa",
			"fa-f1f1" => "fa-cc-mastercard",
			"fa-f1f2" => "fa-cc-discover",
			"fa-f1f3" => "fa-cc-amex",
			"fa-f1f4" => "fa-cc-paypal",
			"fa-f1f5" => "fa-cc-stripe",
			"fa-f1f6" => "fa-bell-slash",
			"fa-f1f7" => "fa-bell-slash-o",
			"fa-f1f8" => "fa-trash",
			"fa-f1f9" => "fa-copyright",
			"fa-f1fa" => "fa-at",
			"fa-f1fb" => "fa-eyedropper",
			"fa-f1fc" => "fa-paint-brush",
			"fa-f1fd" => "fa-birthday-cake",
			"fa-f1fe" => "fa-area-chart",
			"fa-f200" => "fa-pie-chart",
			"fa-f201" => "fa-line-chart",
			"fa-f202" => "fa-lastfm",
			"fa-f203" => "fa-lastfm-square",
			"fa-f204" => "fa-toggle-off",
			"fa-f205" => "fa-toggle-on",
			"fa-f206" => "fa-bicycle",
			"fa-f207" => "fa-bus",
			"fa-f208" => "fa-ioxhost",
			"fa-f209" => "fa-angellist",
			"fa-f20a" => "fa-cc",
			"fa-f20b" => "fa-ils",
			"fa-f20c" => "fa-meanpath",
			"fa-f20d" => "fa-buysellads",
			"fa-f20e" => "fa-connectdevelop",
			"fa-f210" => "fa-dashcube",
			"fa-f211" => "fa-forumbee",
			"fa-f212" => "fa-leanpub",
			"fa-f213" => "fa-sellsy",
			"fa-f214" => "fa-shirtsinbulk",
			"fa-f215" => "fa-simplybuilt",
			"fa-f216" => "fa-skyatlas",
			"fa-f217" => "fa-cart-plus",
			"fa-f218" => "fa-cart-arrow-down",
			"fa-f219" => "fa-diamond",
			"fa-f21a" => "fa-ship",
			"fa-f21b" => "fa-user-secret",
			"fa-f21c" => "fa-motorcycle",
			"fa-f21d" => "fa-street-view",
			"fa-f21e" => "fa-heartbeat",
			"fa-f221" => "fa-venus",
			"fa-f222" => "fa-mars",
			"fa-f223" => "fa-mercury",
			"fa-f224" => "fa-transgender",
			"fa-f225" => "fa-transgender-alt",
			"fa-f226" => "fa-venus-double",
			"fa-f227" => "fa-mars-double",
			"fa-f228" => "fa-venus-mars",
			"fa-f229" => "fa-mars-stroke",
			"fa-f22a" => "fa-mars-stroke-v",
			"fa-f22b" => "fa-mars-stroke-h",
			"fa-f22c" => "fa-neuter",
			"fa-f22d" => "fa-genderless",
			"fa-f230" => "fa-facebook-official",
			"fa-f231" => "fa-pinterest-p",
			"fa-f232" => "fa-whatsapp",
			"fa-f233" => "fa-server",
			"fa-f234" => "fa-user-plus",
			"fa-f235" => "fa-user-times",
			"fa-f236" => "fa-bed",
			"fa-f237" => "fa-viacoin",
			"fa-f238" => "fa-train",
			"fa-f239" => "fa-subway",
			"fa-f23a" => "fa-medium",
			"fa-f23b" => "fa-y-combinator",
			"fa-f23c" => "fa-optin-monster",
			"fa-f23d" => "fa-opencart",
			"fa-f23e" => "fa-expeditedssl",
			"fa-f240" => "fa-battery-full",
			"fa-f241" => "fa-battery-three-quarters",
			"fa-f242" => "fa-battery-half",
			"fa-f243" => "fa-battery-quarter",
			"fa-f244" => "fa-battery-empty",
			"fa-f245" => "fa-mouse-pointer",
			"fa-f246" => "fa-i-cursor",
			"fa-f247" => "fa-object-group",
			"fa-f248" => "fa-object-ungroup",
			"fa-f249" => "fa-sticky-note",
			"fa-f24a" => "fa-sticky-note-o",
			"fa-f24b" => "fa-cc-jcb",
			"fa-f24c" => "fa-cc-diners-club",
			"fa-f24d" => "fa-clone",
			"fa-f24e" => "fa-balance-scale",
			"fa-f250" => "fa-hourglass-o",
			"fa-f251" => "fa-hourglass-start",
			"fa-f252" => "fa-hourglass-half",
			"fa-f253" => "fa-hourglass-end",
			"fa-f254" => "fa-hourglass",
			"fa-f255" => "fa-hand-rock-o",
			"fa-f256" => "fa-hand-paper-o",
			"fa-f257" => "fa-hand-scissors-o",
			"fa-f258" => "fa-hand-lizard-o",
			"fa-f259" => "fa-hand-spock-o",
			"fa-f25a" => "fa-hand-pointer-o",
			"fa-f25b" => "fa-hand-peace-o",
			"fa-f25c" => "fa-trademark",
			"fa-f25d" => "fa-registered",
			"fa-f25e" => "fa-creative-commons",
			"fa-f260" => "fa-gg",
			"fa-f261" => "fa-gg-circle",
			"fa-f262" => "fa-tripadvisor",
			"fa-f263" => "fa-odnoklassniki",
			"fa-f264" => "fa-odnoklassniki-square",
			"fa-f265" => "fa-get-pocket",
			"fa-f266" => "fa-wikipedia-w",
			"fa-f267" => "fa-safari",
			"fa-f268" => "fa-chrome",
			"fa-f269" => "fa-firefox",
			"fa-f26a" => "fa-opera",
			"fa-f26b" => "fa-internet-explorer",
			"fa-f26c" => "fa-television",
			"fa-f26d" => "fa-contao",
			"fa-f26e" => "fa-500px",
			"fa-f270" => "fa-amazon",
			"fa-f271" => "fa-calendar-plus-o",
			"fa-f272" => "fa-calendar-minus-o",
			"fa-f273" => "fa-calendar-times-o",
			"fa-f274" => "fa-calendar-check-o",
			"fa-f275" => "fa-industry",
			"fa-f276" => "fa-map-pin",
			"fa-f277" => "fa-map-signs",
			"fa-f278" => "fa-map-o",
			"fa-f279" => "fa-map",
			"fa-f27a" => "fa-commenting",
			"fa-f27b" => "fa-commenting-o",
			"fa-f27c" => "fa-houzz",
			"fa-f27d" => "fa-vimeo",
			"fa-f27e" => "fa-black-tie",
			"fa-f280" => "fa-fonticons",
			"fa-f281" => "fa-reddit-alien",
			"fa-f282" => "fa-edge",
			"fa-f283" => "fa-credit-card-alt",
			"fa-f284" => "fa-codiepie",
			"fa-f285" => "fa-modx",
			"fa-f286" => "fa-fort-awesome",
			"fa-f287" => "fa-usb",
			"fa-f288" => "fa-product-hunt",
			"fa-f289" => "fa-mixcloud",
			"fa-f28a" => "fa-scribd",
			"fa-f28b" => "fa-pause-circle",
			"fa-f28c" => "fa-pause-circle-o",
			"fa-f28d" => "fa-stop-circle",
			"fa-f28e" => "fa-stop-circle-o",
			"fa-f290" => "fa-shopping-bag",
			"fa-f291" => "fa-shopping-basket",
			"fa-f292" => "fa-hashtag",
			"fa-f293" => "fa-bluetooth",
			"fa-f294" => "fa-bluetooth-b",
			"fa-f295" => "fa-percent",
			"fa-f296" => "fa-gitlab",
			"fa-f297" => "fa-wpbeginner",
			"fa-f298" => "fa-wpforms",
			"fa-f299" => "fa-envira",
			"fa-f29a" => "fa-universal-access",
			"fa-f29b" => "fa-wheelchair-alt",
			"fa-f29c" => "fa-question-circle-o",
			"fa-f29d" => "fa-blind",
			"fa-f29e" => "fa-audio-description",
			"fa-f2a0" => "fa-volume-control-phone",
			"fa-f2a1" => "fa-braille",
			"fa-f2a2" => "fa-assistive-listening-systems",
			"fa-f2a3" => "fa-american-sign-language-interpreting",
			"fa-f2a4" => "fa-deaf",
			"fa-f2a5" => "fa-glide",
			"fa-f2a6" => "fa-glide-g",
			"fa-f2a7" => "fa-sign-language",
			"fa-f2a8" => "fa-low-vision",
			"fa-f2a9" => "fa-viadeo",
			"fa-f2aa" => "fa-viadeo-square",
			"fa-f2ab" => "fa-snapchat",
			"fa-f2ac" => "fa-snapchat-ghost",
			"fa-f2ad" => "fa-snapchat-square",
			"fa-f2ae" => "fa-pied-piper",
			"fa-f2b0" => "fa-first-order",
			"fa-f2b1" => "fa-yoast",
			"fa-f2b2" => "fa-themeisle",
			"fa-f2b3" => "fa-google-plus-official",
			"fa-f2b4" => "fa-font-awesome",
			"fa-f2b5" => "fa-handshake-o",
			"fa-f2b6" => "fa-envelope-open",
			"fa-f2b7" => "fa-envelope-open-o",
			"fa-f2b8" => "fa-linode",
			"fa-f2b9" => "fa-address-book",
			"fa-f2ba" => "fa-address-book-o",
			"fa-f2bb" => "fa-address-card",
			"fa-f2bc" => "fa-address-card-o",
			"fa-f2bd" => "fa-user-circle",
			"fa-f2be" => "fa-user-circle-o",
			"fa-f2c0" => "fa-user-o",
			"fa-f2c1" => "fa-id-badge",
			"fa-f2c2" => "fa-id-card",
			"fa-f2c3" => "fa-id-card-o",
			"fa-f2c4" => "fa-quora",
			"fa-f2c5" => "fa-free-code-camp",
			"fa-f2c6" => "fa-telegram",
			"fa-f2c7" => "fa-thermometer-full",
			"fa-f2c8" => "fa-thermometer-three-quarters",
			"fa-f2c9" => "fa-thermometer-half",
			"fa-f2ca" => "fa-thermometer-quarter",
			"fa-f2cb" => "fa-thermometer-empty",
			"fa-f2cc" => "fa-shower",
			"fa-f2cd" => "fa-bath",
			"fa-f2ce" => "fa-podcast",
			"fa-f2d0" => "fa-window-maximize",
			"fa-f2d1" => "fa-window-minimize",
			"fa-f2d2" => "fa-window-restore",
			"fa-f2d3" => "fa-window-close",
			"fa-f2d4" => "fa-window-close-o",
			"fa-f2d5" => "fa-bandcamp",
			"fa-f2d6" => "fa-grav",
			"fa-f2d7" => "fa-etsy",
			"fa-f2d8" => "fa-imdb",
			"fa-f2d9" => "fa-ravelry",
			"fa-f2da" => "fa-eercast",
			"fa-f2db" => "fa-microchip",
			"fa-f2dc" => "fa-snowflake-o",
			"fa-f2dd" => "fa-superpowers",
			"fa-f2de" => "fa-wpexplorer",
			"fa-f2e0" => "fa-meetup",
		);

		$icons = apply_filters( "megamenu_fontawesome_icons", $icons );

		return $icons;

	}

}

endif;