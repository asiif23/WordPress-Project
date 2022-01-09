<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corposet
 */

?>

<!--footer-->
<footer>
    <div class="inner">
    <?php if (is_active_sidebar('footer_widget_area')) { ?>
                   
               
        <div class="top">
            <div class="container">
            <div class="row">
                <?php dynamic_sidebar('footer_widget_area'); ?>
                
            </div>
        </div>
        </div>
        <?php } elseif (current_user_can('edit_theme_options') && is_user_logged_in()) { ?>
            <p class="no-widgets-footer">
            <a data-customizer-event="corposet-footer-sidebar-event" id="corposet-footer-widget-to-add" class="m-auto" href='<?php echo esc_url(admin_url('widgets.php')); ?>'><i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                                <?php esc_html_e('Click to assign widgets here.', 'corposet'); ?>
            </a></p>
        <?php } 
        
            /**
             * Footer Bar
             */
            if(get_theme_mod('copyright_display', 1)  
        || 
        get_theme_mod('footer_socialicons_display', 1)
        ){
        ?>
        <div class="bottom">
            <div class="container">
            <div class="row align-items-center">
            <div class="col-md-6 copyright-text">
              <!--2021 © All rights reserved by Copyright-->
              <?php $corposet_defaultCopyRight = get_theme_mod('copyright_text', __('Copyright &copy; 2021 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Corposet theme by <a target="_blank" href="//unibirdtech.com/">unibird Tech</a>', 'corposet'));
				  echo wp_kses_post($corposet_defaultCopyRight); ?>
            </div>
            <div class="col-md-6">
            <?php
            if((bool)get_theme_mod('footer_socialicons_display', 1) ) {
                do_action('corposet_social_icons' , 'social right');
            }
            ?>
            </div>
            </div>
            </div>
        </div>
		<?php
		}

        ?>
    </div>
</footer>
</div><!-- #page -->


<!-- --------------------modal-section-------------->

<div class="modal fade show" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <?php
					get_search_form();
					?>
      </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>

<?php
wp_footer();
?>
</body>
<?php if((bool) get_theme_mod('scrollbar_display', true)){
?>
<a href="#" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<?php } ?>
</html>