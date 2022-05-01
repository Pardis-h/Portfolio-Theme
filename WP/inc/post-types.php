<?php
function myp_register_custom_post_types(){
    /**
     * Post Type: Project.
     */

    $labels = [
        "name" => __("Project", "pas_mph"),
        "singular_name" => __("project", "pas_mph"),
        "menu_name" => __("My Project", "pas_mph"),
        "all_items" => __("All Project", "pas_mph"),
        "add_new" => __("Add new", "pas_mph"),
        "add_new_item" => __("Add new project", "pas_mph"),
        "edit_item" => __("Edit project", "pas_mph"),
        "new_item" => __("New project", "pas_mph"),
        "view_item" => __("View project", "pas_mph"),
        "view_items" => __("View Project", "pas_mph"),
        "search_items" => __("Search Project", "pas_mph"),
        "not_found" => __("No Project found", "pas_mph"),
        "not_found_in_trash" => __("No Project found in trash", "pas_mph"),
        "parent" => __("Parent project:", "pas_mph"),
        "featured_image" => __("Featured image for this project", "pas_mph"),
        "set_featured_image" => __("Set featured image for this project", "pas_mph"),
        "remove_featured_image" => __("Remove featured image for this project", "pas_mph"),
        "use_featured_image" => __("Use as featured image for this project", "pas_mph"),
        "archives" => __("project archives", "pas_mph"),
        "insert_into_item" => __("Insert into project", "pas_mph"),
        "uploaded_to_this_item" => __("Upload to this project", "pas_mph"),
        "filter_items_list" => __("Filter Project list", "pas_mph"),
        "items_list_navigation" => __("Project list navigation", "pas_mph"),
        "items_list" => __("Project list", "pas_mph"),
        "attributes" => __("Project attributes", "pas_mph"),
        "name_admin_bar" => __("project", "pas_mph"),
        "item_published" => __("project published", "pas_mph"),
        "item_published_privately" => __("project published privately.", "pas_mph"),
        "item_reverted_to_draft" => __("project reverted to draft.", "pas_mph"),
        "item_scheduled" => __("project scheduled", "pas_mph"),
        "item_updated" => __("project updated.", "pas_mph"),
        "parent_item_colon" => __("Parent project:", "pas_mph"),
    ];

    $args = [
        "label" => __("Project", "pas_mph"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => "project",
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "project", "with_front" => true],
        "query_var" => true,
        "menu_icon" => "dashicons-index-card",
        "supports" => ["title", "editor", "thumbnail", "excerpt"],
        "taxonomies" => ["project_categories"],
        "show_in_graphql" => false,
    ];

    register_post_type("project", $args);
}
add_action('init','myp_register_custom_post_types');