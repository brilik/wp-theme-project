<?php
$posts = new WP_Query((array(
    'numberposts' => 3,
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'ASC',
    'post_type'   => 'projects'
))); ?>
<section class="second-section">
    <div class="second-section__content">
        <h2>Наши самые большие проекты</h2>
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