//========================================================================
//===============      CUSTOM POST TYPE - Slider Caroussel Wordpress
//========================================================================

function wilone_slider_init() {
	$labels = array(
		'name'               =>  'Images Carousel Accueil',
		'singular_name'      =>  'Image accueil', 'post type singular name',
		'add_new'            =>  'Ajouter une image',
		'add_new_item'       =>  'Ajouter une image d\'accueil',
		'edit_item'          =>  'Edit Image',
		'new_item'           =>  'Nouveau',
		'view_item'          =>  'View Image',
		'all_items'          =>  'All Images',
		'search_items'       =>  'Search Images',
		'not_found'          =>  'No Images found.',
		'not_found_in_trash' =>  'No Images found in Trash.', 'your-plugin-textdomain',
		'menu_name'			 =>	 'Slider Frontal'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'			 => get_stylesheet_directory_uri() . '/assets/aa/ico1.gif',
		'publicity_queryable' => false,
		'exclude_from_search' => true,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'thumbnail')
	);

	register_post_type( 'wilone_slider', $args );
}// Fin wilone_slider_init
add_action('init', 'wilone_slider_init');



//======================================================================================
//======================================================================================
//					    Ajout collone admin - CPT Slider 
//				( ordre, image dans la colonne d'apercu admin 
//======================================================================================
//======================================================================================

// Change le nom de la collonne
add_filter('manage_edit-wilone_slider_columns', 'wilone_col_change'); 
//Ajoute des valeurs au tableau Colums
function wilone_col_change($columns) 
{
	$columns['wilone_slider_image_order'] 	= "Ordre";
	$columns['wilone_slider_image'] 		= "Image affichée";

	return $columns;
}

// Affiche les élément aux nouvelles valeur du tableau columns
add_action('manage_wilone_slider_posts_custom_column', 'wilone_content_show', 10, 2);
function wilone_content_show($column, $post_id) {
	global $post;
	if ($column == 'wilone_slider_image') {
		echo the_post_thumbnail(array(100,100));
	}
	if ($column == 'wilone_slider_image_order'){
		echo $post->menu_order;
	}
}


//======================================================================================
//===============     Tri Auto de l'ordre du CPT Slider (Admin)    ====
//======================================================================================


function wilone_change_slides_order($query){

	global $post_type, $pagenow; //On globalise  page now ( edit.php et PostType cf URL)


	//Si pagenow = edit.php et le CPT = slider
	if($pagenow == 'edit.php' && $post_type == 'wilone_slider'){
		$query->query_vars['orderby'] = 'menu_order'; //Par l'intermediaire de l'objet $query_vars On ajoute une Valeur OrderBy à "menu_order" CF WP Query codex : https://codex.wordpress.org/Class_Reference/WP_Query

		$query->query_vars['order'] = 'asc';//Utilise le parametre order avec la valeur asc ( Croissant)
	}
}
add_action('pre_get_posts','wilone_change_slides_order');// Hook pre get post apelle la fonction 





//======================================================================================
//===============     ACF Sous titre ( CPT SLIDER )    ====
//======================================================================================


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slider',
		'title' => 'Slider',
		'fields' => array (
			array (
				'key' => 'field_593fe953a7eec',
				'label' => 'sous titre',
				'name' => 'sous_titre',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'wilone_slider',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'wilone_slider_1',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}



