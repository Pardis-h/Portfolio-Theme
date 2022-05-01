<?php
function myp_register_custom_taxonomies(){
     /**
     * Taxonomy: Portfolio categories.
     */

    $labels = [
        "name" => __("Project categories", "pas_mph"),
        "singular_name" => __("Project category", "pas_mph"),
        "menu_name" => __("Project categories", "pas_mph"),
        "all_items" => __("All Project categories", "pas_mph"),
        "edit_item" => __("Edit Project category", "pas_mph"),
        "view_item" => __("View Project category", "pas_mph"),
        "update_item" => __("Update Project category name", "pas_mph"),
        "add_new_item" => __("Add new Project category", "pas_mph"),
        "new_item_name" => __("New Project category name", "pas_mph"),
        "parent_item" => __("Parent Project category", "pas_mph"),
        "parent_item_colon" => __("Parent Project category:", "pas_mph"),
        "search_items" => __("Search Project categories", "pas_mph"),
        "popular_items" => __("Popular Project categories", "pas_mph"),
        "separate_items_with_commas" => __("Separate Project categories with commas", "pas_mph"),
        "add_or_remove_items" => __("Add or remove Project categories", "pas_mph"),
        "choose_from_most_used" => __("Choose from the most used Project categories", "pas_mph"),
        "not_found" => __("No Project categories found", "pas_mph"),
        "no_terms" => __("No Project categories", "pas_mph"),
        "items_list_navigation" => __("Project categories list navigation", "pas_mph"),
        "items_list" => __("Project categories list", "pas_mph"),
        "back_to_items" => __("Back to Project categories", "pas_mph"),
    ];


    $args = [
        "label" => __("Project categories", "pas_mph"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'project_categories', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "project_categories",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("project_categories", ["project"], $args);
}
add_action('init','myp_register_custom_taxonomies');