<?php




//========================================================================
//===============             CHARGEMENT DES SCRIPTS FrontEnd
//========================================================================
define('WILONE_VERSION', '1.0.2'); //Définis la Version du style a afficher

function wilone_scripts() {
	
	//Chargement Style CSS
	wp_enqueue_style( 'wilone_bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min-4-beta-2.css', array(), WILONE_VERSION , 'all' );



	if (is_front_page()):
	wp_enqueue_style('wilone_animate', get_template_directory_uri() . '/css/animate.css', array(), WILONE_VERSION, 'all');
	wp_enqueue_style( 'wilone_custom', get_template_directory_uri() . '/style.css', array('wilone_bootstrap', 'wilone_animate'),	WILONE_VERSION , 'all');	
	else:
		wp_enqueue_style( 'wilone_custom', get_template_directory_uri() . '/style.css', array('wilone_bootstrap'), WILONE_VERSION , 'all' ); 		
	endif;



		//Chargement Script JS
	if( !is_admin()){
		wp_deregister_script( 'jquery');
		wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-3.3.1.min.js', array(), WILONE_VERSION, true);
		wp_enqueue_script( 'jquery' );
	}


	wp_enqueue_script( 'wilone_customScript', get_template_directory_uri() . '/js/wilone.js', array('jquery'), WILONE_VERSION , 'false' );



	wp_enqueue_script( 'wilonePopper', get_template_directory_uri() . '/bootstrap/js/popper.min.js', array('jquery'), WILONE_VERSION , 'false' );


	wp_enqueue_script( 'wiloneBoostScript', get_template_directory_uri() . '/bootstrap/js/bootstrap.min-4-beta-2.js', array('jquery', 'wilonePopper'), WILONE_VERSION , 'false' );

	

} //fin de la fonction  wilone_scripts
add_action('wp_enqueue_scripts', 'wilone_scripts');


function wilone_soudstations_scripts() {
	
	//JS
	wp_enqueue_script( 'wilone_soundmanager2-script', get_template_directory_uri() . '/js/soundmanager2.js', array('jquery'), WILONE_VERSION , 'false' );

	wp_enqueue_script( 'wilone360Player', get_template_directory_uri() . '/js/soundstation/js/360player.js', array('jquery'), WILONE_VERSION , 'false' );

	wp_enqueue_script( 'wiloneberniecode-animator', get_template_directory_uri() . '/js/soundstation/js/berniecode-animator.js', array('jquery'), WILONE_VERSION , 'false' );

	wp_enqueue_script( 'wilonbexcanvas', get_template_directory_uri() . '/js/soundstation/js/excanvas.js', array('jquery'), WILONE_VERSION , 'false' );

	wp_enqueue_script( 'wilonbexcanvas', get_template_directory_uri() . '/js/soundstation/soundmanager2-jsmin.js', array('jquery'), WILONE_VERSION , 'false' );

		wp_enqueue_script( 'wilone_play-mp3-link-script', get_template_directory_uri() . '/play-mp3-links/script/inlineplayer.js', array('jquery'), WILONE_VERSION , 'false' );


	//CSS
	wp_enqueue_style( 'wilone_flashblock', get_template_directory_uri() . '/js/soundstation/css/flashblock.css', array(), WILONE_VERSION , 'all' );

	wp_enqueue_style( 'wilone_play-mp3-link-css', get_template_directory_uri() . '/play-mp3-links/css/inlineplayer.css', array(), WILONE_VERSION , 'all' );//Sound Manager bouton mp3




} //fin de la fonction  wilone_scripts
add_action('wp_enqueue_scripts', 'wilone_soudstations_scripts');

//========================================================================
//===============             CHARGEMENT DES SCRIPTS DASHBOARD
//========================================================================
function wilone_admin_init() {

	//************   ACTION1
	function wilone_admin_scripts(){

	if(!isset($_GET['page']) || $_GET['page'] !="wilone_theme_opts"){
		return;
		}//Si la page est different de wilone_theme_opts Alors tu ne charge aucun script 

		//Et si la page est egale a wilone theme opts alors tu charge le script bbostrap
	

	// chargement des styles admin
	wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/bootstrap/css/bootstrap.min3.3.css', array(), WILONE_VERSION);

	// chargement des scripts admin
	wp_enqueue_media();//Rend possible l'ajout d'un uploader WP
	wp_enqueue_script('wilone-admin-init', get_template_directory_uri(). '/js/admin-options.js', array(), WILONE_VERSION, true);

	}// Fin wilone_admin_scripts
	add_action('admin_enqueue_scripts', 'wilone_admin_scripts');

	// ***********   ACTION 2
	include('includes/save-options-page.php');
	add_action('admin_post_wilone_save_options', 'wilone_save_options');

} // fin wilone_admin_init
add_action('admin_init', 'wilone_admin_init');



