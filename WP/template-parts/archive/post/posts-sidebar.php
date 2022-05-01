<!-- Blog Start -->
<section class="container-fluid blog pl-custom mb-70 pt-170 " id="blog">
    <div class="container">
        <div class="row position-relative">
            <span class="bg-text-custom-4">Blog.</span>
            <div class="col-12">
                <!-- <h2 class="section-title">My Blog</h2> -->
                <!-- <p class="section-desc">blog posts</p> -->
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