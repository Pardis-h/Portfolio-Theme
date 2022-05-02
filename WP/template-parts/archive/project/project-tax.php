<?php
$categories = get_terms(['taxonomy' => 'project_categories', 'hide_empty' => true]);
$current_category = array_key_exists('project_cat', $_GET) ? $_GET['project_cat'] : null;
$args = ['post_type' => 'project'];
if ($current_category) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'project_categories',
            'field' => 'term_id',
            'terms' => $current_category
        ],
    ];
}
$query_projects = new WP_Query($args);
?>

<!-- Portfolio Start -->
<section class="container-fluid portfolio pl-custom mb-70 pt-50" id="portfolio">
    <div class="container">
        <div class="row position-relative">
            <span class="bg-text-custom-5">My Works.</span>
            <div class="col-9 col-lg-10">
                <h2 class="section-title mb-5"> 
                   <?php
                        the_archive_title();
                    ?>
                </h2>
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