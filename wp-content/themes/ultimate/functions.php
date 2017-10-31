<?php

$producao = false;

/* HABILITAR / DESABILITAR */
add_theme_support( 'post-thumbnails' );

// Unable admin bar
add_filter('show_admin_bar', '__return_false');

add_post_type_support( 'post', 'excerpt' );

// remove itens padrões
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	//remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}

// REMOVE PARENT PAGE
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// Remove tags
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}


// muda nome post
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Todas as notícias';
    $submenu['edit.php'][10][0] = 'Adicionar notícia';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Notícias';
    $labels->singular_name = 'Notícia';
    $labels->add_new = 'Adicionar notícia';
    $labels->add_new_item = 'Adicionar notícia';
    $labels->edit_item = 'Editar notícia';
    $labels->new_item = 'Notícia';
    $labels->view_item = 'Ver notícia';
    $labels->search_items = 'Buscar notícia';
    $labels->not_found = 'Nenhuma notícia encontrado';
    $labels->not_found_in_trash = 'Nenhuma notícia encontrada na lixeira';
    $labels->all_items = 'Todas as notícias';
    $labels->menu_name = 'Notícias';
    $labels->name_admin_bar = 'Notícias';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );


/* PAGINAS CONFIGURAÇÕES */
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));
}

/* PAGINAÇÃO */
function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, #menu-appearance, #menu-plugins, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, #menu-posts 
	  	#menu-posts li:nth-child(4), 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator 
		{
			display: none!important;
		} 

		#categories, .column-categories {
			text-indent: -10000px;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-posts").remove();
				jQuery("#menu-comments").remove();
				jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();

				jQuery("#menu-posts li:nth-child(4)").remove();

				jQuery("#categories").html("");
				jQuery(".column-categories").html("");

				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();

				jQuery(".user-rich-editing-wrap").remove();
				jQuery(".user-admin-color-wrap").remove();
				jQuery(".user-comment-shortcuts-wrap").remove();
				jQuery(".user-admin-bar-front-wrap").remove();
				jQuery(".user-language-wrap").remove();

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();
			});
		</script>
	  ';
	}
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        } elseif ( is_archive() ) {

            $title = post_type_archive_title( '', false );

        }

    return $title;

});



/*
add_action( 'init', 'create_post_type_1' );
function create_post_type_1() {

	$labels = array(
	    'name' => _x('Comercial', 'post type general name'),
	    'singular_name' => _x('Comercial', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', ''),
	    'add_new_item' => __('Addicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo'),
	    'all_items' => __('Todos'),
	    'view_item' => __('Visualizar'),
	    'search_items' => __('Procurar'),
	    'not_found' =>  __('Nenhum encontrado.'),
	    'not_found_in_trash' => __('Nenhum encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Comercial'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-store',
	    'supports' => array('title','excerpt','editor','thumbnail')
	  );

    register_post_type( 'comercial', $args );
}

add_action( 'init', 'create_taxonomy_categoria_1' );
function create_taxonomy_categoria_1() {

	$labels = array(
	    'name' => _x( 'Categoria', 'taxonomy general name' ),
	    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Procurar categoria' ),
	    'all_items' => __( 'Todas as categorias' ),
	    'parent_item' => __( 'Categoria pai' ),
	    'parent_item_colon' => __( 'Categoria pai:' ),
	    'edit_item' => __( 'Editar categoria' ),
	    'update_item' => __( 'Atualizar categoria' ),
	    'add_new_item' => __( 'Adicionar nova categoria' ),
	    'new_item_name' => __( 'Nova categoria' ),
	    'menu_name' => __( 'Categorias' ),
	);

    register_taxonomy( 'categoria_comercial', array( 'comercial' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
		'has_archive' => 'comercial',
		'rewrite' => array(
		    'slug' => 'comercial',
		    'with_front' => false,
			),
        )
    );
}

*/



	/* POST TYPE */
	/*
	function residencial_post_type(){
		register_post_type('residencial', array( 
			'labels'            =>  array(
				'name'          =>      __('Residencial'),
				'singular_name' =>      __('Residencial'),
				'all_items'     =>      __('Todos'),
				'add_new'       =>      __('Adicionar'),
				'add_new_item'  =>      __('Adicionar'),
				'edit_item'     =>      __('Editar'),
				'view_item'     =>      __('Visualizar'),
				'search_items'  =>      __('Pesquisar'),
				'no_found'      =>      __('Nenhum item encontrato'),
				'not_found_in_trash' => __('A lixeira está vazia.')
			),
			'public'            =>  true,
			'publicly_queryable'=>  true,
			'show_ui'           =>  true, 
			'query_var'         =>  true,
			'show_in_nav_menus' =>  false,
			'capability_type'   =>  'post',
			'hierarchical'      =>  true,
			'rewrite'=> [
				'slug' => 'servicos/residencial',
				"with_front" => false
			],
			"cptp_permalink_structure" => "/%residencial_taxonomy%/%postname%/",
			'menu_position'     =>  21,
			'supports'          =>  array('title','editor', 'thumbnail'),
			'has_archive'       =>  true,
			'menu_icon' => 'dashicons-admin-home'
		));
		flush_rewrite_rules();
	}
	add_action('init', 'residencial_post_type');
	function residencial_taxonomy() {  
		register_taxonomy(  
			'residencial_taxonomy',  
			'residencial',        
			array(
				'label' => __( 'Categorias' ),
				'rewrite'=> [
					'slug' => 'servicos/residencial',
					"with_front" => false
				],
				"cptp_permalink_structure" => "/%residencial_taxonomy%/",
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'query_var' => true
			) 
		);  
	}  
	add_action( 'init', 'residencial_taxonomy');
	/* POST TYPE */

?>