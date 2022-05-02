<?php

$args = [
    'post_type' => 'project',
    'post_status' => 'publish',
    'numberposts' => 3,
    'post_per_page' => 3,
    'order' => 'DESC',
    // 'suppress_filters' => false,
    'orderby' => 'date',
];

$query_projects = get_posts($args);
if ( $query_projects  ) {
    foreach ( $query_projects as $data ):
    $post_id = $data->ID;
                $cat = get_the_terms($data->ID, 'project_categories');
                ?>
            <div class="col-12 col-md-4">
                <div class="card project-card ">
                    <div class="card-body">
                        <div>
                            <span>
                                <?php
                                foreach($cat as $category) { 
                                    echo $category->name . ' '; 
                                } 
                                ?>
                            </span>
                            <h5><?php echo get_the_title($post_id); ?></h5>
                            <a href="<?php the_permalink($post_id); ?>" class="stretched-link">Read More</a>
                        </div>
                    </div>
                    <?php if(has_post_thumbnail($post_id)){ ?> 
                                <img src="<?php echo myp_get_post_thumbnail_url($post_id); ?>"
                                     alt="<?php echo get_the_title($post_id); ?>"
                                     class="card-img-bottom">
                    <?php } ?>
                </div>
            </div>
            <?php endforeach;} ?>