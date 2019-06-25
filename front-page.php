<?php
/**
 * This template is resposible for display home page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package locummeds-child
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // End of the loop. ?>

    <div class="testimonails">
        this is a placeholder for testimonials array
        <?php
            $args = array(
                'post_type' => 'testimonials',
                'posts_per_page' => -1
            );

            $query = new WP_Query( $args );

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="owl-carousel"><?php the_content(); ?></div>
                <?php endwhile;
            endif;
        ?>
    </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
