<div class="container-fluid pl-custom pt-2 mb-5 err-404">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-lg-5 d-flex justify-content-center flex-column">
                    <p class="section-title"><?php _e('Page Not Found','bp-b') ?></p>
                    <!-- <p class="desc-title">Search here :</p> -->
                    <form class="custom-search d-flex flex-column search-404" action="<?php echo home_url(); ?>" method="get">
                            <div class="input-group">
                                <input required name="s" aria-label="Search" type="text" class="form-control px-3" placeholder="<?php _e('Search...','bp-b'); ?>">
                                <button type="submit" class="btn custom-btn"><?php _e('Search','bp-b'); ?></button>
                            </div>
                    </form>
                </div>
                <div class="col-12 col-lg-6 p-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png" alt="404" class="img-fluid">
                    <a href="https://storyset.com/web" class="ad">Web illustrations by Storyset</a>
                </div>
            </div>
        </div>
</div>