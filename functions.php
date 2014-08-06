<?php

// Responsive Images fix //

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Post Thumbnail Support //

add_theme_support( 'post-thumbnails', array( 'lineas_de_trabajo', 'clientes'));

// Custom Post Types //

add_action( 'init', 'create_post_type' );

function create_post_type() {
	// Lineas de Trabajo //
	register_post_type( 'lineas_de_trabajo',
		array(
			'labels' => array(
				'name' => 'Lineas de Trabajo',
				'singular_name' => 'Linea de Trabajo'

			),
		'public' => true,
		'supports' => array('thumbnail','title', 'editor')
		)
	);

	// Clientes //
	register_post_type( 'clientes',
		array(
			'labels' => array(
				'name' => 'Clientes',
				'singular_name' => 'Cliente'

			),
		'public' => true,
		'supports' => array('thumbnail','title', 'editor')
		)
	);
}

//META BOXES PARA LINEAS DE TRABAJOS//

$new_meta_boxes =
array(
	//COLUMNA//
 	"columna" => array
 	(	
	 	"name" => "columna",
	 	"std" => "",
		"title" => "Columnas"
	),
);

function new_meta_boxes() {
	global $post, $new_meta_boxes;
	 
	foreach($new_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
	 
	if($meta_box_value == "")
		$meta_box_value = $meta_box['std'];
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo'<h2>'.$meta_box['title'].'</h2>';
		echo'<select name="'.$meta_box['name'].'"><option value="1">1 columna</option><option value="2">2 columnas</option></select><br />';
		echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
		}
}

function create_meta_box() {
	global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes', 'Post Settings', 'new_meta_boxes', 'lineas_de_trabajo', 'normal', 'core' );
	}
}
function save_postdata( $post_id ) {
	global $post, $new_meta_boxes;
 
	foreach($new_meta_boxes as $meta_box) {
	// Verify
	if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
		return $post_id;
	}
 
	if ( 'page' == $_POST['post_type'] ) {
	if ( !current_user_can( 'edit_page', $post_id ))
		return $post_id;
	} 
	else {
		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
	}
 
	$data = $_POST[$meta_box['name']];
 
	if(get_post_meta($post_id, $meta_box['name']) == "")
		add_post_meta($post_id, $meta_box['name'], $data, true);
	elseif($data != get_post_meta($post_id, $meta_box['name'], true))
		update_post_meta($post_id, $meta_box['name'], $data);
	elseif($data == "")
		delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
	}
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata'); 

// Scrip Carrusel //

wp_register_script('carousel', get_bloginfo('template_url') . '/js/jquery.jcarousel.min.js', array('jquery'), 1.1, true);
wp_register_script('fittext', get_bloginfo('template_url') . '/js/jquery.fittext.js', array('jquery'), 1.1, true);
wp_enqueue_script('main', get_bloginfo('template_url') . '/js/min/main-min.js', array('carousel', 'fittext'), 1.1, true);

// Leer más //

function new_excerpt_more( $more ) {
	return '<a href="#" class="readmore"><span>+</span> Leer más</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

