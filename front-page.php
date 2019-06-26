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

    <div class="testimonials">
        <?php
            $args = array(
                'post_type' => 'testimonials',
                'posts_per_page' => 3
            );

            $query = new WP_Query( $args );

            if ($query->have_posts()) :
                echo '<div class="owl-carousel">';
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="item">
                        <h2 class="testimonial__title"><?php the_title(); ?></h2>
                        <div class="testimonial__content"><?php the_content(); ?></div>
                        <p class="testimonial__author">
                            <span class="author__name"><?php the_field('author'); ?></span>
                            <?php if ( get_field('job_title') ) : ?>
                                -
                                <span class="author__job"><?php the_field('job_title'); ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endwhile;
                echo '</div>';
            endif;
        ?>
    </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
