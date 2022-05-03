<?php

//medadata
$demo_link = myp_get_acf_field('demo_link');

//terms
$cat = get_the_terms(get_the_ID(), 'project_categories');
$cat_url = get_term_link($cat[0]->term_id);
?>
    <!-- single portfolio Start -->
    <div class="container-fluid pl-custom pt-50 mb-70">
        <div class="container">
            <div class="row g-3">
                <nav class="col-12 breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item"><a href="portfolio.html">Portfolio</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Page Title</li> -->
                      <?php custom_breadcrumbs(); ?>
                    </ol>
                </nav>
                <div class="col-12 col-lg-5 project-content">
                    <span class="tag">
                        <?php
                            foreach($cat as $category) { 
                                ?>
                                <a href="<?php echo $cat_url; ?>" class="">
                                <?php echo $category->name . ' '; 
                                ?>
                                </a>
                                <?php
                            } 
                        ?>
                    </span>
                    <h1><?php the_title() ?></h1>
                    <?php the_content(); ?>
                    <a href="<?php echo $demo_link; ?>" class="custom-btn">View Demo</a>
                </div>
                <div class="col-12 col-lg-7">
                <?php if(has_post_thumbnail()){ ?>
                                <img src="<?php echo myp_get_post_thumbnail_url(); ?>"
                                     alt="<?php the_title(); ?>"
                                     class="img-fluid">
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- single portfolio End  -->