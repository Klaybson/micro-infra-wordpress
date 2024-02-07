<?php 	



/**
 * Anotação da Área Princiapal do WordPress.
 */
add_action('wp_dashboard_setup', 'add_custom_dashboard_widgetALC');
function custom_dashboard_widgetALC(){
	$user_ID = get_current_user_id();
	echo '<script>
			jQuery(function(){
				jQuery("#postbox-container-1").removeClass("postbox-container").addClass("welcome-panel").removeAttr("id");
			});
		</script>
		<p>Ao lado segue o menu com as principais funcionalidades do seu Site.</p>';
}

function add_custom_dashboard_widgetALC(){
	wp_add_dashboard_widget('custom_dashboard_widgetALC', 'Bem vindo ao Gerenciador', 'custom_dashboard_widgetALC');
}


// POSTS MAIS VISTOS 
  
function shapeSpace_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function shapeSpace_track_posts($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');


/**
 * 
 * Retorna a URL da imagem baseada no ID do post e no tamanho do thumb.
 *
 * @param integer $post_ID: passa o ID do post para retornar a imagem
 * @param string $thumb: tamanho da imagem baseado no "add_theme_support"
 * @return string
 */
function retorna_modal_simples($post_ID, $div_ID){

    echo '<div id="'.$div_ID.'" class="organograma-lb organograma-lb--conteudo grid grid-pad">
        <div class="col-1-1">';
        	
            $the_query = new WP_Query( 'post_type=page&p='.$post_ID );
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                    <h1 class="titulo"><?php the_title(); ?></h1>
                    <a href="#" class="veja-mais voltar"><i class="fa fa-angle-left" aria-hidden="true"></i> Voltar</a>
                    <div class="texto">
                        <?php the_content(); ?>
                    </div>
                    <?php
                }
                wp_reset_postdata();

    echo '</div></div>';
}

/*
* Adicionar formatos de arquivos
*/
function custom_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword'; 
    $mimes['xls'] = 'application/msexcel'; 
    return $mime_types;
}

add_filter('upload_mimes', 'custom_myme_types', 1, 1);
/**
 * 
 * Retorna a URL da imagem baseada no ID do post e no tamanho do thumb.
 *
 * @param integer $post_ID: passa o ID do post para retornar a imagem
 * @param string $thumb: tamanho da imagem baseado no "add_theme_support"
 * @return string
 */
function retorno_url_thumbnail($post_ID, $thumb){
	$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), $thumb);
	return ($large_image_url[0] != null) ? $large_image_url[0] : '';
}


/**
 * Removendo Menus descessários ao cliente.
 */
add_action('admin_menu', 'removendo_links_do_menu', 999);
function removendo_links_do_menu(){
	remove_menu_page('edit-comments.php');
	if (!current_user_can('administrator')){
		remove_menu_page('upload.php');
		remove_menu_page('edit.php');
		// remove_menu_page('edit.php?post_type=page');
		remove_menu_page('plugins.php');
		remove_menu_page('themes.php');
		remove_menu_page('tools.php');
		// remove_menu_page('edit.php?post_type=acf');
	}
}


function pagenavi_paged($q) {
   $paged = get_query_var('paged') ? get_query_var('paged') : 1;
   $q->set('paged', $paged);
}
add_action('pre_get_posts', 'pagenavi_paged');
   
// Replace wpv-pagination shortcode
function wpv_pagenavi($args, $content) {
 global $WP_Views;
 return wp_pagenavi( array('query' => $WP_Views->post_query, 'echo'=>false) );
}
add_shortcode('wpv-pagination', 'wpv_pagenavi');

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

/**
 * 
 * Gerando um CPT dinamicamente.
 * Forma criada para melhor geração de CPT.
 * Exemplo de uso:
 * retorno_gerar_cpt('Linha do Tempo', 'linha-do-tempo', 23, array('title', 'thumbnail', 'editor', 'excerpt'), true, true, 'Anos');
 *
 * @param String 	$nome: 		 Passando o nome do CTP
 * @param String 	$post_type:  Tipo do Post Type
 * @param Integer 	$posicao: 	 Posição do CTP no Menu do WordPress
 * @param Array 	$tipo: 		 Array com os tipos de campo para mostrar
 * @param Boolean 	$mostrar:  	 Mostrar o CPT no menu (true/false) por padrão "true"
 * @param Boolean 	$cat:  		 Ativando a catergoria (taxonomy) no CTP.
 * @param String 	$cat_nome:   Apesar do padrão ser um Boleano (falso) caso ative a categoria você pode
 								 passar um nome para ela, caso nao deseje ativa o nome padrão "Categoria."
 * @return true
*/
 								 
