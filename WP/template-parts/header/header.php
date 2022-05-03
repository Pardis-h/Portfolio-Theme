<!-- Header Start -->
<header class="container nav-header">
    <span id="darkBtn"></span>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid nav-wrapper">
            <a href="<?php echo home_url(); ?>" class="navbar-brand">
                <span>P </span> <span>H</span>
                <p>Pardis Haghdoust</p>
                <p>Web Developer</p>
            </a>
            <button class="navbar-toggler" id="burger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar "></span>
                <span class="icon-bar "></span>
                <span class="icon-bar "></span>
            </button>
            <div class="collapse  navbar-collapse justify-content-between" id="navbarText">
                <?php if( is_front_page() ){ ?>
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#hero-section">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-me">Contact Me</a>
                    </li>
                </ul>   
                <?php }else{ 
                    wp_nav_menu(
                    [
                        'menu' => 'primary_menu',
                        'menu_class' => 'navbar-nav me-auto mb-lg-0',
                        // 'menu_id' => 'primary-menu',
                        'container' => '',
                        // 'container_id' => 'primary_menu_container',
                        'fallback_cb' => function () {
                            return __('Create a menu and set location to Header Primary Menu.', 'pas_mph');
                        },
                        'theme_location' => "primary_menu",
                    ]); 
                }?>
                <ul class="social">
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
    </nav>
</header>
<!-- Header End -->