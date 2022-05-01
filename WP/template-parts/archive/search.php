<?php
//#option-panel : Sidebar
//#option-panel : column size
global $wp_query;

?>

<!-- Blog Start -->
<section class="container-fluid blog pl-custom mb-70 pt-5 " id="blog">
    <div class="container">
        <div class="row position-relative">
            <div class="col-12">
                <h2 class="section-title">
                    <?php _e('Search Results For', 'pas_mph'); ?>
                    <span class="primary-it d-inline-block ms-3"><?php echo $_GET['s'] ?></span>
                </h2>
                <p class="section-desc"><?php echo $wp_query->found_posts; ?> <?php _e('Result(s) found', 'pas_mph'); ?></p>
            </div>
            <main class="row ">
                <div class="col-12 <?php if (is_active_sidebar('posts-archive-sidebar')) :?>col-lg-8 <?php endif; ?>">
                    <div class="row">
                        <?php echo get_template_part('template-parts/archive/post/posts-loop'); ?>
                    </div>
                </div>
                <?php if (is_active_sidebar('posts-archive-sidebar')) {
                    dynamic_sidebar('posts-archive-sidebar');
                } ?>
            </main>
        </div>
    </div>
</section>
<!-- Blog End -->