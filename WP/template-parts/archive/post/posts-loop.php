<?php //#option-panel : column size control ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()) {
        the_post();
        // $categories = get_the_terms( $post->ID, 'taxonomy' );

    ?>
        <article class="col-12 col-lg-6">
            <div class="card blog-card text-white bg-dark">
                <div class="card-body">
                    <span>
                    <?php
                    foreach((get_the_category()) as $category) { 
                        echo $category->cat_name . ' '; 
                    } 
                    ?>
                    </span>
                    <h5><?php the_title(); ?></h5>
                    <p>
                    <?php echo substr( get_the_excerpt(), 0, 180 ); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                </div>
            </div>
        </article>  
<?php } ?>
<?php endif; ?>
<div class="d-flex flex-row justify-content-center align-items-center mt-5 navigation">
    <?php
    $args = [
        'prev_text'    => is_rtl() ? '<i class="uil uil-angle-right-b"></i>' : '<i class="uil uil-angle-left-b"></i>',
        'next_text'    => is_rtl() ? '<i class="uil uil-angle-left-b"></i>' : '<i class="uil uil-angle-right-b"></i>',
    ];
    echo get_the_posts_pagination( $args );
    ?>
</div>