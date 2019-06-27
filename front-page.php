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
            <?php //the_content(); ?>
        <?php endwhile; // End of the loop. ?>
        <div class="services">
            <div class="row">
                <div class="row__medium-4">
                    <div class="service">
                        <h2 class="service__title">Jobs</h2>
                        <p class="service__subtitle">We provide the right job, at the right time and in the right place, when you need them most</p>
                        <p class="service__description">Our jobs cover the whole of the UK, ensuring that wherever you are based, you’ll never be far from work. Our experienced and dedicated consultants use our extensive connections across practices and surgeries to ensure the best rates for our candidates.</p>
                    </div>
                </div>
                <div class="row__medium-4">
                    <div class="service">
                        <h2 class="service__title">Clients</h2>
                        <p class="service__subtitle">Locum Meds is a specialist in providing experienced, qualified staff for the primary care industry.</p>
                        <p class="service__description">By adhering to strict compliance criteria, we guarantee our clients the most qualified and experienced staff on the market. Working for you is our priority, so our consultants are constantly on call, building new relationships and sourcing you the best candidates.</p>
                    </div>
                </div>
                <div class="row__medium-4">
                    <div class="service">
                        <h2 class="service__title">Submit Your CV</h2>
                        <p class="service__subtitle">we find the latest jobs that are tailored to you we will send you the details direct.</p>
                        <p class="service__description">We have helped thousands find their ideal role at the best rates in the market. Send us your CV today and see how we can help you. One of our consultants will be in contact within 24 hours to tailor your job search around your circumstances.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about">
            <h2 class="about__title">Welcome to Locum Meds</h2>
            <p>Locum Meds is a specialist in providing experienced, qualified staff for the primary care industry. With a combined 120+ years of experience within the employment industry our dedicated and diverse team have one common goal; finding that perfect match between client and candidate. With backgrounds in medical and healthcare recruitment; from independent surgeries to large NHS hospitals, our broad understanding of the industry has been laser-focused to specialise within primary care. Over the last 7 years Locum Meds is a regionally renowned recruitment agency offering first-rate service to clients and candidates alike. We connect specialist talent with industry-leading employers, catering to all primary care and healthcare disciplines. Honesty and integrity are two words that form the ethos of Locum Meds, which is why we are able to build such long lasting working relationships with clients and candidates, who both see us as their first port of call.</p>
        </div>
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
