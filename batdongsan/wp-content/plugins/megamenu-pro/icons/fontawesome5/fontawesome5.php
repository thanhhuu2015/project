<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists('Mega_Menu_Font_Awesome_5') ) :

/**
 *
 */
class Mega_Menu_Font_Awesome_5 {

	/**
	 * Constructor
	 *
	 * @since 1.8
	 */
	public function __construct() {
		add_filter( 'megamenu_load_scss_file_contents', array( $this, 'append_fontawesome_scss'), 10 );
		add_filter( 'megamenu_icon_tabs', array( $this, 'font_awesome_selector'), 99, 5 );
		add_action( 'megamenu_enqueue_public_scripts', array ( $this, 'enqueue_public_scripts'), 10 );
        add_action( "megamenu_admin_scripts", array( $this, 'enqueue_admin_styles') );
		add_action( "admin_print_scripts-nav-menus.php", array( $this, 'enqueue_admin_styles' ) );
	}

    /**
     * Enqueue required CSS and JS for Mega Menu
     *
     */
    public function enqueue_admin_styles( $hook ) {
        wp_enqueue_style( 'megamenu-fontawesome5', plugins_url( 'css/all.css' , __FILE__ ), false, MEGAMENU_PRO_VERSION );
    }

	/**
	 * Add the CSS required to display fontawesome icons to the main SCSS file
	 *
	 * @since 1.8
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
	 * @since 1.8
	 */
	public function enqueue_public_scripts() {
		$settings = get_option("megamenu_settings");

        if ( is_array( $settings ) && isset( $settings['enqueue_fa_5'] ) && $settings['enqueue_fa_5'] == 'disabled' ) {
        	return;
        }

        wp_enqueue_style( 'megamenu-fontawesome5', plugins_url( 'css/all.min.css' , __FILE__ ), false, MEGAMENU_PRO_VERSION );
	}


