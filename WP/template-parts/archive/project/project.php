

<!-- Portfolio Start -->
<section class="container-fluid portfolio pl-custom mb-70 pt-50" id="portfolio">
    <div class="container">
        <div class="row position-relative">
            <span class="bg-text-custom-5">My Works.</span>
            <div class="col-9 col-lg-10">
                <h2 class="section-title">My Portfolio</h2>
                <p class="section-desc">A small gallery of my recent project</p>
            </div>
            <div class="col-12 <?php if (is_active_sidebar('projects-archive-sidebar')) :?>col-lg-8 <?php endif; ?>">
                    <div class="row g-4">
                        <?php echo get_template_part('template-parts/archive/project/project-loop'); ?>
                    </div>
                </div>
                <?php if (is_active_sidebar('projects-archive-sidebar')) {
                    dynamic_sidebar('projects-archive-sidebar');
                } ?>
        </div>
    </div>
</section>
<!-- Portfolio End -->