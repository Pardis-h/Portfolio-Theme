<?php


class Theme_Categories_2_Widget extends WP_Widget {


    public function __construct() {
        parent::__construct( false, 'Theme Projects Categories Widget' );
    }


    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters( 'widget_title', $instance['title'] );
        echo $args['after_title'];

        $args = array(
            'post_type'              => 'project',
            'post_status'            => 'publish',
            'taxonomy'               => 'project_categories',            
            );
        $cat = get_categories($args);
        ?>
        <div class="cat">
            <ul>
            <?php
                foreach ( $cat as $category ) : ?>
                    <li>
                        <a href="<?php echo get_category_link( $category->term_id ); ?>">
                            <span><?php echo $category->name; ?></span>
                            <span><?php echo $category->count; ?></span> 
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Categories';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title :</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }
}

function register_myp_categories_2_widget() {
    register_widget( 'Theme_Categories_2_Widget' );
}

add_action( 'widgets_init', 'register_myp_categories_2_widget' );
