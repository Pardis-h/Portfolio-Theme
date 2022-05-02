
<?php
            
$post_args       = [
    'post_type'   => 'post',
    'post_status' => 'publish',
    'numberposts' => 3,
    'order' => 'DESC',
    // 'suppress_filters' => false,
    'orderby' => 'date',
];
$query_data = get_posts( $post_args );
    
if ( $query_data  ) {
    foreach ( $query_data as $data ):
    $post_id = $data->ID;

    ?>
        <article class="col-12 col-lg-4 mb-3">
            <div class="card blog-card text-white bg-dark">
                <div class="card-body">
                    <span>
                    <?php
                    foreach((get_the_category($post_id)) as $category) { 
                        echo $category->cat_name . ' '; 
                    } 
                    ?>
                    </span>
                    <h5><?php echo get_the_title($post_id); ?></h5>
                    <p>
                    <?php echo substr( get_the_excerpt($post_id), 0, 180 ); ?>
                    </p>
                    <a href="<?php the_permalink($post_id); ?>" class="stretched-link"></a>
                </div>
            </div>
        </article>  
<?php endforeach;} ?>
