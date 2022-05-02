<?php if (have_posts()): ?>
            <?php
            while (have_posts()):
                the_post();
                $cat = get_the_terms(get_the_ID(), 'project_categories');
                ?>
            <div class="col-12 <?php if (is_active_sidebar('projects-archive-sidebar')) :?>col-md-6 <?php endif; ?> <?php if (!(is_active_sidebar('projects-archive-sidebar'))) :?>col-lg-4 <?php endif; ?>">
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
                            <h5><?php the_title(); ?></h5>
                            <a href="<?php the_permalink(); ?>" class="stretched-link">Read More</a>
                        </div>
                    </div>
                    <?php if(has_post_thumbnail()){ ?> 
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
            <div class="d-flex flex-row justify-content-center align-items-center mt-5 navigation">
                <?php
                $argss = [
                    'prev_text'    => is_rtl() ? '<i class="uil uil-angle-right-b"></i>' : '<i class="uil uil-angle-left-b"></i>',
                    'next_text'    => is_rtl() ? '<i class="uil uil-angle-left-b"></i>' : '<i class="uil uil-angle-right-b"></i>',
                ];
                echo get_the_posts_pagination( $argss );
                ?>
            </div>