//========================================================================
//=============       ACTIVER LES OPTIONS Saison2 Episode3
//========================================================================
function wilone_activ_options(){

	$theme_opts = get_option('wilone_opts');
	if(!$theme_opts){
		$opts = array(
				'image_01_url'		=>'',
				'legend_01'			=>''
				);

		update_option('wilone_opts', $opts);
	}
}

add_action('after_switch_theme', 'wilone_activ_options');
//On utilise le hook after_swith_theme, puis la fonction


//========================================================================
//=============       	MENU OPTION DU THEME
//========================================================================
function wilone_admin_menus() {

	add_menu_page(
		'Machin Options', //$page_title
		'Options du thème', //$menu_title
		'publish_pages', // Accessible pour les utilisateur du role ..... https://codex.wordpress.org/Roles_and_Capabilities
		'wilone_theme_opts',
		'wilone_build_options_pages'//$function
		);

	

} // Fin wilone_admin_menus
include('includes/build-options-pages.php'); // Contient la fonction wilone_build_options_pages.php
add_action('admin_menu', 'wilone_admin_menus');

//========================================================================
//===============            Sidebars and Widget
//========================================================================

function wilone_widgets_init() {
	register_sidebar( array(
			'name'			=>	'Footer Widget tu le c ;)',
			'description'	=>	'Widget Affiché dans le footer: 4 au maximum',
			'id'			=>	'widgetized-footer',
			'before_widget'	=>	'<div id="%1$s" class="col-12 col-sm-6 col-md-3 wrap-widget %2$s d-flex"><div class="inside-widget w-100 pb-3">',
			'after_widget'	=>	'</div></div>',
			'befor_title'	=>	'<h2 class="h3 text-center">',
			'after_title'	=>	'</h2>',
		) );

  register_sidebar( array(
    'name'          => 'Right Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div id="%1$s" class="card my-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="card-header">',
    'after_title'   => '</h4>',
  ) );
}
add_action('widgets_init', 'wilone_widgets_init');

//========================================================================
//===============             UTILITAIRES
//========================================================================

function wilone_setup(){
	// Support Vignette ( definire image a la une )
	add_theme_support('post-thumbnails');

	
	//Créer un format d'image Slider Front 
	add_image_size('up-medium-true',500, 375, true); 
	add_image_size('up-medium-false', 500, 375, false); 
	add_image_size('front-slider', 1140, 380, true);
	add_image_size('blog-post', 900, 300, true);
	add_image_size('one-col-thumb', 700, 300, true);
	add_image_size('three-col-thumb', 700, 400, true);
	add_image_size('smallBiz', 900, 400, true);
	
	//add_image_size('front-slider_1', 1140, 380, true); 
	

	//Enleve générateur de version ( visionage du code pour pas ce faire pirater)
	remove_action('wp_head', 'wp_generator');

	// Enleve les guillement à la fin d'un extrait excerpt
	remove_filter ('the_content', 'wpteturize');

	//Title ( Supprimer blalise titlle de index.php)
	add_theme_support('title-tag');

	//Changer Taille Upload Files
	@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


	//Menu Boosrap GitHub Navgation walkr
	require_once('includes/class-wp-bootstrap-navwalker.php');

	//Active la gestion des menus
	register_nav_menus( array('primary' => 'principal', 'secondary' => 'deuxieme') );
} //FIN function SETUP

add_action('after_setup_theme', 'wilone_setup');

//
// Woo Commerce
//
/*
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
*/
//========================================================================
//         Ajouter class img-fluid à toutes les images incluses ...
//================================================================
 function wilone_add_img_class( $class ){
 	$class .= ' img-fluid'; //Espace pour séparer les class
 	return $class;
 }
 add_filter('get_image_tag_class', 'wilone_add_img_class');


//========================================================================
//         Ajout de la taille medium large dans la catégorie ...
//========================================================================

function my_images_sizes($sizes){
	$addsizes = array(
			"medium_large" 		=> "Medium Large",
			"up-medium-true" 	=> "Medium plus"
		);

	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;

}
add_filter('image_size_names_choose', 'my_images_sizes');


