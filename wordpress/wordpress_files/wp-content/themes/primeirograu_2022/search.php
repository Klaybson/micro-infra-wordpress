<?php get_header(); ?>

<style>

    .busca a {
        background-color: #fff;
        color: #003171;
        font-size: 18px;
        border-bottom: 2px solid #dedede;
        display: flex;
        margin-bottom: 15px;
        padding: 15px 15px 15px 30px;
        font-weight: bold;
        margin-left: -15px;
    }

    .busca-lista {
        color: #E81616;
        margin-right: 10px;
        position: absolute;
        margin-top: 15px;
    }

    .busca li {
        list-style: none;
        background-color: #fff;
        padding-left: 15px;
    }

</style>
    
    <div class="container conteudo-interno">        
        <div>
            <h3 class="titulo titulo-page">Resultado da Busca</h3> 
        </div>
        <div class="breadcrumb-portal mt-3 mb-4" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
    
        <!-- Início Gestão de Pessoas -->                         
        <?php
            if ( have_posts() ) {
                $s=get_search_query();
                $args = array(  
                    'post_status' => 'publish',
                    'posts_per_page' => 8, 
                    'paged' => 'paged',
                    'orderby' => 'date', 
                    'order' => 'ASC', 
                    's' =>$s
                );
                $wp_query = new WP_Query( $args );

            
                if ( $wp_query->have_posts() ) : ?>
                     
                    <ul class="busca mt-4 mb-5">
                        <?php
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                        if ($post->post_type == "servicos") { ?>

                        <li>
                            <span class="busca-lista">&#9679;</span>                             
                            <a href="<?php the_field('link_servico'); ?>">
                                                        
                                <?php the_title(); ?>                                 
                            </a>  
                        </li>

                        <?php
                           } elseif ($post->post_type != "servicos") { // Regular post ?>
                        <li>
                            <span class="busca-lista">&#9679;</span>                             
                            <a class="link-gestao" href="<?php the_permalink(); ?>">  
                                                        
                                <?php the_title(); ?>                                 
                            </a>  
                        </li>
                        <?php   }
                        ?>
                        
                        <?php
                        endwhile; ?>
                    </ul>
                <?php endif;?>
        
            <?php } else {
                _e('<h2>Nenhum resultado encontrado.</h2>');
                _e('<h4>Por favor, faça uma nova busca.</h4>');
            };?>
            
        <div class="pagination mt-5 col-12 col-12">
            <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer

            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'prev_next' => true,
                'prev_text' => '<i class="fas fa-arrow-circle-left"></i>',
                'next_text' => '<i class="fas fa-arrow-circle-right"></i>',
                'type' => 'list',
                'total' => $wp_query->max_num_pages
            ));
            ?>
        </div>
       
    </div>


<?php get_footer(); ?>