<?php


if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('fpr', get_template_directory() . '/languages');

}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// top navigation
function blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Register HTML5 Blank Navigation
function register_blank_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'fpr'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'fpr'), // Sidebar Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar sidebar
    register_sidebar(array(
        'name' => __('Sidebar', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Widget Area 3', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// excerpt lenght
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function fpr_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
//add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
//add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
//add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
//add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_blank_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
//add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'fpr_pagination'); // Add our HTML5 Pagination


// widget
// Additing Action hook widgets_init
add_action( 'widgets_init', 'fprbox_widget'); 

function fprbox_widget() {
    register_widget( 'fprbox_widget_info' );
}

class fprbox_widget_info extends WP_Widget {

    //Name the widget, here Buffercode Widget will be displayed as widget name, $widget_ops may be an array of value, which may holds the title, description like that.

    function fprbox_widget_info () {

        $this->WP_Widget('fprbox_widget_info', 'FPR Iconbox', $widget_ops );        }

        //Designing the form widget, which will be displayed in the admin dashboard widget location.

        public function form( $instance ) {

            if ( isset( $instance[ 'icon' ]) && isset ($instance[ 'title' ]) && isset($instance[ 'desc' ]) && isset($instance[ 'link' ]) ) {
                $icon = $instance[ 'icon' ];
                $title = $instance[ 'title' ];
                $desc = $instance[ 'desc' ];
                $link = $instance[ 'link' ];
            }
            else {
                $icon = __( '', 'bc_widget_title' );
                $title = __( '', 'bc_widget_title' );
                $desc = __( '', 'bc_widget_title' );
                $link = __( '', 'bc_widget_title' );
            } 

            ?>
            
            <p>Title: <input name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

            <p>Desc: <textarea rows="5" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo esc_attr( $desc ); ?></textarea></p>
            
            <p>Icon: <select id="<?php echo $this->get_field_name( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
                 <option value="fa-group">Group</option>
                 <option value="fa-wechat">Chat</option>
                 <option value="fa-bullhorn">Bullhorn</option>
                 <option value="fa-graduation-cap">Graduation Cap</option>
            </select>
            </p>

            <p>Link: <input name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></p>

            <?php

        }

        // update the new values in database

        function update($new_instance, $old_instance) {

            $instance = $old_instance;

            $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';

            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

            $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

            return $instance;

        }

        //Display the stored widget information in webpage.

        function widget($args, $instance) {

            extract($args);

            $icon = empty( $instance['icon'] ) ? '&nbsp;' : $instance['icon'];

            $title = empty( $instance['title'] ) ? '&nbsp;' : $instance['title'];

            $desc = empty( $instance['desc'] ) ? '&nbsp;' : $instance['desc'];

            $link = empty( $instance['link'] ) ? '&nbsp;' : $instance['link'];

            echo '<div class="media">';
            echo '   <div class="media_object">';
            echo '        <div class="icon-small fa ' . $icon . '"></div>';
            echo '    </div>';
            echo '    <div class="media_body">';
            echo '        <h2 class="beta">' . $title . '</h2>';
            echo '        <p>' . $desc . '</p>';
            if(!empty( $instance['link'] )){
                echo '        <p><a href="' . $link . '">Read more</a></p>';
            }
            echo '    </div>';
            echo '</div>';
        }
}


// custom post types

add_action('init', 'cptui_register_my_cpt_team');
function cptui_register_my_cpt_team() {
register_post_type('team', array(
'label' => 'Team Members',
'description' => 'Team members',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'team', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'Team Members',
  'singular_name' => 'Team Member',
  'menu_name' => 'Team Members',
  'add_new' => 'Add Team Member',
  'add_new_item' => 'Add New Team Member',
  'edit' => 'Edit',
  'edit_item' => 'Edit Team Member',
  'new_item' => 'New Team Member',
  'view' => 'View Team Member',
  'view_item' => 'View Team Member',
  'search_items' => 'Search Team Members',
  'not_found' => 'No Team Members Found',
  'not_found_in_trash' => 'No Team Members Found in Trash',
  'parent' => 'Parent Team Member',
)
) ); }

add_action('init', 'cptui_register_my_cpt_familycare');
function cptui_register_my_cpt_familycare() {
register_post_type('familycare', array(
'label' => 'FamilyCare Centers',
'description' => 'FamilyCare Center location details',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'familycare', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'FamilyCare Centers',
  'singular_name' => 'FamilyCare Center',
  'menu_name' => 'FamilyCare Centers',
  'add_new' => 'Add FamilyCare Center',
  'add_new_item' => 'Add New FamilyCare Center',
  'edit' => 'Edit',
  'edit_item' => 'Edit FamilyCare Center',
  'new_item' => 'New FamilyCare Center',
  'view' => 'View FamilyCare Center',
  'view_item' => 'View FamilyCare Center',
  'search_items' => 'Search FamilyCare Centers',
  'not_found' => 'No FamilyCare Centers Found',
  'not_found_in_trash' => 'No FamilyCare Centers Found in Trash',
  'parent' => 'Parent FamilyCare Center',
)
) ); }

add_action('init', 'cptui_register_my_cpt_event');
function cptui_register_my_cpt_event() {
register_post_type('event', array(
'label' => 'Events',
'description' => 'Upcoming events',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'event', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'Events',
  'singular_name' => 'Event',
  'menu_name' => 'Events',
  'add_new' => 'Add Event',
  'add_new_item' => 'Add New Event',
  'edit' => 'Edit',
  'edit_item' => 'Edit Event',
  'new_item' => 'New Event',
  'view' => 'View Event',
  'view_item' => 'View Event',
  'search_items' => 'Search Events',
  'not_found' => 'No Events Found',
  'not_found_in_trash' => 'No Events Found in Trash',
  'parent' => 'Parent Event',
)
) ); }

?>