//========================================================================
//===============         Affichage Métadonné Date + Catégorie Tags ...
//========================================================================

//	cf content.php		<?php echo wilone_give_me_meta_01(
//	     							esc_attr( get_the_date('c') ),
//	     							esc_html( get_the_date()),
//	     							get_the_category_list(', ')); 

function wilone_give_me_meta_01($date1, $date2, $cat, $tags) {
	$chaine = 'publié le <time class="entry-date" datetime="';
	$chaine .= $date1;
	$chaine .= '">';
	$chaine .= $date2;
	$chaine .= '</time> dans la catégorie ';
	$chaine .= $cat;
	if(strlen($tags) > 0 ):
	$chaine .= '</br>avec les étiquettes :  '.$tags;
	endif;

	return $chaine;
}

//========================================================================
//===============      Enlever les 3 point de l'extrait ... 
//===============		et créer un lien afficher la suite
//========================================================================

function wilone_new_excerpt_more( $more ) {
	return ' <a class="more-link" href="'.get_permalink() .'">'.'[lire la suite]'.'</a>';
}
add_filter('excerpt_more', 'wilone_new_excerpt_more');


//========================================================================
//===============      Extrait de 20 mot
//===============		the_excerpt
//========================================================================
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



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




//==================================================================================================
//  Créer menu pages BuddyPress 1 http://bp-fr.net/agora/sujet/ajouter-un-autre-menu-aux-profil/ 
//==================================================================================================


function bpex_add_sub_nav_to_profile_settings() {
global $bp;
$parent_slug = 'toto';

        //Add nav item   
        bp_core_new_nav_item( array( 
            'name'                  => __( 'Mes Favoris', 'textdomain' ),
            'slug'                  => $parent_slug,
            'default_subnav_slug'   => $parent_slug,
            'parent_url'            => $bp->loggedin_user->domain . $parent_slug.'/', 
            'screen_function'       => 'bpex_profile_toto_screen',
            'position'              => 20,
        ) );
}

        function bpex_profile_toto_screen() {   
            add_action( 'bp_template_content', 'bpex_profile_toto_screen_content' );
            bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
        }

        function bpex_profile_toto_screen_content() {
            do_action( 'my_toto_post' );
        }
add_action( 'bp_setup_nav', 'bpex_add_sub_nav_to_profile_settings', 100 );

function bpex_toto_stuff() {
echo 'Some stuff here ?'; ?>
<h2>Lorem Ipsum for ever !</h2>
<p> <iframe width="560" height="315" src="https://www.youtube.com/embed/Xrz4JuiV7Ks?list=PL-0MHjzdA9EyvwxiQGE2hh3l2d8hUadfp" frameborder="0" allowfullscreen></iframe> Hello you  </p>
<?php
}
add_action( 'my_toto_post', 'bpex_toto_stuff' ); 




//==================================================================================================
//  Créer menu pages BuddyPress 2 http://bp-fr.net/agora/sujet/ajouter-un-autre-menu-aux-profil/ 
//==================================================================================================

function bpex_add_sub_nav_to_profile_settings_bis() {
global $bp;
$parent_slug = 'tutu';

        //Add nav item   
        bp_core_new_nav_item( array( 
            'name'                  => __( 'Mes Favorus', 'textdomain' ),
            'slug'                  => $parent_slug,
            'default_subnav_slug'   => $parent_slug,
            'parent_url'            => $bp->loggedin_user->domain . $parent_slug.'/', 
            'screen_function'       => 'bpex_profile_tutu_screen_bis',
            'position'              => 30,
        ) );
}

        function bpex_profile_tutu_screen_bis() {   
            add_action( 'bp_template_content', 'bpex_profile_tutu_screen_content_bis' );
            bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
        }

        function bpex_profile_tutu_screen_content_bis() {
            do_action( 'my_tutu_post_bis' );
        }
add_action( 'bp_setup_nav', 'bpex_add_sub_nav_to_profile_settings_bis', 100 );

function bpex_tutu_stuff_bis() {
echo 'Some stuff here ?'; ?>
<h2>Lorem Ipsum for ever !</h2>
<p> <iframe width="560" height="315" src="https://www.youtube.com/embed/Xrz4JuiV7Ks?list=PL-0MHjzdA9EyvwxiQGE2hh3l2d8hUadfp" frameborder="0" allowfullscreen></iframe> Hello you  2 </p>
<?php
}
add_action( 'my_tutu_post_bis', 'bpex_tutu_stuff_bis' ); 



