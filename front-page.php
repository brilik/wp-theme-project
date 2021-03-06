<?php the_view('start-page'); ?>
    <!-- BEGIN CONTENT -->
<?php if (have_posts()) : ?>
    <main class="content">
        <?php while (have_posts()) : the_post();
            the_view('section__first');
            if(function_exists('number_info')) {
                number_info();
            }
            the_view('section__second');
        endwhile; ?>
    </main>
<?php endif; ?>
    <!-- CONTENT EOF   -->
<?php get_header(); ?>
<?php get_footer(); ?>
<?php the_view('end-page'); ?>