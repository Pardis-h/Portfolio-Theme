<!-- Blog Start -->
<section class="container-fluid blog pl-custom mb-70 " id="blog">
    <div class="container">
        <div class="row position-relative">
            <span class="bg-text-custom-4 position-static">Blog.</span>
            <main class="row ">
                <div class="col-12 <?php if (is_active_sidebar('posts-archive-sidebar')) :?>col-lg-8 order-1 order-lg-0<?php endif; ?>">
                    <div class="row g-3">
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