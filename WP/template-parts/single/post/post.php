<?php
if (have_posts()) {
    while (have_posts()):
        the_post();
        ?>
        <!-- Single Blog Start -->
        <div class="container-fluid blog pl-custom pt-50">
            <div class="container">
                <div class="row g-3">
                    <nav class="col-12 breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Page Title</li> -->
                            <?php custom_breadcrumbs(); ?>
                        </ol>
                    </nav>
                    <section class="col-12 <?php if (is_active_sidebar('post-single-sidebar')) :?>col-lg-8 order-1 order-lg-0<?php endif; ?> mb-3">
                        <article class="blog-content">
                            <span class="tag">
                            <?php
                            foreach((get_the_category($post_id)) as $category) { 
                                ?>
                                <a href="<?php echo get_term_link($category->term_id); ?>" class="">
                                <?php echo $category->cat_name . ' '; 
                                ?>
                                </a>
                                <?php
                            } 
                            ?>
                            </span>
                            <h1><?php the_title() ?></h1>
                            <?php if(has_post_thumbnail()){ ?>
                                <img src="<?php echo myp_get_post_thumbnail_url(); ?>"
                                     alt="<?php the_title(); ?>"
                                     class="img-fluid">
                            <?php } ?>
                            <?php the_content(); ?>
                        </article>
                    </section>
                    <?php if (is_active_sidebar('post-single-sidebar')) {
                        dynamic_sidebar('post-single-sidebar');
                    } ?>
                </div>
            </div>
        </div>
        <!-- Single Blog End -->
        <?php
	endwhile;
}
?>