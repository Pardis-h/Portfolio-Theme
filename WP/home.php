<?php 
get_header(); 

if (is_active_sidebar( 'posts-archive-sidebar' )){
    get_template_part('template-parts/archive/post/posts', 'sidebar');
}else{
    get_template_part('template-parts/archive/post/posts', 'no-sidebar');
}

get_footer(); 