function retorno_gerar_cpt($nome, $post_type, $posicao, $tipo, $mostrar = true, $cat = true, $cat_nome = true){
	add_action('init', function() use ($nome, $post_type, $posicao, $tipo, $mostrar, $cat, $cat_nome){
		$labels = array( 
			'name' => _x($nome, $post_type),
			'singular_name' => _x($nome, $post_type),
			'add_new' => _x('Novo', $post_type),
			'add_new_item' => _x('Novo', $post_type),
			'edit_item' => _x('Editar', $post_type),
			'new_item' => _x('Novo', $post_type),
			'view_item' => _x('Ver', $post_type),
			'search_items' => _x('Procurar', $post_type),
			'not_found' => _x('Nenhum registro encontrado', $post_type),
			'not_found_in_trash' => _x('Nenhum registro encontrado na lixeira', $post_type),
			'parent_item_colon' => _x('Parent:', $post_type),
			'menu_name' => _x($nome, $post_type)
		);

		$args = array( 
			'labels' => $labels,
			'hierarchical' => false,        
			'supports' => $tipo,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => $mostrar,       
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'capability_type' => 'post',
			'menu_position' => $posicao
		);

		register_post_type($post_type, $args);
		flush_rewrite_rules();
	});

	if ($cat){
		$novo_nome = str_replace('-', '_', $post_type);
		register_taxonomy('cat-'.$post_type, $post_type, 
			array(            
		      	'label' => ($cat_nome == true) ? 'Categoria '.$post_type : $cat_nome, 
		        'singular_label' => ($cat_nome == true) ? 'Categorias' : $cat_nome, 
		        'rewrite' => true,
		        'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,

			)
		);

		add_filter('manage_taxonomies_for_'.$novo_nome.'_columns', $novo_nome.'_type_columns');
		${$novo_nome.'_type_columns'} = function($taxonomies){
			$taxonomies[] = 'cat-'.$post_type;
			return $taxonomies;
		};
		${$novo_nome.'_type_columns'}($taxonomies);
	}
}


/*
* Criando os CPTs
*/
// retorno_gerar_cpt('Servidores e empregados não integrantes de quadro próprio', 'servidores', 5, array('title','editor','author','thumbnail'));

// retorno_gerar_cpt('Rodapé', 'rodape', 5, array('title'));


//Adiciona suporte a Post Thumbnails no Tema
add_theme_support( 'post-thumbnails' );

add_image_size( 'slider', 78, 93, true );
add_image_size( 'lidas', 307, 210, true );


/* add_action( 'init', 'custom_post_servicos' );
 
// The custom function to register a movie review post type
function custom_post_servicos() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Serviços' ),
    'singular_name'      => __( 'Serviço' ),
    'add_new'            => __( 'Novo' ),
    'add_new_item'       => __( 'Novo' ),
    'edit_item'          => __( 'Editar' ),
    'new_item'           => __( 'Novo' ),
    'all_items'          => __( 'Serviços' ),
    'view_item'          => __( 'Ver' ),
    'search_items'       => __( 'Buscar' )
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Serviços',
    'public'            => true,
    'menu_position'     => 4,
    'supports'          => array( 'title', 'editor', 'thumbnail','author'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // $args array goes in parameter 2.
  register_post_type( 'servicos', $args);
}

add_action( 'init', 'custom_post_projeto' );
 
// The custom function to register a movie review post type
function custom_post_projeto() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Projetos' ),
    'singular_name'      => __( 'Projeto' ),
    'add_new'            => __( 'Novo' ),
    'add_new_item'       => __( 'Novo' ),
    'edit_item'          => __( 'Editar' ),
    'new_item'           => __( 'Novo' ),
    'all_items'          => __( 'Projetos' ),
    'view_item'          => __( 'Ver' ),
    'search_items'       => __( 'Buscar' )
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Projeto',
    'public'            => true,
    'menu_position'     => 4,
    'supports'          => array( 'title', 'editor', 'thumbnail','author'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
	'show_ui' => true,
	'show_in_rest' => true,
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // $args array goes in parameter 2.
  register_post_type( 'projeto', $args);
}
 */

function register_menu_principal() {
    register_nav_menu('menu-principal',__( 'Menu Principal' ));
  }
  add_action( 'init', 'register_menu_principal' );


add_action( 'wp_enqueue_scripts', 'misha_script_and_styles');
 
function misha_script_and_styles() {
	// absolutely need it, because we will get $wp_query->query_vars and $wp_query->max_num_pages from it.
	global $wp_query;
 
	// when you use wp_localize_script(), do not enqueue the target script immediately
	wp_register_script( 'misha_scripts', get_stylesheet_directory_uri() . '/assets/js/jquery.js', array('jquery') );
 
	// passing parameters here
	// actually the <script> tag will be created and the object "misha_loadmore_params" will be inside it 
	wp_localize_script( 'misha_scripts', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/ajax/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages,
		'post_type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC',
		// 'posts_per_page' => $wp_query->query_vars['qnt_per_page'],
		'posts_per_page' => 10,
        'cat' => 8,
		
	) );
 
 	wp_enqueue_script( 'misha_scripts' );
}


add_action('wp_ajax_loadmorebutton', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorebutton', 'misha_loadmore_ajax_handler');
 
function misha_loadmore_ajax_handler(){
	$qnt_per_page = $_POST['qnt_per_page'];
    $params['paged'] = $_POST['page']; // we need next page to be loaded
	$params['post_status'] = 'publish';
	$params['post_type'] = 'post';
	$params['orderby'] = 'date';
	$params['order'] = 'DESC';
	$params['cat'] = 8;
   
	query_posts( $params );

	global $wp_query; 
 
	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ): $wp_query->the_post();
        ?>
		<div class="row mb-5">
            <div class="col-md-5">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?> 
            <?php 
                }else{ 
            ?>
                <img class="img-padrao" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-padrao-menor.png" alt="Imagem de plano de fundo azul com texto na cor branca escrito comunicado e simbolo de exclamação">
                <?php
            } 
            ?>  
            </div>
            <div class="col-md-6 mt-5">
            <a class="mt-2" href="<?php the_permalink(); ?>">
                <h6 class="titulo"><?php the_title(); ?></h6> </a>
                <div class="resumo"><?php the_excerpt();?></div>
                <div class="data-interna">
                    <?php echo get_the_date( 'j \d\e F \d\e Y' ); ?> | <?php echo get_the_time( 'G:i' ); ?>
                </div>
            </div>
        </div>
         
		<?php        
		endwhile;
		wp_reset_postdata();
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}


;?>