//========================================================
//  Créer menu pages BuddyPress My Post on profil
//========================================================

function bpfr_my_post_on_profile() {
 
    // to get all post, comment the line 'author' 
     
    $myposts = get_posts(  array(
    'posts_per_page' => 3, // set the number of post to show
    'author'         => bp_displayed_user_id(), // show only this member post
    'post_type'      => 'post',
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_status'      => 'publish'
    ));
     
    if( ! empty( $myposts ) ) { 
 
        foreach($myposts as $post) {
            setup_postdata( $post );
            $page_object = get_post( $post );
             
        // uncomment next line to show only a list of titles linked to full post
        // if you uncomment, you have to comment the 2 echo below
         
           echo '<article class="col-12 col-sm-6 col-md-3>"<div class="panel panel-default">' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'img-fluid aligncenter wp-post-image' )) . '<div class="panel-footer"> <h3 class="profile_post text-center"><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</h3></a> </div></div></article>';
            
                         
        // comment the 2 following lines (or remove them) if you use the above      
             
        //  echo '<h3 class="profile_post"><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</h3></a>';
        //  echo $page_object->post_content;
        }   
     
        wp_reset_postdata();    
 
    } else { 
         
        echo '<div class="info" id="message">' . __('No posts found.') . '</div>'; // is translated by WP
    }
}
add_action ( 'my_profile_post', 'bpfr_my_post_on_profile' );
 
 
function bpfr_post_profile_setup_nav() {
    global $bp;
    $parent_slug = 'posts';
    $child_slug = 'posts_sub';  
     
    bp_core_new_nav_item( array(
    'name' => __( 'Mes Articles' ),
    'slug' => $parent_slug,
    'screen_function' => 'bpfr_profile_post_screen',
    'position' => 40,
    'default_subnav_slug' => $child_slug
    ) );
     
    //Add subnav item    
    bp_core_new_subnav_item( array( 
    'name' => __( 'Latest posts' ), 
    'slug' => $child_slug, 
    'parent_url' => $bp->loggedin_user->domain . $parent_slug.'/', 
    'parent_slug' => $parent_slug, 
    'screen_function' => 'bpfr_profile_post_screen'
    ) );
}
 
function bpfr_profile_post_screen() {   
    add_action( 'bp_template_content', 'bpfr_profile_post_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
 
function bpfr_profile_post_screen_content() {
 
    do_action( 'my_profile_post' );
}
 
add_action( 'bp_setup_nav', 'bpfr_post_profile_setup_nav' );/*Fin MENU BUDDYPRESS*/


//========================================================
//  Taxonomie et Groupe de Champ
//========================================================

function cptui_register_my_taxes_logiciels() {

	/**
	 * Taxonomy: Logiciels.
	 */

	$labels = array(
		"name" => __( "Logiciels", "wilone-child" ),
		"singular_name" => __( "Logiciel", "wilone-child" ),
	);

	$args = array(
		"label" => __( "Logiciels", "wilone-child" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Logiciels",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'logiciels', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "logiciels", array( "post" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_logiciels' );


function cptui_register_my_taxes_genre_musical() {

	/**
	 * Taxonomy: Genres.
	 */

	$labels = array(
		"name" => __( "Genres", "wilone-child" ),
		"singular_name" => __( "Genre", "wilone-child" ),
	);

	$args = array(
		"label" => __( "Genres", "wilone-child" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Genres",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'genre_musical', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "genre_musical", array( "post" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_genre_musical' );

function cptui_register_my_taxes_contenu() {

	/**
	 * Taxonomy: Types de contenu.
	 */

	$labels = array(
		"name" => __( "Types de contenu", "wilone-child" ),
		"singular_name" => __( "Type de contenu", "wilone-child" ),
	);

	$args = array(
		"label" => __( "Types de contenu", "wilone-child" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Types de contenu",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'contenu', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "contenu", array( "post" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_contenu' );



/*********************************************************************/
/*		Fonction Formulaire Ajax Filter content-form-filter.php		*/
/*******************************************************************/

function misha_filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC или DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
 
	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);
 
		// if only max price is set
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);
	}
 
 
	// if post thumbnail is set
	if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'][] = array(
			'key' => '_thumbnail_id',
			'compare' => 'EXISTS'
		);
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			echo '<h2>' . $query->post->post_title . '</h2>';
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
 
	die();
}
 
 
add_action('wp_ajax_myfilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');