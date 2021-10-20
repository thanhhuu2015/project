<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package WP_Bootstrap_4
 */
?>

</div><!-- #content -->

<footer id="footer" class="footer_area">
    <?php get_template_part('/footer-parts/footer-main'); ?>
    <?php get_template_part('/footer-parts/copyright'); ?>
</footer><!-- #colophon -->

</main><!-- #page -->
<?php wp_footer(); ?>

<script type="text/javascript">;</script>

<!-- Load Facebook SDK for JavaScript -->

<div id="fb-root"></div>

<?php
$v_fanpage_id = get_field('fanpage_id', 'option');
if ($v_fanpage_id):
    ?>
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="<?php echo $v_fanpage_id; ?>"
         theme_color="#0A7CFF">
    </div>

    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v9.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

<?php endif; ?>

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Back To Top -->
<a href="#" class="cd-top cd-is-visible"><i class="fas fa-angle-up"></i></a>

<!--fix menu-->
<?php get_template_part('template-parts/fix-right-menu', '', array('choose_style' => 3)); ?>

</body>
</html>