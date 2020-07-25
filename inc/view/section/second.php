<?php
$posts = new WP_Query((array(
    'numberposts' => 3,
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'ASC',
    'post_type'   => 'projects'
)));
$secondSectionTitle = get_post_meta(get_the_ID(), 'title_second_section',true);
?>
<section class="second-section">
    <div class="second-section__content">
        <?php
        if ($secondSectionTitle) {
            echo '<h2>';
            esc_html_e($secondSectionTitle, TXTDOMAIN);
            echo '</h2>';
        }
        ?>
        <div class="wrapper">
            <div class="second-section__posts">
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <article class="posts">
                            <?php the_post_thumbnail('380') ?>
                            <div class="posts-line"></div>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </article>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>