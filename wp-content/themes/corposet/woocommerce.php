<?php
get_header();
get_template_part('template-parts/site', 'breadcrumb');
?>
<div class="clearfix"></div>

<main id="content" class="content">
    <div class="container">
        <div class="row">	
            <!--Content-->
            <div class="col-md-<?php echo (!is_active_sidebar('woocommerce') ? '12' : '8' ); ?> col-sm-<?php echo (!is_active_sidebar('woocommerce') ? '12' : '7' ); ?> col-xs-12">
                <?php woocommerce_content(); ?>
            </div>	
            <!--/Sidebar-->
            <?php get_sidebar('woocommerce'); ?>
        </div>
    </div>
</main>
<!-- #main -->

<?php get_footer(); ?>