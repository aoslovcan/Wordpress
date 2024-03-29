<?php 
function academica_files()
{
    
    wp_enqueue_script('main-universits-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('custome-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('academica_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'academica_files');

function academica_features(){
/*register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');*/
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'academica_features');


function university_adjust_quries($query){
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query())
    {
        $query->set('', '');
    }
}
add_action('pre_get_posts', 'university_adjust_quries');

