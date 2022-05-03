<?php 
/*
 * Template name: About Me
 */

get_header(); ?>

     <!-- Hi Start -->
     <div class="container-fluid pl-custom pt-50 mb-0 mb-lg-5">
        <div class="container">
            <div class="row me">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div>
                        <h4><?php echo myp_get_option('About-text_1'); ?></h4>
                        <h1>
                            <p><?php echo myp_get_option('About-name'); ?></p>
                            <p><?php echo myp_get_option('About-lastname'); ?></p>
                        </h1>
                        <h3><?php echo myp_get_option('About-jobtitle'); ?></h3>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/me.jpg" alt="pardis-haghdoust" class="img-fluid">
                </div>
                <div class="col-12 text-center">
                    <p class="scroll-down-text">scroll down</p>
                    <a href="#down" class="scroll-down"><i class="uil uil-angle-double-down"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hi End -->

    <!-- About me Start -->
    <section class="container-fluid about-me pl-custom pt-70 mb-70" id="down">
        <div class="container">
            <div class="row position-relative">
                <span class="bg-text-custom-3 position-static"><?php echo myp_get_option('About-bg-text'); ?></span>
                <div class="col-12 col-lg-7 d-flex flex-column justify-content-center align-items-start">
                    <h2 class="section-title-2"><?php echo myp_get_option('About-text_2'); ?></h2>
                    <p class="section-desc">
                        <?php echo myp_get_option('About-skill-desc'); ?>
                    </p>
                    <p class="visit">Visit my <a href="<?php echo myp_get_option('linkedin-url'); ?>">LinkedIn </a>profile for more details or just <a href="<?php echo home_url();  ?>#contact-me">contact </a>me.</p>
                </div>
              <?php  $i=-1;?>
                <ul class="col-12 col-lg-5 skills-bar">
                    <?php foreach(myp_get_option('About-skill-li-text') as $list): $i++;?>
                    <li>
                        <p><?php echo myp_get_option('About-skill-li-text')[$i]; ?></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo myp_get_option('About-skill-li-per')[$i]; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </section>
    <!-- About me End -->

    <!-- WORK EXPERIENCE Start -->
    <div class="container-fluid pl-custom pt-70" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">WORK EXPERIENCE</h2>
                </div>
                <ul class="col-12 job-experience">
                    <?php $j=-1; foreach(myp_get_option('About-job-li-text') as $list): $j++;?>

                    <li>
                        <div class="company-name"> 
                            <p><?php echo myp_get_option('About-job-li-text')[$j]; ?></p>
                            <p><?php echo myp_get_option('About-job-li-loc')[$j]; ?></p>
                            <span><?php echo myp_get_option('About-job-li-date')[$j]; ?></span>
                        </div>
                        <div class="job-details">
                            <p><?php echo myp_get_option('About-job-li-title')[$j]; ?></p>
                            <ul>
                                <li><?php echo myp_get_option('About-job-li-desc')[$j]; ?></li>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- WORK EXPERIENCE End -->

    <!-- Eduction Start -->
    <div class="container-fluid pl-custom pt-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">EDUCATION</h2>
                </div>
                <ul class="col-12 eduction">
                    <?php $k=-1; foreach(myp_get_option('About-edc-li-uni') as $list): $k++;?>
                    <li>
                        <div>
                            <p>
                                <?php echo myp_get_option('About-edc-li-uni')[$k]; ?>
                            </p>
                            <span>
                                <?php echo myp_get_option('About-edc-li-date')[$k]; ?>
                            </span>
                        </div>
                        <p>
                            <?php echo myp_get_option('About-edc-li-degree')[$k]; ?>
                        </p>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Eduction End -->

    <!-- Contact Info Start -->
    <div class="container-fluid pl-custom pt-70 mb-70">
        <div class="container">
            <div class="row g-3 contact-info ">
                <div class="col-12 col-lg-6">
                    <h2 class="section-title">Contact Info</h2>
                    <ul class="contact-list">
                        <li>
                            <i class="uil uil-location-point"></i> <?php echo myp_get_option('About-contact-location'); ?>
                        </li>
                        <li><i class="uil uil-envelope-alt"></i><?php echo myp_get_option('About-contact-mail'); ?></li>
                        <li><i class="uil uil-phone-alt"></i><?php echo myp_get_option('About-contact-phone'); ?></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="section-title">Socila Media</h2>
                    <ul class="social3">
                        <li>
                            <a href="<?php echo myp_get_option('linkedin-url'); ?>"><i class="uil uil-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo myp_get_option('github-url'); ?>"><i class="uil uil-github"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo myp_get_option('intagram-url'); ?>"><i class="uil uil-instagram"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo myp_get_option('twitter-url'); ?>"><i class="uil uil-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

<?php get_footer();