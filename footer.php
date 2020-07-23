<!-- BEGIN FOOTER -->
<footer>
    <div class="wrapper">
        <div class="widgets">
            <div class="widget copyright">
                <?php
                if (is_active_sidebar('footer_widget_left')) {
                    dynamic_sidebar('footer_widget_left');
                }
                ?>
            </div>
            <div class="widget author">
                <?php
                if (is_active_sidebar('footer_widget_right')) {
                    dynamic_sidebar('footer_widget_right');
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER EOF   -->