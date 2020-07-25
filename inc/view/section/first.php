<section class="first-section">
    <div class="first-section__bg">
        <img src="<?= get_template_directory_uri() ?>/assets/img/background.jpg" alt="background">
    </div>
    <div class="wrapper">
        <div class="first-section__content">
            <?php
            the_title('<h1>', '</h1>');
            the_content();
            ?>
        </div>
    </div>
</section>