	/**
	 * Generate HTML for the font awesome selector
	 *
	 * @since 1.8
	 * @param array $tabs
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return array
	 */
	public function font_awesome_selector( $tabs, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {
		$settings = get_option("megamenu_settings");

        $css_version = get_transient("megamenu_pro_css_version");

        $html = "";

        if ( ! $css_version || version_compare( $css_version, '1.8', '<' ) ) {
            $link = "<a href='" . esc_attr( admin_url( 'admin.php?page=maxmegamenu_tools' ) ) . "'>" . __("Mega Menu") . " > " . __("Tools") . "</a>";

            $html .= "<div class='notice notice-warning'>";
            $html .= sprintf( __("Your menu CSS needs to be updated before you can use FontAwesome 5 icons. Please go to %s and Clear the CSS Cache (you will only need to do this once).", "megamenupro") , $link);
            $html .= "</div>";

        }

        if ( is_array( $settings ) && isset( $settings['enqueue_fa_5'] ) && $settings['enqueue_fa_5'] == 'disabled' ) {
        	$html .= "<div class='notice notice-warning'>" . __("Font Awesome 5 has been dequeued under Mega Menu > General Settings.", "megamenupro") . "</div>";
        }

        foreach ( $this->icons() as $code => $class ) {

            $bits = explode( "-", $code );
            $code = "&#x" . $bits[1] . "";
            $type = $bits[0];

            $style_bits = explode( " ", $class);
            $style = $style_bits[0];

            $html .= "<div class='{$style}'>";
            $html .= "    <input class='radio' id='{$class}' type='radio' rel='{$code}' name='settings[icon]' value='{$class}' " . checked( $menu_item_meta['icon'], $class, false ) . " />";
            $html .= "    <label rel='{$code}' for='{$class}' title='{$class}'></label>";
            $html .= "</div>";

        }

        $icon_prefix = "";

        if ( isset( $menu_item_meta['icon'] ) ) {
        	$icon_prefix = substr( $menu_item_meta['icon'], 0, 3 );
        }

		$insert['fontawesome5'] = array(
			'title' => __("Font Awesome 5", "megamenupro"),
			'active' => isset( $menu_item_meta['icon'] ) && in_array( $icon_prefix, array( 'fab', 'fas', 'far' ) ),
			'content' => $html
		);

		array_splice( $tabs, 2, 0, $insert );
		
		return $tabs;

	}

	/**
	 * Return an array of font awesome icons
	 *
	 * @since 1.8
	 * @return array $icons
	 */
	public function icons() {

		$icons = array('fa-f26e' => 'fab fa-500px',
			'fa-f368' => 'fab fa-accessible-icon',
			'fa-f369' => 'fab fa-accusoft',
			'fa-f6af' => 'fab fa-acquisitions-incorporated',
			'fa-f641' => 'fas fa-ad',
			'fa-f2b9' => 'fas fa-address-book',
			'fa-f2b9' => 'far fa-address-book',
			'fa-f2bb' => 'fas fa-address-card',
			'fa-f2bb' => 'far fa-address-card',
			'fa-f042' => 'fas fa-adjust',
			'fa-f170' => 'fab fa-adn',
			'fa-f778' => 'fab fa-adobe',
			'fa-f36a' => 'fab fa-adversal',
			'fa-f36b' => 'fab fa-affiliatetheme',
			'fa-f5d0' => 'fas fa-air-freshener',
			'fa-f36c' => 'fab fa-algolia',
			'fa-f037' => 'fas fa-align-center',
			'fa-f039' => 'fas fa-align-justify',
			'fa-f036' => 'fas fa-align-left',
			'fa-f038' => 'fas fa-align-right',
			'fa-f642' => 'fab fa-alipay',
			'fa-f461' => 'fas fa-allergies',
			'fa-f270' => 'fab fa-amazon',
			'fa-f42c' => 'fab fa-amazon-pay',
			'fa-f0f9' => 'fas fa-ambulance',
			'fa-f2a3' => 'fas fa-american-sign-language-interpreting',
			'fa-f36d' => 'fab fa-amilia',
			'fa-f13d' => 'fas fa-anchor',
			'fa-f17b' => 'fab fa-android',
			'fa-f209' => 'fab fa-angellist',
			'fa-f103' => 'fas fa-angle-double-down',
			'fa-f100' => 'fas fa-angle-double-left',
			'fa-f101' => 'fas fa-angle-double-right',
			'fa-f102' => 'fas fa-angle-double-up',
			'fa-f107' => 'fas fa-angle-down',
			'fa-f104' => 'fas fa-angle-left',
			'fa-f105' => 'fas fa-angle-right',
			'fa-f106' => 'fas fa-angle-up',
			'fa-f556' => 'fas fa-angry',
			'fa-f556' => 'far fa-angry',
			'fa-f36e' => 'fab fa-angrycreative',
			'fa-f420' => 'fab fa-angular',
			'fa-f644' => 'fas fa-ankh',
			'fa-f36f' => 'fab fa-app-store',
			'fa-f370' => 'fab fa-app-store-ios',
			'fa-f371' => 'fab fa-apper',
			'fa-f179' => 'fab fa-apple',
			'fa-f5d1' => 'fas fa-apple-alt',
			'fa-f415' => 'fab fa-apple-pay',
			'fa-f187' => 'fas fa-archive',
			'fa-f557' => 'fas fa-archway',
			'fa-f358' => 'fas fa-arrow-alt-circle-down',
			'fa-f358' => 'far fa-arrow-alt-circle-down',
			'fa-f359' => 'fas fa-arrow-alt-circle-left',
			'fa-f359' => 'far fa-arrow-alt-circle-left',
			'fa-f35a' => 'fas fa-arrow-alt-circle-right',
			'fa-f35a' => 'far fa-arrow-alt-circle-right',
			'fa-f35b' => 'fas fa-arrow-alt-circle-up',
			'fa-f35b' => 'far fa-arrow-alt-circle-up',
			'fa-f0ab' => 'fas fa-arrow-circle-down',
			'fa-f0a8' => 'fas fa-arrow-circle-left',
			'fa-f0a9' => 'fas fa-arrow-circle-right',
			'fa-f0aa' => 'fas fa-arrow-circle-up',
			'fa-f063' => 'fas fa-arrow-down',
			'fa-f060' => 'fas fa-arrow-left',
			'fa-f061' => 'fas fa-arrow-right',
			'fa-f062' => 'fas fa-arrow-up',
			'fa-f0b2' => 'fas fa-arrows-alt',
			'fa-f337' => 'fas fa-arrows-alt-h',
			'fa-f338' => 'fas fa-arrows-alt-v',
			'fa-f77a' => 'fab fa-artstation',
			'fa-f2a2' => 'fas fa-assistive-listening-systems',
			'fa-f069' => 'fas fa-asterisk',
			'fa-f372' => 'fab fa-asymmetrik',
			'fa-f1fa' => 'fas fa-at',
			'fa-f558' => 'fas fa-atlas',
			'fa-f77b' => 'fab fa-atlassian',
			'fa-f5d2' => 'fas fa-atom',
			'fa-f373' => 'fab fa-audible',
			'fa-f29e' => 'fas fa-audio-description',
			'fa-f41c' => 'fab fa-autoprefixer',
			'fa-f374' => 'fab fa-avianex',
			'fa-f421' => 'fab fa-aviato',
			'fa-f559' => 'fas fa-award',
			'fa-f375' => 'fab fa-aws',
			'fa-f77c' => 'fas fa-baby',
			'fa-f77d' => 'fas fa-baby-carriage',
			'fa-f55a' => 'fas fa-backspace',
			'fa-f04a' => 'fas fa-backward',
			'fa-f7e5' => 'fas fa-bacon',
			'fa-f24e' => 'fas fa-balance-scale',
			'fa-f05e' => 'fas fa-ban',
			'fa-f462' => 'fas fa-band-aid',
			'fa-f2d5' => 'fab fa-bandcamp',
			'fa-f02a' => 'fas fa-barcode',
			'fa-f0c9' => 'fas fa-bars',
			'fa-f433' => 'fas fa-baseball-ball',
			'fa-f434' => 'fas fa-basketball-ball',
			'fa-f2cd' => 'fas fa-bath',
			'fa-f244' => 'fas fa-battery-empty',
			'fa-f240' => 'fas fa-battery-full',
			'fa-f242' => 'fas fa-battery-half',
			'fa-f243' => 'fas fa-battery-quarter',
			'fa-f241' => 'fas fa-battery-three-quarters',
			'fa-f236' => 'fas fa-bed',
			'fa-f0fc' => 'fas fa-beer',
			'fa-f1b4' => 'fab fa-behance',
			'fa-f1b5' => 'fab fa-behance-square',
			'fa-f0f3' => 'fas fa-bell',
			'fa-f0f3' => 'far fa-bell',
			'fa-f1f6' => 'fas fa-bell-slash',
			'fa-f1f6' => 'far fa-bell-slash',
			'fa-f55b' => 'fas fa-bezier-curve',
			'fa-f647' => 'fas fa-bible',
			'fa-f206' => 'fas fa-bicycle',
			'fa-f378' => 'fab fa-bimobject',
			'fa-f1e5' => 'fas fa-binoculars',
			'fa-f780' => 'fas fa-biohazard',
			'fa-f1fd' => 'fas fa-birthday-cake',
			'fa-f171' => 'fab fa-bitbucket',
			'fa-f379' => 'fab fa-bitcoin',
			'fa-f37a' => 'fab fa-bity',
			'fa-f27e' => 'fab fa-black-tie',
			'fa-f37b' => 'fab fa-blackberry',
			'fa-f517' => 'fas fa-blender',
			'fa-f6b6' => 'fas fa-blender-phone',
			'fa-f29d' => 'fas fa-blind',
			'fa-f781' => 'fas fa-blog',
			'fa-f37c' => 'fab fa-blogger',
			'fa-f37d' => 'fab fa-blogger-b',
			'fa-f293' => 'fab fa-bluetooth',
			'fa-f294' => 'fab fa-bluetooth-b',
			'fa-f032' => 'fas fa-bold',
			'fa-f0e7' => 'fas fa-bolt',
			'fa-f1e2' => 'fas fa-bomb',
			'fa-f5d7' => 'fas fa-bone',
			'fa-f55c' => 'fas fa-bong',
			'fa-f02d' => 'fas fa-book',
			'fa-f6b7' => 'fas fa-book-dead',
			'fa-f7e6' => 'fas fa-book-medical',
			'fa-f518' => 'fas fa-book-open',
			'fa-f5da' => 'fas fa-book-reader',
			'fa-f02e' => 'fas fa-bookmark',
			'fa-f02e' => 'far fa-bookmark',
			'fa-f436' => 'fas fa-bowling-ball',
			'fa-f466' => 'fas fa-box',
			'fa-f49e' => 'fas fa-box-open',
			'fa-f468' => 'fas fa-boxes',
			'fa-f2a1' => 'fas fa-braille',
			'fa-f5dc' => 'fas fa-brain',
			'fa-f7ec' => 'fas fa-bread-slice',
			'fa-f0b1' => 'fas fa-briefcase',
			'fa-f469' => 'fas fa-briefcase-medical',
			'fa-f519' => 'fas fa-broadcast-tower',
			'fa-f51a' => 'fas fa-broom',
			'fa-f55d' => 'fas fa-brush',
			'fa-f15a' => 'fab fa-btc',
			'fa-f188' => 'fas fa-bug',
			'fa-f1ad' => 'fas fa-building',
			'fa-f1ad' => 'far fa-building',
			'fa-f0a1' => 'fas fa-bullhorn',
			'fa-f140' => 'fas fa-bullseye',
			'fa-f46a' => 'fas fa-burn',
			'fa-f37f' => 'fab fa-buromobelexperte',
			'fa-f207' => 'fas fa-bus',
			'fa-f55e' => 'fas fa-bus-alt',
			'fa-f64a' => 'fas fa-business-time',
			'fa-f20d' => 'fab fa-buysellads',
			'fa-f1ec' => 'fas fa-calculator',
			'fa-f133' => 'fas fa-calendar',
			'fa-f133' => 'far fa-calendar',
			'fa-f073' => 'fas fa-calendar-alt',
			'fa-f073' => 'far fa-calendar-alt',
			'fa-f274' => 'fas fa-calendar-check',
			'fa-f274' => 'far fa-calendar-check',
			'fa-f783' => 'fas fa-calendar-day',
			'fa-f272' => 'fas fa-calendar-minus',
			'fa-f272' => 'far fa-calendar-minus',
			'fa-f271' => 'fas fa-calendar-plus',
			'fa-f271' => 'far fa-calendar-plus',
			'fa-f273' => 'fas fa-calendar-times',
			'fa-f273' => 'far fa-calendar-times',
			'fa-f784' => 'fas fa-calendar-week',
			'fa-f030' => 'fas fa-camera',
			'fa-f083' => 'fas fa-camera-retro',
			'fa-f6bb' => 'fas fa-campground',
			'fa-f785' => 'fab fa-canadian-maple-leaf',
			'fa-f786' => 'fas fa-candy-cane',
			'fa-f55f' => 'fas fa-cannabis',
			'fa-f46b' => 'fas fa-capsules',
			'fa-f1b9' => 'fas fa-car',
			'fa-f5de' => 'fas fa-car-alt',
			'fa-f5df' => 'fas fa-car-battery',
			'fa-f5e1' => 'fas fa-car-crash',
			'fa-f5e4' => 'fas fa-car-side',
			'fa-f0d7' => 'fas fa-caret-down',
			'fa-f0d9' => 'fas fa-caret-left',
			'fa-f0da' => 'fas fa-caret-right',
			'fa-f150' => 'fas fa-caret-square-down',
			'fa-f150' => 'far fa-caret-square-down',
			'fa-f191' => 'fas fa-caret-square-left',
			'fa-f191' => 'far fa-caret-square-left',
			'fa-f152' => 'fas fa-caret-square-right',
			'fa-f152' => 'far fa-caret-square-right',
			'fa-f151' => 'fas fa-caret-square-up',
			'fa-f151' => 'far fa-caret-square-up',
			'fa-f0d8' => 'fas fa-caret-up',
			'fa-f787' => 'fas fa-carrot',
			'fa-f218' => 'fas fa-cart-arrow-down',
			'fa-f217' => 'fas fa-cart-plus',
			'fa-f788' => 'fas fa-cash-register',
			'fa-f6be' => 'fas fa-cat',
			'fa-f42d' => 'fab fa-cc-amazon-pay',
			'fa-f1f3' => 'fab fa-cc-amex',
			'fa-f416' => 'fab fa-cc-apple-pay',
			'fa-f24c' => 'fab fa-cc-diners-club',
			'fa-f1f2' => 'fab fa-cc-discover',
			'fa-f24b' => 'fab fa-cc-jcb',
			'fa-f1f1' => 'fab fa-cc-mastercard',
			'fa-f1f4' => 'fab fa-cc-paypal',
			'fa-f1f5' => 'fab fa-cc-stripe',
			'fa-f1f0' => 'fab fa-cc-visa',
			'fa-f380' => 'fab fa-centercode',
			'fa-f789' => 'fab fa-centos',
			'fa-f0a3' => 'fas fa-certificate',
			'fa-f6c0' => 'fas fa-chair',
			'fa-f51b' => 'fas fa-chalkboard',
			'fa-f51c' => 'fas fa-chalkboard-teacher',
			'fa-f5e7' => 'fas fa-charging-station',
			'fa-f1fe' => 'fas fa-chart-area',
			'fa-f080' => 'fas fa-chart-bar',
			'fa-f080' => 'far fa-chart-bar',
			'fa-f201' => 'fas fa-chart-line',
			'fa-f200' => 'fas fa-chart-pie',
			'fa-f00c' => 'fas fa-check',
			'fa-f058' => 'fas fa-check-circle',
			'fa-f058' => 'far fa-check-circle',
			'fa-f560' => 'fas fa-check-double',
			'fa-f14a' => 'fas fa-check-square',
			'fa-f14a' => 'far fa-check-square',
			'fa-f7ef' => 'fas fa-cheese',
			'fa-f439' => 'fas fa-chess',
			'fa-f43a' => 'fas fa-chess-bishop',
			'fa-f43c' => 'fas fa-chess-board',
			'fa-f43f' => 'fas fa-chess-king',
			'fa-f441' => 'fas fa-chess-knight',
			'fa-f443' => 'fas fa-chess-pawn',
			'fa-f445' => 'fas fa-chess-queen',
			'fa-f447' => 'fas fa-chess-rook',
			'fa-f13a' => 'fas fa-chevron-circle-down',
			'fa-f137' => 'fas fa-chevron-circle-left',
			'fa-f138' => 'fas fa-chevron-circle-right',
			'fa-f139' => 'fas fa-chevron-circle-up',
			'fa-f078' => 'fas fa-chevron-down',
			'fa-f053' => 'fas fa-chevron-left',
			'fa-f054' => 'fas fa-chevron-right',
			'fa-f077' => 'fas fa-chevron-up',
			'fa-f1ae' => 'fas fa-child',
			'fa-f268' => 'fab fa-chrome',
			'fa-f51d' => 'fas fa-church',
			'fa-f111' => 'fas fa-circle',
			'fa-f111' => 'far fa-circle',
			'fa-f1ce' => 'fas fa-circle-notch',
			'fa-f64f' => 'fas fa-city',
			'fa-f7f2' => 'fas fa-clinic-medical',
			'fa-f328' => 'fas fa-clipboard',
			'fa-f328' => 'far fa-clipboard',
			'fa-f46c' => 'fas fa-clipboard-check',
			'fa-f46d' => 'fas fa-clipboard-list',
			'fa-f017' => 'fas fa-clock',
			'fa-f017' => 'far fa-clock',
			'fa-f24d' => 'fas fa-clone',
			'fa-f24d' => 'far fa-clone',
			'fa-f20a' => 'fas fa-closed-captioning',
			'fa-f20a' => 'far fa-closed-captioning',
			'fa-f0c2' => 'fas fa-cloud',
			'fa-f381' => 'fas fa-cloud-download-alt',
			'fa-f73b' => 'fas fa-cloud-meatball',
			'fa-f6c3' => 'fas fa-cloud-moon',
			'fa-f73c' => 'fas fa-cloud-moon-rain',
			'fa-f73d' => 'fas fa-cloud-rain',
			'fa-f740' => 'fas fa-cloud-showers-heavy',
			'fa-f6c4' => 'fas fa-cloud-sun',
			'fa-f743' => 'fas fa-cloud-sun-rain',
			'fa-f382' => 'fas fa-cloud-upload-alt',
			'fa-f383' => 'fab fa-cloudscale',
			'fa-f384' => 'fab fa-cloudsmith',
			'fa-f385' => 'fab fa-cloudversify',
			'fa-f561' => 'fas fa-cocktail',
			'fa-f121' => 'fas fa-code',
			'fa-f126' => 'fas fa-code-branch',
			'fa-f1cb' => 'fab fa-codepen',
			'fa-f284' => 'fab fa-codiepie',
			'fa-f0f4' => 'fas fa-coffee',
			'fa-f013' => 'fas fa-cog',
			'fa-f085' => 'fas fa-cogs',
			'fa-f51e' => 'fas fa-coins',
			'fa-f0db' => 'fas fa-columns',
			'fa-f075' => 'fas fa-comment',
			'fa-f075' => 'far fa-comment',
			'fa-f27a' => 'fas fa-comment-alt',
			'fa-f27a' => 'far fa-comment-alt',
			'fa-f651' => 'fas fa-comment-dollar',
			'fa-f4ad' => 'fas fa-comment-dots',
			'fa-f4ad' => 'far fa-comment-dots',
			'fa-f7f5' => 'fas fa-comment-medical',
			'fa-f4b3' => 'fas fa-comment-slash',
			'fa-f086' => 'fas fa-comments',
			'fa-f086' => 'far fa-comments',
			'fa-f653' => 'fas fa-comments-dollar',
			'fa-f51f' => 'fas fa-compact-disc',
			'fa-f14e' => 'fas fa-compass',
			'fa-f14e' => 'far fa-compass',
			'fa-f066' => 'fas fa-compress',
			'fa-f78c' => 'fas fa-compress-arrows-alt',
			'fa-f562' => 'fas fa-concierge-bell',
			'fa-f78d' => 'fab fa-confluence',
			'fa-f20e' => 'fab fa-connectdevelop',
			'fa-f26d' => 'fab fa-contao',
			'fa-f563' => 'fas fa-cookie',
			'fa-f564' => 'fas fa-cookie-bite',
			'fa-f0c5' => 'fas fa-copy',
			'fa-f0c5' => 'far fa-copy',
			'fa-f1f9' => 'fas fa-copyright',
			'fa-f1f9' => 'far fa-copyright',
			'fa-f4b8' => 'fas fa-couch',
			'fa-f388' => 'fab fa-cpanel',
			'fa-f25e' => 'fab fa-creative-commons',
			'fa-f4e7' => 'fab fa-creative-commons-by',
			'fa-f4e8' => 'fab fa-creative-commons-nc',
			'fa-f4e9' => 'fab fa-creative-commons-nc-eu',
			'fa-f4ea' => 'fab fa-creative-commons-nc-jp',
			'fa-f4eb' => 'fab fa-creative-commons-nd',
			'fa-f4ec' => 'fab fa-creative-commons-pd',
			'fa-f4ed' => 'fab fa-creative-commons-pd-alt',
			'fa-f4ee' => 'fab fa-creative-commons-remix',
			'fa-f4ef' => 'fab fa-creative-commons-sa',
			'fa-f4f0' => 'fab fa-creative-commons-sampling',
			'fa-f4f1' => 'fab fa-creative-commons-sampling-plus',
			'fa-f4f2' => 'fab fa-creative-commons-share',
			'fa-f4f3' => 'fab fa-creative-commons-zero',
			'fa-f09d' => 'fas fa-credit-card',
			'fa-f09d' => 'far fa-credit-card',
			'fa-f6c9' => 'fab fa-critical-role',
			'fa-f125' => 'fas fa-crop',
			'fa-f565' => 'fas fa-crop-alt',
			'fa-f654' => 'fas fa-cross',
			'fa-f05b' => 'fas fa-crosshairs',
			'fa-f520' => 'fas fa-crow',
			'fa-f521' => 'fas fa-crown',
			'fa-f7f7' => 'fas fa-crutch',
			'fa-f13c' => 'fab fa-css3',
			'fa-f38b' => 'fab fa-css3-alt',
			'fa-f1b2' => 'fas fa-cube',
			'fa-f1b3' => 'fas fa-cubes',
			'fa-f0c4' => 'fas fa-cut',
			'fa-f38c' => 'fab fa-cuttlefish',
			'fa-f38d' => 'fab fa-d-and-d',
			'fa-f6ca' => 'fab fa-d-and-d-beyond',
			'fa-f210' => 'fab fa-dashcube',
			'fa-f1c0' => 'fas fa-database',
			'fa-f2a4' => 'fas fa-deaf',
			'fa-f1a5' => 'fab fa-delicious',
			'fa-f747' => 'fas fa-democrat',
			'fa-f38e' => 'fab fa-deploydog',
			'fa-f38f' => 'fab fa-deskpro',
			'fa-f108' => 'fas fa-desktop',
			'fa-f6cc' => 'fab fa-dev',
			'fa-f1bd' => 'fab fa-deviantart',
			'fa-f655' => 'fas fa-dharmachakra',
			'fa-f790' => 'fab fa-dhl',
			'fa-f470' => 'fas fa-diagnoses',
			'fa-f791' => 'fab fa-diaspora',
			'fa-f522' => 'fas fa-dice',
			'fa-f6cf' => 'fas fa-dice-d20',
			'fa-f6d1' => 'fas fa-dice-d6',
			'fa-f523' => 'fas fa-dice-five',
			'fa-f524' => 'fas fa-dice-four',
			'fa-f525' => 'fas fa-dice-one',
			'fa-f526' => 'fas fa-dice-six',
			'fa-f527' => 'fas fa-dice-three',
			'fa-f528' => 'fas fa-dice-two',
			'fa-f1a6' => 'fab fa-digg',
			'fa-f391' => 'fab fa-digital-ocean',
			'fa-f566' => 'fas fa-digital-tachograph',
			'fa-f5eb' => 'fas fa-directions',
			'fa-f392' => 'fab fa-discord',
			'fa-f393' => 'fab fa-discourse',
			'fa-f529' => 'fas fa-divide',
			'fa-f567' => 'fas fa-dizzy',
			'fa-f567' => 'far fa-dizzy',
			'fa-f471' => 'fas fa-dna',
			'fa-f394' => 'fab fa-dochub',
			'fa-f395' => 'fab fa-docker',
			'fa-f6d3' => 'fas fa-dog',
			'fa-f155' => 'fas fa-dollar-sign',
			'fa-f472' => 'fas fa-dolly',
			'fa-f474' => 'fas fa-dolly-flatbed',
			'fa-f4b9' => 'fas fa-donate',
			'fa-f52a' => 'fas fa-door-closed',
			'fa-f52b' => 'fas fa-door-open',
			'fa-f192' => 'fas fa-dot-circle',
			'fa-f192' => 'far fa-dot-circle',
			'fa-f4ba' => 'fas fa-dove',
			'fa-f019' => 'fas fa-download',
			'fa-f396' => 'fab fa-draft2digital',
			'fa-f568' => 'fas fa-drafting-compass',
			'fa-f6d5' => 'fas fa-dragon',
			'fa-f5ee' => 'fas fa-draw-polygon',
			'fa-f17d' => 'fab fa-dribbble',
			'fa-f397' => 'fab fa-dribbble-square',
			'fa-f16b' => 'fab fa-dropbox',
			'fa-f569' => 'fas fa-drum',
			'fa-f56a' => 'fas fa-drum-steelpan',
			'fa-f6d7' => 'fas fa-drumstick-bite',
			'fa-f1a9' => 'fab fa-drupal',
			'fa-f44b' => 'fas fa-dumbbell',
			'fa-f793' => 'fas fa-dumpster',
			'fa-f794' => 'fas fa-dumpster-fire',
			'fa-f6d9' => 'fas fa-dungeon',
			'fa-f399' => 'fab fa-dyalog',
			'fa-f39a' => 'fab fa-earlybirds',
			'fa-f4f4' => 'fab fa-ebay',
			'fa-f282' => 'fab fa-edge',
			'fa-f044' => 'fas fa-edit',
			'fa-f044' => 'far fa-edit',
			'fa-f7fb' => 'fas fa-egg',
			'fa-f052' => 'fas fa-eject',
			'fa-f430' => 'fab fa-elementor',
			'fa-f141' => 'fas fa-ellipsis-h',
			'fa-f142' => 'fas fa-ellipsis-v',
			'fa-f5f1' => 'fab fa-ello',
			'fa-f423' => 'fab fa-ember',
			'fa-f1d1' => 'fab fa-empire',
			'fa-f0e0' => 'fas fa-envelope',
			'fa-f0e0' => 'far fa-envelope',
			'fa-f2b6' => 'fas fa-envelope-open',
			'fa-f2b6' => 'far fa-envelope-open',
			'fa-f658' => 'fas fa-envelope-open-text',
			'fa-f199' => 'fas fa-envelope-square',
			'fa-f299' => 'fab fa-envira',
			'fa-f52c' => 'fas fa-equals',
			'fa-f12d' => 'fas fa-eraser',
			'fa-f39d' => 'fab fa-erlang',
			'fa-f42e' => 'fab fa-ethereum',
			'fa-f796' => 'fas fa-ethernet',
			'fa-f2d7' => 'fab fa-etsy',
			'fa-f153' => 'fas fa-euro-sign',
			'fa-f362' => 'fas fa-exchange-alt',
			'fa-f12a' => 'fas fa-exclamation',
			'fa-f06a' => 'fas fa-exclamation-circle',
			'fa-f071' => 'fas fa-exclamation-triangle',
			'fa-f065' => 'fas fa-expand',
			'fa-f31e' => 'fas fa-expand-arrows-alt',
			'fa-f23e' => 'fab fa-expeditedssl',
			'fa-f35d' => 'fas fa-external-link-alt',
			'fa-f360' => 'fas fa-external-link-square-alt',
			'fa-f06e' => 'fas fa-eye',
			'fa-f06e' => 'far fa-eye',
			'fa-f1fb' => 'fas fa-eye-dropper',
			'fa-f070' => 'fas fa-eye-slash',
			'fa-f070' => 'far fa-eye-slash',
			'fa-f09a' => 'fab fa-facebook',
			'fa-f39e' => 'fab fa-facebook-f',
			'fa-f39f' => 'fab fa-facebook-messenger',
			'fa-f082' => 'fab fa-facebook-square',
			'fa-f6dc' => 'fab fa-fantasy-flight-games',
			'fa-f049' => 'fas fa-fast-backward',
			'fa-f050' => 'fas fa-fast-forward',
			'fa-f1ac' => 'fas fa-fax',
			'fa-f52d' => 'fas fa-feather',
			'fa-f56b' => 'fas fa-feather-alt',
			'fa-f797' => 'fab fa-fedex',
			'fa-f798' => 'fab fa-fedora',
			'fa-f182' => 'fas fa-female',
			'fa-f0fb' => 'fas fa-fighter-jet',
			'fa-f799' => 'fab fa-figma',
			'fa-f15b' => 'fas fa-file',
			'fa-f15b' => 'far fa-file',
			'fa-f15c' => 'fas fa-file-alt',
			'fa-f15c' => 'far fa-file-alt',
			'fa-f1c6' => 'fas fa-file-archive',
			'fa-f1c6' => 'far fa-file-archive',
			'fa-f1c7' => 'fas fa-file-audio',
			'fa-f1c7' => 'far fa-file-audio',
			'fa-f1c9' => 'fas fa-file-code',
			'fa-f1c9' => 'far fa-file-code',
			'fa-f56c' => 'fas fa-file-contract',
			'fa-f6dd' => 'fas fa-file-csv',
			'fa-f56d' => 'fas fa-file-download',
			'fa-f1c3' => 'fas fa-file-excel',
			'fa-f1c3' => 'far fa-file-excel',
			'fa-f56e' => 'fas fa-file-export',
			'fa-f1c5' => 'fas fa-file-image',
			'fa-f1c5' => 'far fa-file-image',
			'fa-f56f' => 'fas fa-file-import',
			'fa-f570' => 'fas fa-file-invoice',
			'fa-f571' => 'fas fa-file-invoice-dollar',
			'fa-f477' => 'fas fa-file-medical',
			'fa-f478' => 'fas fa-file-medical-alt',
			'fa-f1c1' => 'fas fa-file-pdf',
			'fa-f1c1' => 'far fa-file-pdf',
			'fa-f1c4' => 'fas fa-file-powerpoint',
			'fa-f1c4' => 'far fa-file-powerpoint',
			'fa-f572' => 'fas fa-file-prescription',
			'fa-f573' => 'fas fa-file-signature',
			'fa-f574' => 'fas fa-file-upload',
			'fa-f1c8' => 'fas fa-file-video',
			'fa-f1c8' => 'far fa-file-video',
			'fa-f1c2' => 'fas fa-file-word',
			'fa-f1c2' => 'far fa-file-word',
			'fa-f575' => 'fas fa-fill',
			'fa-f576' => 'fas fa-fill-drip',
			'fa-f008' => 'fas fa-film',
			'fa-f0b0' => 'fas fa-filter',
			'fa-f577' => 'fas fa-fingerprint',
			'fa-f06d' => 'fas fa-fire',
			'fa-f7e4' => 'fas fa-fire-alt',
			'fa-f134' => 'fas fa-fire-extinguisher',
			'fa-f269' => 'fab fa-firefox',
			'fa-f479' => 'fas fa-first-aid',
			'fa-f2b0' => 'fab fa-first-order',
			'fa-f50a' => 'fab fa-first-order-alt',
			'fa-f3a1' => 'fab fa-firstdraft',
			'fa-f578' => 'fas fa-fish',
			'fa-f6de' => 'fas fa-fist-raised',
			'fa-f024' => 'fas fa-flag',
			'fa-f024' => 'far fa-flag',
			'fa-f11e' => 'fas fa-flag-checkered',
			'fa-f74d' => 'fas fa-flag-usa',
			'fa-f0c3' => 'fas fa-flask',
			'fa-f16e' => 'fab fa-flickr',
			'fa-f44d' => 'fab fa-flipboard',
			'fa-f579' => 'fas fa-flushed',
			'fa-f579' => 'far fa-flushed',
			'fa-f417' => 'fab fa-fly',
			'fa-f07b' => 'fas fa-folder',
			'fa-f07b' => 'far fa-folder',
			'fa-f65d' => 'fas fa-folder-minus',
			'fa-f07c' => 'fas fa-folder-open',
			'fa-f07c' => 'far fa-folder-open',
			'fa-f65e' => 'fas fa-folder-plus',
			'fa-f031' => 'fas fa-font',
			'fa-f2b4' => 'fab fa-font-awesome',
			'fa-f35c' => 'fab fa-font-awesome-alt',
			'fa-f425' => 'fab fa-font-awesome-flag',
			'fa-f4e6' => 'far fa-font-awesome-logo-full',
			'fa-f4e6' => 'fas fa-font-awesome-logo-full',
			'fa-f4e6' => 'fab fa-font-awesome-logo-full',
			'fa-f280' => 'fab fa-fonticons',
			'fa-f3a2' => 'fab fa-fonticons-fi',
			'fa-f44e' => 'fas fa-football-ball',
			'fa-f286' => 'fab fa-fort-awesome',
			'fa-f3a3' => 'fab fa-fort-awesome-alt',
			'fa-f211' => 'fab fa-forumbee',
			'fa-f04e' => 'fas fa-forward',
			'fa-f180' => 'fab fa-foursquare',
			'fa-f2c5' => 'fab fa-free-code-camp',
			'fa-f3a4' => 'fab fa-freebsd',
			'fa-f52e' => 'fas fa-frog',
			'fa-f119' => 'fas fa-frown',
			'fa-f119' => 'far fa-frown',
			'fa-f57a' => 'fas fa-frown-open',
			'fa-f57a' => 'far fa-frown-open',
			'fa-f50b' => 'fab fa-fulcrum',
			'fa-f662' => 'fas fa-funnel-dollar',
			'fa-f1e3' => 'fas fa-futbol',
			'fa-f1e3' => 'far fa-futbol',
			'fa-f50c' => 'fab fa-galactic-republic',
			'fa-f50d' => 'fab fa-galactic-senate',
			'fa-f11b' => 'fas fa-gamepad',
			'fa-f52f' => 'fas fa-gas-pump',
			'fa-f0e3' => 'fas fa-gavel',
			'fa-f3a5' => 'fas fa-gem',
			'fa-f3a5' => 'far fa-gem',
			'fa-f22d' => 'fas fa-genderless',
			'fa-f265' => 'fab fa-get-pocket',
			'fa-f260' => 'fab fa-gg',
			'fa-f261' => 'fab fa-gg-circle',
			'fa-f6e2' => 'fas fa-ghost',
			'fa-f06b' => 'fas fa-gift',
			'fa-f79c' => 'fas fa-gifts',
			'fa-f1d3' => 'fab fa-git',
			'fa-f1d2' => 'fab fa-git-square',
			'fa-f09b' => 'fab fa-github',
			'fa-f113' => 'fab fa-github-alt',
			'fa-f092' => 'fab fa-github-square',
			'fa-f3a6' => 'fab fa-gitkraken',
			'fa-f296' => 'fab fa-gitlab',
			'fa-f426' => 'fab fa-gitter',
			'fa-f79f' => 'fas fa-glass-cheers',
			'fa-f000' => 'fas fa-glass-martini',
			'fa-f57b' => 'fas fa-glass-martini-alt',
			'fa-f7a0' => 'fas fa-glass-whiskey',
			'fa-f530' => 'fas fa-glasses',
			'fa-f2a5' => 'fab fa-glide',
			'fa-f2a6' => 'fab fa-glide-g',
			'fa-f0ac' => 'fas fa-globe',
			'fa-f57c' => 'fas fa-globe-africa',
			'fa-f57d' => 'fas fa-globe-americas',
			'fa-f57e' => 'fas fa-globe-asia',
			'fa-f7a2' => 'fas fa-globe-europe',
			'fa-f3a7' => 'fab fa-gofore',
			'fa-f450' => 'fas fa-golf-ball',
			'fa-f3a8' => 'fab fa-goodreads',
			'fa-f3a9' => 'fab fa-goodreads-g',
			'fa-f1a0' => 'fab fa-google',
			'fa-f3aa' => 'fab fa-google-drive',
			'fa-f3ab' => 'fab fa-google-play',
			'fa-f2b3' => 'fab fa-google-plus',
			'fa-f0d5' => 'fab fa-google-plus-g',
			'fa-f0d4' => 'fab fa-google-plus-square',
			'fa-f1ee' => 'fab fa-google-wallet',
			'fa-f664' => 'fas fa-gopuram',
			'fa-f19d' => 'fas fa-graduation-cap',
			'fa-f184' => 'fab fa-gratipay',
			'fa-f2d6' => 'fab fa-grav',
			'fa-f531' => 'fas fa-greater-than',
			'fa-f532' => 'fas fa-greater-than-equal',
			'fa-f57f' => 'fas fa-grimace',
			'fa-f57f' => 'far fa-grimace',
			'fa-f580' => 'fas fa-grin',
			'fa-f580' => 'far fa-grin',
			'fa-f581' => 'fas fa-grin-alt',
			'fa-f581' => 'far fa-grin-alt',
			'fa-f582' => 'fas fa-grin-beam',
			'fa-f582' => 'far fa-grin-beam',
			'fa-f583' => 'fas fa-grin-beam-sweat',
			'fa-f583' => 'far fa-grin-beam-sweat',
			'fa-f584' => 'fas fa-grin-hearts',
			'fa-f584' => 'far fa-grin-hearts',
			'fa-f585' => 'fas fa-grin-squint',
			'fa-f585' => 'far fa-grin-squint',
			'fa-f586' => 'fas fa-grin-squint-tears',
			'fa-f586' => 'far fa-grin-squint-tears',
			'fa-f587' => 'fas fa-grin-stars',
			'fa-f587' => 'far fa-grin-stars',
			'fa-f588' => 'fas fa-grin-tears',
			'fa-f588' => 'far fa-grin-tears',
			'fa-f589' => 'fas fa-grin-tongue',
			'fa-f589' => 'far fa-grin-tongue',
			'fa-f58a' => 'fas fa-grin-tongue-squint',
			'fa-f58a' => 'far fa-grin-tongue-squint',
			'fa-f58b' => 'fas fa-grin-tongue-wink',
			'fa-f58b' => 'far fa-grin-tongue-wink',
			'fa-f58c' => 'fas fa-grin-wink',
			'fa-f58c' => 'far fa-grin-wink',
			'fa-f58d' => 'fas fa-grip-horizontal',
			'fa-f7a4' => 'fas fa-grip-lines',
			'fa-f7a5' => 'fas fa-grip-lines-vertical',
			'fa-f58e' => 'fas fa-grip-vertical',
			'fa-f3ac' => 'fab fa-gripfire',
			'fa-f3ad' => 'fab fa-grunt',
			'fa-f7a6' => 'fas fa-guitar',
			'fa-f3ae' => 'fab fa-gulp',
			'fa-f0fd' => 'fas fa-h-square',
			'fa-f1d4' => 'fab fa-hacker-news',
			'fa-f3af' => 'fab fa-hacker-news-square',
			'fa-f5f7' => 'fab fa-hackerrank',
			'fa-f805' => 'fas fa-hamburger',
			'fa-f6e3' => 'fas fa-hammer',
			'fa-f665' => 'fas fa-hamsa',
			'fa-f4bd' => 'fas fa-hand-holding',
			'fa-f4be' => 'fas fa-hand-holding-heart',
			'fa-f4c0' => 'fas fa-hand-holding-usd',
			'fa-f258' => 'fas fa-hand-lizard',
			'fa-f258' => 'far fa-hand-lizard',
			'fa-f806' => 'fas fa-hand-middle-finger',
			'fa-f256' => 'fas fa-hand-paper',
			'fa-f256' => 'far fa-hand-paper',
			'fa-f25b' => 'fas fa-hand-peace',
			'fa-f25b' => 'far fa-hand-peace',
			'fa-f0a7' => 'fas fa-hand-point-down',
			'fa-f0a7' => 'far fa-hand-point-down',
			'fa-f0a5' => 'fas fa-hand-point-left',
			'fa-f0a5' => 'far fa-hand-point-left',
			'fa-f0a4' => 'fas fa-hand-point-right',
			'fa-f0a4' => 'far fa-hand-point-right',
			'fa-f0a6' => 'fas fa-hand-point-up',
			'fa-f0a6' => 'far fa-hand-point-up',
			'fa-f25a' => 'fas fa-hand-pointer',
			'fa-f25a' => 'far fa-hand-pointer',
			'fa-f255' => 'fas fa-hand-rock',
			'fa-f255' => 'far fa-hand-rock',
			'fa-f257' => 'fas fa-hand-scissors',
			'fa-f257' => 'far fa-hand-scissors',
			'fa-f259' => 'fas fa-hand-spock',
			'fa-f259' => 'far fa-hand-spock',
			'fa-f4c2' => 'fas fa-hands',
			'fa-f4c4' => 'fas fa-hands-helping',
			'fa-f2b5' => 'fas fa-handshake',
			'fa-f2b5' => 'far fa-handshake',
			'fa-f6e6' => 'fas fa-hanukiah',
			'fa-f807' => 'fas fa-hard-hat',
			'fa-f292' => 'fas fa-hashtag',
			'fa-f6e8' => 'fas fa-hat-wizard',
			'fa-f666' => 'fas fa-haykal',
			'fa-f0a0' => 'fas fa-hdd',
			'fa-f0a0' => 'far fa-hdd',
			'fa-f1dc' => 'fas fa-heading',
			'fa-f025' => 'fas fa-headphones',
			'fa-f58f' => 'fas fa-headphones-alt',
			'fa-f590' => 'fas fa-headset',
			'fa-f004' => 'fas fa-heart',
			'fa-f004' => 'far fa-heart',
			'fa-f7a9' => 'fas fa-heart-broken',
			'fa-f21e' => 'fas fa-heartbeat',
			'fa-f533' => 'fas fa-helicopter',
			'fa-f591' => 'fas fa-highlighter',
			'fa-f6ec' => 'fas fa-hiking',
			'fa-f6ed' => 'fas fa-hippo',
			'fa-f452' => 'fab fa-hips',
			'fa-f3b0' => 'fab fa-hire-a-helper',
			'fa-f1da' => 'fas fa-history',
			'fa-f453' => 'fas fa-hockey-puck',
			'fa-f7aa' => 'fas fa-holly-berry',
			'fa-f015' => 'fas fa-home',
			'fa-f427' => 'fab fa-hooli',
			'fa-f592' => 'fab fa-hornbill',
			'fa-f6f0' => 'fas fa-horse',
			'fa-f7ab' => 'fas fa-horse-head',
			'fa-f0f8' => 'fas fa-hospital',
			'fa-f0f8' => 'far fa-hospital',
			'fa-f47d' => 'fas fa-hospital-alt',
			'fa-f47e' => 'fas fa-hospital-symbol',
			'fa-f593' => 'fas fa-hot-tub',
			'fa-f80f' => 'fas fa-hotdog',
			'fa-f594' => 'fas fa-hotel',
			'fa-f3b1' => 'fab fa-hotjar',
			'fa-f254' => 'fas fa-hourglass',
			'fa-f254' => 'far fa-hourglass',
			'fa-f253' => 'fas fa-hourglass-end',
			'fa-f252' => 'fas fa-hourglass-half',
			'fa-f251' => 'fas fa-hourglass-start',
			'fa-f6f1' => 'fas fa-house-damage',
			'fa-f27c' => 'fab fa-houzz',
			'fa-f6f2' => 'fas fa-hryvnia',
			'fa-f13b' => 'fab fa-html5',
			'fa-f3b2' => 'fab fa-hubspot',
			'fa-f246' => 'fas fa-i-cursor',
			'fa-f810' => 'fas fa-ice-cream',
			'fa-f7ad' => 'fas fa-icicles',
			'fa-f2c1' => 'fas fa-id-badge',
			'fa-f2c1' => 'far fa-id-badge',
			'fa-f2c2' => 'fas fa-id-card',
			'fa-f2c2' => 'far fa-id-card',
			'fa-f47f' => 'fas fa-id-card-alt',
			'fa-f7ae' => 'fas fa-igloo',
			'fa-f03e' => 'fas fa-image',
			'fa-f03e' => 'far fa-image',
			'fa-f302' => 'fas fa-images',
			'fa-f302' => 'far fa-images',
			'fa-f2d8' => 'fab fa-imdb',
			'fa-f01c' => 'fas fa-inbox',
			'fa-f03c' => 'fas fa-indent',
			'fa-f275' => 'fas fa-industry',
			'fa-f534' => 'fas fa-infinity',
			'fa-f129' => 'fas fa-info',
			'fa-f05a' => 'fas fa-info-circle',
			'fa-f16d' => 'fab fa-instagram',
			'fa-f7af' => 'fab fa-intercom',
			'fa-f26b' => 'fab fa-internet-explorer',
			'fa-f7b0' => 'fab fa-invision',
			'fa-f208' => 'fab fa-ioxhost',
			'fa-f033' => 'fas fa-italic',
			'fa-f3b4' => 'fab fa-itunes',
			'fa-f3b5' => 'fab fa-itunes-note',
			'fa-f4e4' => 'fab fa-java',
			'fa-f669' => 'fas fa-jedi',
			'fa-f50e' => 'fab fa-jedi-order',
			'fa-f3b6' => 'fab fa-jenkins',
			'fa-f7b1' => 'fab fa-jira',
			'fa-f3b7' => 'fab fa-joget',
			'fa-f595' => 'fas fa-joint',
			'fa-f1aa' => 'fab fa-joomla',
			'fa-f66a' => 'fas fa-journal-whills',
			'fa-f3b8' => 'fab fa-js',
			'fa-f3b9' => 'fab fa-js-square',
			'fa-f1cc' => 'fab fa-jsfiddle',
			'fa-f66b' => 'fas fa-kaaba',
			'fa-f5fa' => 'fab fa-kaggle',
			'fa-f084' => 'fas fa-key',
			'fa-f4f5' => 'fab fa-keybase',
			'fa-f11c' => 'fas fa-keyboard',
			'fa-f11c' => 'far fa-keyboard',
			'fa-f3ba' => 'fab fa-keycdn',
			'fa-f66d' => 'fas fa-khanda',
			'fa-f3bb' => 'fab fa-kickstarter',
			'fa-f3bc' => 'fab fa-kickstarter-k',
			'fa-f596' => 'fas fa-kiss',
			'fa-f596' => 'far fa-kiss',
			'fa-f597' => 'fas fa-kiss-beam',
			'fa-f597' => 'far fa-kiss-beam',
			'fa-f598' => 'fas fa-kiss-wink-heart',
			'fa-f598' => 'far fa-kiss-wink-heart',
			'fa-f535' => 'fas fa-kiwi-bird',
			'fa-f42f' => 'fab fa-korvue',
			'fa-f66f' => 'fas fa-landmark',
			'fa-f1ab' => 'fas fa-language',
			'fa-f109' => 'fas fa-laptop',
			'fa-f5fc' => 'fas fa-laptop-code',
			'fa-f812' => 'fas fa-laptop-medical',
			'fa-f3bd' => 'fab fa-laravel',
			'fa-f202' => 'fab fa-lastfm',
			'fa-f203' => 'fab fa-lastfm-square',
			'fa-f599' => 'fas fa-laugh',
			'fa-f599' => 'far fa-laugh',
			'fa-f59a' => 'fas fa-laugh-beam',
			'fa-f59a' => 'far fa-laugh-beam',
			'fa-f59b' => 'fas fa-laugh-squint',
			'fa-f59b' => 'far fa-laugh-squint',
			'fa-f59c' => 'fas fa-laugh-wink',
			'fa-f59c' => 'far fa-laugh-wink',
			'fa-f5fd' => 'fas fa-layer-group',
			'fa-f06c' => 'fas fa-leaf',
			'fa-f212' => 'fab fa-leanpub',
			'fa-f094' => 'fas fa-lemon',
			'fa-f094' => 'far fa-lemon',
			'fa-f41d' => 'fab fa-less',
			'fa-f536' => 'fas fa-less-than',
			'fa-f537' => 'fas fa-less-than-equal',
			'fa-f3be' => 'fas fa-level-down-alt',
			'fa-f3bf' => 'fas fa-level-up-alt',
			'fa-f1cd' => 'fas fa-life-ring',
			'fa-f1cd' => 'far fa-life-ring',
			'fa-f0eb' => 'fas fa-lightbulb',
			'fa-f0eb' => 'far fa-lightbulb',
			'fa-f3c0' => 'fab fa-line',
			'fa-f0c1' => 'fas fa-link',
			'fa-f08c' => 'fab fa-linkedin',
			'fa-f0e1' => 'fab fa-linkedin-in',
			'fa-f2b8' => 'fab fa-linode',
			'fa-f17c' => 'fab fa-linux',
			'fa-f195' => 'fas fa-lira-sign',
			'fa-f03a' => 'fas fa-list',
			'fa-f022' => 'fas fa-list-alt',
			'fa-f022' => 'far fa-list-alt',
			'fa-f0cb' => 'fas fa-list-ol',
			'fa-f0ca' => 'fas fa-list-ul',
			'fa-f124' => 'fas fa-location-arrow',
			'fa-f023' => 'fas fa-lock',
			'fa-f3c1' => 'fas fa-lock-open',
			'fa-f309' => 'fas fa-long-arrow-alt-down',
			'fa-f30a' => 'fas fa-long-arrow-alt-left',
			'fa-f30b' => 'fas fa-long-arrow-alt-right',
			'fa-f30c' => 'fas fa-long-arrow-alt-up',
			'fa-f2a8' => 'fas fa-low-vision',
			'fa-f59d' => 'fas fa-luggage-cart',
			'fa-f3c3' => 'fab fa-lyft',
			'fa-f3c4' => 'fab fa-magento',
			'fa-f0d0' => 'fas fa-magic',
			'fa-f076' => 'fas fa-magnet',
			'fa-f674' => 'fas fa-mail-bulk',
			'fa-f59e' => 'fab fa-mailchimp',
			'fa-f183' => 'fas fa-male',
			'fa-f50f' => 'fab fa-mandalorian',
			'fa-f279' => 'fas fa-map',
			'fa-f279' => 'far fa-map',
			'fa-f59f' => 'fas fa-map-marked',
			'fa-f5a0' => 'fas fa-map-marked-alt',
			'fa-f041' => 'fas fa-map-marker',
			'fa-f3c5' => 'fas fa-map-marker-alt',
			'fa-f276' => 'fas fa-map-pin',
			'fa-f277' => 'fas fa-map-signs',
			'fa-f60f' => 'fab fa-markdown',
			'fa-f5a1' => 'fas fa-marker',
			'fa-f222' => 'fas fa-mars',
			'fa-f227' => 'fas fa-mars-double',
			'fa-f229' => 'fas fa-mars-stroke',
			'fa-f22b' => 'fas fa-mars-stroke-h',
			'fa-f22a' => 'fas fa-mars-stroke-v',
			'fa-f6fa' => 'fas fa-mask',
			'fa-f4f6' => 'fab fa-mastodon',
			'fa-f136' => 'fab fa-maxcdn',
			'fa-f5a2' => 'fas fa-medal',
			'fa-f3c6' => 'fab fa-medapps',
			'fa-f23a' => 'fab fa-medium',
			'fa-f3c7' => 'fab fa-medium-m',
			'fa-f0fa' => 'fas fa-medkit',
			'fa-f3c8' => 'fab fa-medrt',
			'fa-f2e0' => 'fab fa-meetup',
			'fa-f5a3' => 'fab fa-megaport',
			'fa-f11a' => 'fas fa-meh',
			'fa-f11a' => 'far fa-meh',
			'fa-f5a4' => 'fas fa-meh-blank',
			'fa-f5a4' => 'far fa-meh-blank',
			'fa-f5a5' => 'fas fa-meh-rolling-eyes',
			'fa-f5a5' => 'far fa-meh-rolling-eyes',
			'fa-f538' => 'fas fa-memory',
			'fa-f7b3' => 'fab fa-mendeley',
			'fa-f676' => 'fas fa-menorah',
			'fa-f223' => 'fas fa-mercury',
			'fa-f753' => 'fas fa-meteor',
			'fa-f2db' => 'fas fa-microchip',
			'fa-f130' => 'fas fa-microphone',
			'fa-f3c9' => 'fas fa-microphone-alt',
			'fa-f539' => 'fas fa-microphone-alt-slash',
			'fa-f131' => 'fas fa-microphone-slash',
			'fa-f610' => 'fas fa-microscope',
			'fa-f3ca' => 'fab fa-microsoft',
			'fa-f068' => 'fas fa-minus',
			'fa-f056' => 'fas fa-minus-circle',
			'fa-f146' => 'fas fa-minus-square',
			'fa-f146' => 'far fa-minus-square',
			'fa-f7b5' => 'fas fa-mitten',
			'fa-f3cb' => 'fab fa-mix',
			'fa-f289' => 'fab fa-mixcloud',
			'fa-f3cc' => 'fab fa-mizuni',
			'fa-f10b' => 'fas fa-mobile',
			'fa-f3cd' => 'fas fa-mobile-alt',
			'fa-f285' => 'fab fa-modx',
			'fa-f3d0' => 'fab fa-monero',
			'fa-f0d6' => 'fas fa-money-bill',
			'fa-f3d1' => 'fas fa-money-bill-alt',
			'fa-f3d1' => 'far fa-money-bill-alt',
			'fa-f53a' => 'fas fa-money-bill-wave',
			'fa-f53b' => 'fas fa-money-bill-wave-alt',
			'fa-f53c' => 'fas fa-money-check',
			'fa-f53d' => 'fas fa-money-check-alt',
			'fa-f5a6' => 'fas fa-monument',
			'fa-f186' => 'fas fa-moon',
			'fa-f186' => 'far fa-moon',
			'fa-f5a7' => 'fas fa-mortar-pestle',
			'fa-f678' => 'fas fa-mosque',
			'fa-f21c' => 'fas fa-motorcycle',
			'fa-f6fc' => 'fas fa-mountain',
			'fa-f245' => 'fas fa-mouse-pointer',
			'fa-f7b6' => 'fas fa-mug-hot',
			'fa-f001' => 'fas fa-music',
			'fa-f3d2' => 'fab fa-napster',
			'fa-f612' => 'fab fa-neos',
			'fa-f6ff' => 'fas fa-network-wired',
			'fa-f22c' => 'fas fa-neuter',
			'fa-f1ea' => 'fas fa-newspaper',
			'fa-f1ea' => 'far fa-newspaper',
			'fa-f5a8' => 'fab fa-nimblr',
			'fa-f418' => 'fab fa-nintendo-switch',
			'fa-f419' => 'fab fa-node',
			'fa-f3d3' => 'fab fa-node-js',
			'fa-f53e' => 'fas fa-not-equal',
			'fa-f481' => 'fas fa-notes-medical',
			'fa-f3d4' => 'fab fa-npm',
			'fa-f3d5' => 'fab fa-ns8',
			'fa-f3d6' => 'fab fa-nutritionix',
			'fa-f247' => 'fas fa-object-group',
			'fa-f247' => 'far fa-object-group',
			'fa-f248' => 'fas fa-object-ungroup',
			'fa-f248' => 'far fa-object-ungroup',
			'fa-f263' => 'fab fa-odnoklassniki',
			'fa-f264' => 'fab fa-odnoklassniki-square',
			'fa-f613' => 'fas fa-oil-can',
			'fa-f510' => 'fab fa-old-republic',
			'fa-f679' => 'fas fa-om',
			'fa-f23d' => 'fab fa-opencart',
			'fa-f19b' => 'fab fa-openid',
			'fa-f26a' => 'fab fa-opera',
			'fa-f23c' => 'fab fa-optin-monster',
			'fa-f41a' => 'fab fa-osi',
			'fa-f700' => 'fas fa-otter',
			'fa-f03b' => 'fas fa-outdent',
			'fa-f3d7' => 'fab fa-page4',
			'fa-f18c' => 'fab fa-pagelines',
			'fa-f815' => 'fas fa-pager',
			'fa-f1fc' => 'fas fa-paint-brush',
			'fa-f5aa' => 'fas fa-paint-roller',
			'fa-f53f' => 'fas fa-palette',
			'fa-f3d8' => 'fab fa-palfed',
			'fa-f482' => 'fas fa-pallet',
			'fa-f1d8' => 'fas fa-paper-plane',
			'fa-f1d8' => 'far fa-paper-plane',
			'fa-f0c6' => 'fas fa-paperclip',
			'fa-f4cd' => 'fas fa-parachute-box',
			'fa-f1dd' => 'fas fa-paragraph',
			'fa-f540' => 'fas fa-parking',
			'fa-f5ab' => 'fas fa-passport',
			'fa-f67b' => 'fas fa-pastafarianism',
			'fa-f0ea' => 'fas fa-paste',
			'fa-f3d9' => 'fab fa-patreon',
			'fa-f04c' => 'fas fa-pause',
			'fa-f28b' => 'fas fa-pause-circle',
			'fa-f28b' => 'far fa-pause-circle',
			'fa-f1b0' => 'fas fa-paw',
			'fa-f1ed' => 'fab fa-paypal',
			'fa-f67c' => 'fas fa-peace',
			'fa-f304' => 'fas fa-pen',
			'fa-f305' => 'fas fa-pen-alt',
			'fa-f5ac' => 'fas fa-pen-fancy',
			'fa-f5ad' => 'fas fa-pen-nib',
			'fa-f14b' => 'fas fa-pen-square',
			'fa-f303' => 'fas fa-pencil-alt',
			'fa-f5ae' => 'fas fa-pencil-ruler',
			'fa-f704' => 'fab fa-penny-arcade',
			'fa-f4ce' => 'fas fa-people-carry',
			'fa-f816' => 'fas fa-pepper-hot',
			'fa-f295' => 'fas fa-percent',
			'fa-f541' => 'fas fa-percentage',
			'fa-f3da' => 'fab fa-periscope',
			'fa-f756' => 'fas fa-person-booth',
			'fa-f3db' => 'fab fa-phabricator',
			'fa-f3dc' => 'fab fa-phoenix-framework',
			'fa-f511' => 'fab fa-phoenix-squadron',
			'fa-f095' => 'fas fa-phone',
			'fa-f3dd' => 'fas fa-phone-slash',
			'fa-f098' => 'fas fa-phone-square',
			'fa-f2a0' => 'fas fa-phone-volume',
			'fa-f457' => 'fab fa-php',
			'fa-f2ae' => 'fab fa-pied-piper',
			'fa-f1a8' => 'fab fa-pied-piper-alt',
			'fa-f4e5' => 'fab fa-pied-piper-hat',
			'fa-f1a7' => 'fab fa-pied-piper-pp',
			'fa-f4d3' => 'fas fa-piggy-bank',
			'fa-f484' => 'fas fa-pills',
			'fa-f0d2' => 'fab fa-pinterest',
			'fa-f231' => 'fab fa-pinterest-p',
			'fa-f0d3' => 'fab fa-pinterest-square',
			'fa-f818' => 'fas fa-pizza-slice',
			'fa-f67f' => 'fas fa-place-of-worship',
			'fa-f072' => 'fas fa-plane',
			'fa-f5af' => 'fas fa-plane-arrival',
			'fa-f5b0' => 'fas fa-plane-departure',
			'fa-f04b' => 'fas fa-play',
			'fa-f144' => 'fas fa-play-circle',
			'fa-f144' => 'far fa-play-circle',
			'fa-f3df' => 'fab fa-playstation',
			'fa-f1e6' => 'fas fa-plug',
			'fa-f067' => 'fas fa-plus',
			'fa-f055' => 'fas fa-plus-circle',
			'fa-f0fe' => 'fas fa-plus-square',
			'fa-f0fe' => 'far fa-plus-square',
			'fa-f2ce' => 'fas fa-podcast',
			'fa-f681' => 'fas fa-poll',
			'fa-f682' => 'fas fa-poll-h',
			'fa-f2fe' => 'fas fa-poo',
			'fa-f75a' => 'fas fa-poo-storm',
			'fa-f619' => 'fas fa-poop',
			'fa-f3e0' => 'fas fa-portrait',
			'fa-f154' => 'fas fa-pound-sign',
			'fa-f011' => 'fas fa-power-off',
			'fa-f683' => 'fas fa-pray',
			'fa-f684' => 'fas fa-praying-hands',
			'fa-f5b1' => 'fas fa-prescription',
			'fa-f485' => 'fas fa-prescription-bottle',
			'fa-f486' => 'fas fa-prescription-bottle-alt',
			'fa-f02f' => 'fas fa-print',
			'fa-f487' => 'fas fa-procedures',
			'fa-f288' => 'fab fa-product-hunt',
			'fa-f542' => 'fas fa-project-diagram',
			'fa-f3e1' => 'fab fa-pushed',
			'fa-f12e' => 'fas fa-puzzle-piece',
			'fa-f3e2' => 'fab fa-python',
			'fa-f1d6' => 'fab fa-qq',
			'fa-f029' => 'fas fa-qrcode',
			'fa-f128' => 'fas fa-question',
			'fa-f059' => 'fas fa-question-circle',
			'fa-f059' => 'far fa-question-circle',
			'fa-f458' => 'fas fa-quidditch',
			'fa-f459' => 'fab fa-quinscape',
			'fa-f2c4' => 'fab fa-quora',
			'fa-f10d' => 'fas fa-quote-left',
			'fa-f10e' => 'fas fa-quote-right',
			'fa-f687' => 'fas fa-quran',
			'fa-f4f7' => 'fab fa-r-project',
			'fa-f7b9' => 'fas fa-radiation',
			'fa-f7ba' => 'fas fa-radiation-alt',
			'fa-f75b' => 'fas fa-rainbow',
			'fa-f074' => 'fas fa-random',
			'fa-f7bb' => 'fab fa-raspberry-pi',
			'fa-f2d9' => 'fab fa-ravelry',
			'fa-f41b' => 'fab fa-react',
			'fa-f75d' => 'fab fa-reacteurope',
			'fa-f4d5' => 'fab fa-readme',
			'fa-f1d0' => 'fab fa-rebel',
			'fa-f543' => 'fas fa-receipt',
			'fa-f1b8' => 'fas fa-recycle',
			'fa-f3e3' => 'fab fa-red-river',
			'fa-f1a1' => 'fab fa-reddit',
			'fa-f281' => 'fab fa-reddit-alien',
			'fa-f1a2' => 'fab fa-reddit-square',
			'fa-f7bc' => 'fab fa-redhat',
			'fa-f01e' => 'fas fa-redo',
			'fa-f2f9' => 'fas fa-redo-alt',
			'fa-f25d' => 'fas fa-registered',
			'fa-f25d' => 'far fa-registered',
			'fa-f18b' => 'fab fa-renren',
			'fa-f3e5' => 'fas fa-reply',
			'fa-f122' => 'fas fa-reply-all',
			'fa-f3e6' => 'fab fa-replyd',
			'fa-f75e' => 'fas fa-republican',
			'fa-f4f8' => 'fab fa-researchgate',
			'fa-f3e7' => 'fab fa-resolving',
			'fa-f7bd' => 'fas fa-restroom',
			'fa-f079' => 'fas fa-retweet',
			'fa-f5b2' => 'fab fa-rev',
			'fa-f4d6' => 'fas fa-ribbon',
			'fa-f70b' => 'fas fa-ring',
			'fa-f018' => 'fas fa-road',
			'fa-f544' => 'fas fa-robot',
			'fa-f135' => 'fas fa-rocket',
			'fa-f3e8' => 'fab fa-rocketchat',
			'fa-f3e9' => 'fab fa-rockrms',
			'fa-f4d7' => 'fas fa-route',
			'fa-f09e' => 'fas fa-rss',
			'fa-f143' => 'fas fa-rss-square',
			'fa-f158' => 'fas fa-ruble-sign',
			'fa-f545' => 'fas fa-ruler',
			'fa-f546' => 'fas fa-ruler-combined',
			'fa-f547' => 'fas fa-ruler-horizontal',
			'fa-f548' => 'fas fa-ruler-vertical',
			'fa-f70c' => 'fas fa-running',
			'fa-f156' => 'fas fa-rupee-sign',
			'fa-f5b3' => 'fas fa-sad-cry',
			'fa-f5b3' => 'far fa-sad-cry',
			'fa-f5b4' => 'fas fa-sad-tear',
			'fa-f5b4' => 'far fa-sad-tear',
			'fa-f267' => 'fab fa-safari',
			'fa-f41e' => 'fab fa-sass',
			'fa-f7bf' => 'fas fa-satellite',
			'fa-f7c0' => 'fas fa-satellite-dish',
			'fa-f0c7' => 'fas fa-save',
			'fa-f0c7' => 'far fa-save',
			'fa-f3ea' => 'fab fa-schlix',
			'fa-f549' => 'fas fa-school',
			'fa-f54a' => 'fas fa-screwdriver',
			'fa-f28a' => 'fab fa-scribd',
			'fa-f70e' => 'fas fa-scroll',
			'fa-f7c2' => 'fas fa-sd-card',
			'fa-f002' => 'fas fa-search',
			'fa-f688' => 'fas fa-search-dollar',
			'fa-f689' => 'fas fa-search-location',
			'fa-f010' => 'fas fa-search-minus',
			'fa-f00e' => 'fas fa-search-plus',
			'fa-f3eb' => 'fab fa-searchengin',
			'fa-f4d8' => 'fas fa-seedling',
			'fa-f2da' => 'fab fa-sellcast',
			'fa-f213' => 'fab fa-sellsy',
			'fa-f233' => 'fas fa-server',
			'fa-f3ec' => 'fab fa-servicestack',
			'fa-f61f' => 'fas fa-shapes',
			'fa-f064' => 'fas fa-share',
			'fa-f1e0' => 'fas fa-share-alt',
			'fa-f1e1' => 'fas fa-share-alt-square',
			'fa-f14d' => 'fas fa-share-square',
			'fa-f14d' => 'far fa-share-square',
			'fa-f20b' => 'fas fa-shekel-sign',
			'fa-f3ed' => 'fas fa-shield-alt',
			'fa-f21a' => 'fas fa-ship',
			'fa-f48b' => 'fas fa-shipping-fast',
			'fa-f214' => 'fab fa-shirtsinbulk',
			'fa-f54b' => 'fas fa-shoe-prints',
			'fa-f290' => 'fas fa-shopping-bag',
			'fa-f291' => 'fas fa-shopping-basket',
			'fa-f07a' => 'fas fa-shopping-cart',
			'fa-f5b5' => 'fab fa-shopware',
			'fa-f2cc' => 'fas fa-shower',
			'fa-f5b6' => 'fas fa-shuttle-van',
			'fa-f4d9' => 'fas fa-sign',
			'fa-f2f6' => 'fas fa-sign-in-alt',
			'fa-f2a7' => 'fas fa-sign-language',
			'fa-f2f5' => 'fas fa-sign-out-alt',
			'fa-f012' => 'fas fa-signal',
			'fa-f5b7' => 'fas fa-signature',
			'fa-f7c4' => 'fas fa-sim-card',
			'fa-f215' => 'fab fa-simplybuilt',
			'fa-f3ee' => 'fab fa-sistrix',
			'fa-f0e8' => 'fas fa-sitemap',
			'fa-f512' => 'fab fa-sith',
			'fa-f7c5' => 'fas fa-skating',
			'fa-f7c6' => 'fab fa-sketch',
			'fa-f7c9' => 'fas fa-skiing',
			'fa-f7ca' => 'fas fa-skiing-nordic',
			'fa-f54c' => 'fas fa-skull',
			'fa-f714' => 'fas fa-skull-crossbones',
			'fa-f216' => 'fab fa-skyatlas',
			'fa-f17e' => 'fab fa-skype',
			'fa-f198' => 'fab fa-slack',
			'fa-f3ef' => 'fab fa-slack-hash',
			'fa-f715' => 'fas fa-slash',
			'fa-f7cc' => 'fas fa-sleigh',
			'fa-f1de' => 'fas fa-sliders-h',
			'fa-f1e7' => 'fab fa-slideshare',
			'fa-f118' => 'fas fa-smile',
			'fa-f118' => 'far fa-smile',
			'fa-f5b8' => 'fas fa-smile-beam',
			'fa-f5b8' => 'far fa-smile-beam',
			'fa-f4da' => 'fas fa-smile-wink',
			'fa-f4da' => 'far fa-smile-wink',
			'fa-f75f' => 'fas fa-smog',
			'fa-f48d' => 'fas fa-smoking',
			'fa-f54d' => 'fas fa-smoking-ban',
			'fa-f7cd' => 'fas fa-sms',
			'fa-f2ab' => 'fab fa-snapchat',
			'fa-f2ac' => 'fab fa-snapchat-ghost',
			'fa-f2ad' => 'fab fa-snapchat-square',
			'fa-f7ce' => 'fas fa-snowboarding',
			'fa-f2dc' => 'fas fa-snowflake',
			'fa-f2dc' => 'far fa-snowflake',
			'fa-f7d0' => 'fas fa-snowman',
			'fa-f7d2' => 'fas fa-snowplow',
			'fa-f696' => 'fas fa-socks',
			'fa-f5ba' => 'fas fa-solar-panel',
			'fa-f0dc' => 'fas fa-sort',
			'fa-f15d' => 'fas fa-sort-alpha-down',
			'fa-f15e' => 'fas fa-sort-alpha-up',
			'fa-f160' => 'fas fa-sort-amount-down',
			'fa-f161' => 'fas fa-sort-amount-up',
			'fa-f0dd' => 'fas fa-sort-down',
			'fa-f162' => 'fas fa-sort-numeric-down',
			'fa-f163' => 'fas fa-sort-numeric-up',
			'fa-f0de' => 'fas fa-sort-up',
			'fa-f1be' => 'fab fa-soundcloud',
			'fa-f7d3' => 'fab fa-sourcetree',
			'fa-f5bb' => 'fas fa-spa',
			'fa-f197' => 'fas fa-space-shuttle',
			'fa-f3f3' => 'fab fa-speakap',
			'fa-f717' => 'fas fa-spider',
			'fa-f110' => 'fas fa-spinner',
			'fa-f5bc' => 'fas fa-splotch',
			'fa-f1bc' => 'fab fa-spotify',
			'fa-f5bd' => 'fas fa-spray-can',
			'fa-f0c8' => 'fas fa-square',
			'fa-f0c8' => 'far fa-square',
			'fa-f45c' => 'fas fa-square-full',
			'fa-f698' => 'fas fa-square-root-alt',
			'fa-f5be' => 'fab fa-squarespace',
			'fa-f18d' => 'fab fa-stack-exchange',
			'fa-f16c' => 'fab fa-stack-overflow',
			'fa-f5bf' => 'fas fa-stamp',
			'fa-f005' => 'fas fa-star',
			'fa-f005' => 'far fa-star',
			'fa-f699' => 'fas fa-star-and-crescent',
			'fa-f089' => 'fas fa-star-half',
			'fa-f089' => 'far fa-star-half',
			'fa-f5c0' => 'fas fa-star-half-alt',
			'fa-f69a' => 'fas fa-star-of-david',
			'fa-f621' => 'fas fa-star-of-life',
			'fa-f3f5' => 'fab fa-staylinked',
			'fa-f1b6' => 'fab fa-steam',
			'fa-f1b7' => 'fab fa-steam-square',
			'fa-f3f6' => 'fab fa-steam-symbol',
			'fa-f048' => 'fas fa-step-backward',
			'fa-f051' => 'fas fa-step-forward',
			'fa-f0f1' => 'fas fa-stethoscope',
			'fa-f3f7' => 'fab fa-sticker-mule',
			'fa-f249' => 'fas fa-sticky-note',
			'fa-f249' => 'far fa-sticky-note',
			'fa-f04d' => 'fas fa-stop',
			'fa-f28d' => 'fas fa-stop-circle',
			'fa-f28d' => 'far fa-stop-circle',
			'fa-f2f2' => 'fas fa-stopwatch',
			'fa-f54e' => 'fas fa-store',
			'fa-f54f' => 'fas fa-store-alt',
			'fa-f428' => 'fab fa-strava',
			'fa-f550' => 'fas fa-stream',
			'fa-f21d' => 'fas fa-street-view',
			'fa-f0cc' => 'fas fa-strikethrough',
			'fa-f429' => 'fab fa-stripe',
			'fa-f42a' => 'fab fa-stripe-s',
			'fa-f551' => 'fas fa-stroopwafel',
			'fa-f3f8' => 'fab fa-studiovinari',
			'fa-f1a4' => 'fab fa-stumbleupon',
			'fa-f1a3' => 'fab fa-stumbleupon-circle',
			'fa-f12c' => 'fas fa-subscript',
			'fa-f239' => 'fas fa-subway',
			'fa-f0f2' => 'fas fa-suitcase',
			'fa-f5c1' => 'fas fa-suitcase-rolling',
			'fa-f185' => 'fas fa-sun',
			'fa-f185' => 'far fa-sun',
			'fa-f2dd' => 'fab fa-superpowers',
			'fa-f12b' => 'fas fa-superscript',
			'fa-f3f9' => 'fab fa-supple',
			'fa-f5c2' => 'fas fa-surprise',
			'fa-f5c2' => 'far fa-surprise',
			'fa-f7d6' => 'fab fa-suse',
			'fa-f5c3' => 'fas fa-swatchbook',
			'fa-f5c4' => 'fas fa-swimmer',
			'fa-f5c5' => 'fas fa-swimming-pool',
			'fa-f69b' => 'fas fa-synagogue',
			'fa-f021' => 'fas fa-sync',
			'fa-f2f1' => 'fas fa-sync-alt',
			'fa-f48e' => 'fas fa-syringe',
			'fa-f0ce' => 'fas fa-table',
			'fa-f45d' => 'fas fa-table-tennis',
			'fa-f10a' => 'fas fa-tablet',
			'fa-f3fa' => 'fas fa-tablet-alt',
			'fa-f490' => 'fas fa-tablets',
			'fa-f3fd' => 'fas fa-tachometer-alt',
			'fa-f02b' => 'fas fa-tag',
			'fa-f02c' => 'fas fa-tags',
			'fa-f4db' => 'fas fa-tape',
			'fa-f0ae' => 'fas fa-tasks',
			'fa-f1ba' => 'fas fa-taxi',
			'fa-f4f9' => 'fab fa-teamspeak',
			'fa-f62e' => 'fas fa-teeth',
			'fa-f62f' => 'fas fa-teeth-open',
			'fa-f2c6' => 'fab fa-telegram',
			'fa-f3fe' => 'fab fa-telegram-plane',
			'fa-f769' => 'fas fa-temperature-high',
			'fa-f76b' => 'fas fa-temperature-low',
			'fa-f1d5' => 'fab fa-tencent-weibo',
			'fa-f7d7' => 'fas fa-tenge',
			'fa-f120' => 'fas fa-terminal',
			'fa-f034' => 'fas fa-text-height',
			'fa-f035' => 'fas fa-text-width',
			'fa-f00a' => 'fas fa-th',
			'fa-f009' => 'fas fa-th-large',
			'fa-f00b' => 'fas fa-th-list',
			'fa-f69d' => 'fab fa-the-red-yeti',
			'fa-f630' => 'fas fa-theater-masks',
			'fa-f5c6' => 'fab fa-themeco',
			'fa-f2b2' => 'fab fa-themeisle',
			'fa-f491' => 'fas fa-thermometer',
			'fa-f2cb' => 'fas fa-thermometer-empty',
			'fa-f2c7' => 'fas fa-thermometer-full',
			'fa-f2c9' => 'fas fa-thermometer-half',
			'fa-f2ca' => 'fas fa-thermometer-quarter',
			'fa-f2c8' => 'fas fa-thermometer-three-quarters',
			'fa-f731' => 'fab fa-think-peaks',
			'fa-f165' => 'fas fa-thumbs-down',
			'fa-f165' => 'far fa-thumbs-down',
			'fa-f164' => 'fas fa-thumbs-up',
			'fa-f164' => 'far fa-thumbs-up',
			'fa-f08d' => 'fas fa-thumbtack',
			'fa-f3ff' => 'fas fa-ticket-alt',
			'fa-f00d' => 'fas fa-times',
			'fa-f057' => 'fas fa-times-circle',
			'fa-f057' => 'far fa-times-circle',
			'fa-f043' => 'fas fa-tint',
			'fa-f5c7' => 'fas fa-tint-slash',
			'fa-f5c8' => 'fas fa-tired',
			'fa-f5c8' => 'far fa-tired',
			'fa-f204' => 'fas fa-toggle-off',
			'fa-f205' => 'fas fa-toggle-on',
			'fa-f7d8' => 'fas fa-toilet',
			'fa-f71e' => 'fas fa-toilet-paper',
			'fa-f552' => 'fas fa-toolbox',
			'fa-f7d9' => 'fas fa-tools',
			'fa-f5c9' => 'fas fa-tooth',
			'fa-f6a0' => 'fas fa-torah',
			'fa-f6a1' => 'fas fa-torii-gate',
			'fa-f722' => 'fas fa-tractor',
			'fa-f513' => 'fab fa-trade-federation',
			'fa-f25c' => 'fas fa-trademark',
			'fa-f637' => 'fas fa-traffic-light',
			'fa-f238' => 'fas fa-train',
			'fa-f7da' => 'fas fa-tram',
			'fa-f224' => 'fas fa-transgender',
			'fa-f225' => 'fas fa-transgender-alt',
			'fa-f1f8' => 'fas fa-trash',
			'fa-f2ed' => 'fas fa-trash-alt',
			'fa-f2ed' => 'far fa-trash-alt',
			'fa-f829' => 'fas fa-trash-restore',
			'fa-f82a' => 'fas fa-trash-restore-alt',
			'fa-f1bb' => 'fas fa-tree',
			'fa-f181' => 'fab fa-trello',
			'fa-f262' => 'fab fa-tripadvisor',
			'fa-f091' => 'fas fa-trophy',
			'fa-f0d1' => 'fas fa-truck',
			'fa-f4de' => 'fas fa-truck-loading',
			'fa-f63b' => 'fas fa-truck-monster',
			'fa-f4df' => 'fas fa-truck-moving',
			'fa-f63c' => 'fas fa-truck-pickup',
			'fa-f553' => 'fas fa-tshirt',
			'fa-f1e4' => 'fas fa-tty',
			'fa-f173' => 'fab fa-tumblr',
			'fa-f174' => 'fab fa-tumblr-square',
			'fa-f26c' => 'fas fa-tv',
			'fa-f1e8' => 'fab fa-twitch',
			'fa-f099' => 'fab fa-twitter',
			'fa-f081' => 'fab fa-twitter-square',
			'fa-f42b' => 'fab fa-typo3',
			'fa-f402' => 'fab fa-uber',
			'fa-f7df' => 'fab fa-ubuntu',
			'fa-f403' => 'fab fa-uikit',
			'fa-f0e9' => 'fas fa-umbrella',
			'fa-f5ca' => 'fas fa-umbrella-beach',
			'fa-f0cd' => 'fas fa-underline',
			'fa-f0e2' => 'fas fa-undo',
			'fa-f2ea' => 'fas fa-undo-alt',
			'fa-f404' => 'fab fa-uniregistry',
			'fa-f29a' => 'fas fa-universal-access',
			'fa-f19c' => 'fas fa-university',
			'fa-f127' => 'fas fa-unlink',
			'fa-f09c' => 'fas fa-unlock',
			'fa-f13e' => 'fas fa-unlock-alt',
			'fa-f405' => 'fab fa-untappd',
			'fa-f093' => 'fas fa-upload',
			'fa-f7e0' => 'fab fa-ups',
			'fa-f287' => 'fab fa-usb',
			'fa-f007' => 'fas fa-user',
			'fa-f007' => 'far fa-user',
			'fa-f406' => 'fas fa-user-alt',
			'fa-f4fa' => 'fas fa-user-alt-slash',
			'fa-f4fb' => 'fas fa-user-astronaut',
			'fa-f4fc' => 'fas fa-user-check',
			'fa-f2bd' => 'fas fa-user-circle',
			'fa-f2bd' => 'far fa-user-circle',
			'fa-f4fd' => 'fas fa-user-clock',
			'fa-f4fe' => 'fas fa-user-cog',
			'fa-f4ff' => 'fas fa-user-edit',
			'fa-f500' => 'fas fa-user-friends',
			'fa-f501' => 'fas fa-user-graduate',
			'fa-f728' => 'fas fa-user-injured',
			'fa-f502' => 'fas fa-user-lock',
			'fa-f0f0' => 'fas fa-user-md',
			'fa-f503' => 'fas fa-user-minus',
			'fa-f504' => 'fas fa-user-ninja',
			'fa-f82f' => 'fas fa-user-nurse',
			'fa-f234' => 'fas fa-user-plus',
			'fa-f21b' => 'fas fa-user-secret',
			'fa-f505' => 'fas fa-user-shield',
			'fa-f506' => 'fas fa-user-slash',
			'fa-f507' => 'fas fa-user-tag',
			'fa-f508' => 'fas fa-user-tie',
			'fa-f235' => 'fas fa-user-times',
			'fa-f0c0' => 'fas fa-users',
			'fa-f509' => 'fas fa-users-cog',
			'fa-f7e1' => 'fab fa-usps',
			'fa-f407' => 'fab fa-ussunnah',
			'fa-f2e5' => 'fas fa-utensil-spoon',
			'fa-f2e7' => 'fas fa-utensils',
			'fa-f408' => 'fab fa-vaadin',
			'fa-f5cb' => 'fas fa-vector-square',
			'fa-f221' => 'fas fa-venus',
			'fa-f226' => 'fas fa-venus-double',
			'fa-f228' => 'fas fa-venus-mars',
			'fa-f237' => 'fab fa-viacoin',
			'fa-f2a9' => 'fab fa-viadeo',
			'fa-f2aa' => 'fab fa-viadeo-square',
			'fa-f492' => 'fas fa-vial',
			'fa-f493' => 'fas fa-vials',
			'fa-f409' => 'fab fa-viber',
			'fa-f03d' => 'fas fa-video',
			'fa-f4e2' => 'fas fa-video-slash',
			'fa-f6a7' => 'fas fa-vihara',
			'fa-f40a' => 'fab fa-vimeo',
			'fa-f194' => 'fab fa-vimeo-square',
			'fa-f27d' => 'fab fa-vimeo-v',
			'fa-f1ca' => 'fab fa-vine',
			'fa-f189' => 'fab fa-vk',
			'fa-f40b' => 'fab fa-vnv',
			'fa-f45f' => 'fas fa-volleyball-ball',
			'fa-f027' => 'fas fa-volume-down',
			'fa-f6a9' => 'fas fa-volume-mute',
			'fa-f026' => 'fas fa-volume-off',
			'fa-f028' => 'fas fa-volume-up',
			'fa-f772' => 'fas fa-vote-yea',
			'fa-f729' => 'fas fa-vr-cardboard',
			'fa-f41f' => 'fab fa-vuejs',
			'fa-f554' => 'fas fa-walking',
			'fa-f555' => 'fas fa-wallet',
			'fa-f494' => 'fas fa-warehouse',
			'fa-f773' => 'fas fa-water',
			'fa-f5cc' => 'fab fa-weebly',
			'fa-f18a' => 'fab fa-weibo',
			'fa-f496' => 'fas fa-weight',
			'fa-f5cd' => 'fas fa-weight-hanging',
			'fa-f1d7' => 'fab fa-weixin',
			'fa-f232' => 'fab fa-whatsapp',
			'fa-f40c' => 'fab fa-whatsapp-square',
			'fa-f193' => 'fas fa-wheelchair',
			'fa-f40d' => 'fab fa-whmcs',
			'fa-f1eb' => 'fas fa-wifi',
			'fa-f266' => 'fab fa-wikipedia-w',
			'fa-f72e' => 'fas fa-wind',
			'fa-f410' => 'fas fa-window-close',
			'fa-f410' => 'far fa-window-close',
			'fa-f2d0' => 'fas fa-window-maximize',
			'fa-f2d0' => 'far fa-window-maximize',
			'fa-f2d1' => 'fas fa-window-minimize',
			'fa-f2d1' => 'far fa-window-minimize',
			'fa-f2d2' => 'fas fa-window-restore',
			'fa-f2d2' => 'far fa-window-restore',
			'fa-f17a' => 'fab fa-windows',
			'fa-f72f' => 'fas fa-wine-bottle',
			'fa-f4e3' => 'fas fa-wine-glass',
			'fa-f5ce' => 'fas fa-wine-glass-alt',
			'fa-f5cf' => 'fab fa-wix',
			'fa-f730' => 'fab fa-wizards-of-the-coast',
			'fa-f514' => 'fab fa-wolf-pack-battalion',
			'fa-f159' => 'fas fa-won-sign',
			'fa-f19a' => 'fab fa-wordpress',
			'fa-f411' => 'fab fa-wordpress-simple',
			'fa-f297' => 'fab fa-wpbeginner',
			'fa-f2de' => 'fab fa-wpexplorer',
			'fa-f298' => 'fab fa-wpforms',
			'fa-f3e4' => 'fab fa-wpressr',
			'fa-f0ad' => 'fas fa-wrench',
			'fa-f497' => 'fas fa-x-ray',
			'fa-f412' => 'fab fa-xbox',
			'fa-f168' => 'fab fa-xing',
			'fa-f169' => 'fab fa-xing-square',
			'fa-f23b' => 'fab fa-y-combinator',
			'fa-f19e' => 'fab fa-yahoo',
			'fa-f413' => 'fab fa-yandex',
			'fa-f414' => 'fab fa-yandex-international',
			'fa-f7e3' => 'fab fa-yarn',
			'fa-f1e9' => 'fab fa-yelp',
			'fa-f157' => 'fas fa-yen-sign',
			'fa-f6ad' => 'fas fa-yin-yang',
			'fa-f2b1' => 'fab fa-yoast',
			'fa-f167' => 'fab fa-youtube',
			'fa-f431' => 'fab fa-youtube-square',
			'fa-f63f' => 'fab fa-zhihu'
		);

		$icons = apply_filters( "megamenu_fontawesome_5_icons", $icons );

		return $icons;

	}

	/*public function fa_icons () {
	    $content = file_get_contents('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.json');
	    $json = json_decode($content);
	    $icons = [];

	    foreach ($json as $icon => $value) {
	        foreach ($value->styles as $style) {
	        	$unicode = $value->unicode;
	        	$style = "fa" . substr($style, 0 ,1);
	            echo "'fa-{$unicode}' => '{$style} fa-{$icon}'," . "<br />";
	        }
	    }
	}*/
}

endif;