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
        <div class="row g-4 position-relative">
            <span class="bg-text-custom-5">My Works.</span>
            <div class="col-9 col-lg-10">
                <h2 class="section-title">
                    <?php
                        the_archive_title();
                    ?>
                </h2>
            </div>
            <?php if ($query_projects->have_posts()): ?>
            <?php
            while ($query_projects->have_posts()):
                $query_projects->the_post();
                $cat = get_the_terms(get_the_ID(), 'project_categories');
                ?>
            <div class="col-12 col-lg-4">
                <div class="card project-card ">
                    <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                    <div class="card-body">
                        <div>
                            <span>
                                <?php
                                foreach($cat as $category) { 
                                    echo $category->name . ' '; 
                                } 
                                ?>
                            </span>
                            <h5><?php the_title(); ?></h5>
                            <a href="<?php the_permalink(); ?>" class="stretched-link">Read More</a>
                        </div>
                    </div>
                    <!-- <?php if(has_post_thumbnail()){ ?> -->
                                <img src="<?php echo myp_get_post_thumbnail_url(); ?>"
                                     alt="<?php the_title(); ?>"
                                     class="card-img-bottom">
                    <?php } ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php
                wp_reset_query();
            endif;
            ?>
            <div class="d-flex flex-row justify-content-center align-items-center mt-5 navigation-bpf">
                <?php
                $argss = [
                    'prev_text'    => is_rtl() ? '<i class="uil uil-angle-right-b"></i>' : '<i class="uil uil-angle-left-b"></i>',
                    'next_text'    => is_rtl() ? '<i class="uil uil-angle-left-b"></i>' : '<i class="uil uil-angle-right-b"></i>',
                ];
                echo get_the_posts_pagination( $argss );
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio End -->