<?php get_header(); ?>
    
    <div class="conteudo-index">
            
            <div class="container-fluid">
                <div class="row alinha-banner">

                    <div class="col-md-11 banners swiffy-slider slider-indicators-round slider-nav-autoplay" data-slider-nav-autoplay-interval="5000">
                    
                    
                        <ul class="slider-container slider-item-show1 slider-nav-outside-expand">

                            <?php
                                while ( have_rows('banner_topo', 110) ) : the_row();
                                $banners = get_sub_field('banner_imagem');
                                $link = get_sub_field('link_do_banner');
                            ?> 
                    
                            <li>
                                <a href="<?php echo $link; ?>">
                                    <img class="img-pad" src="<?php echo $banners; ?>" alt="<?php echo $image_title; ?>"> 
                                </a>
                            </li>

                            <?php endwhile ;?>

                        </ul>

                        <button type="button" class="slider-nav"></button>
                        <button type="button" class="slider-nav slider-nav-next"></button>

                        <div class="slider-indicators">
                            <?php  while( have_rows('banner_topo', 110) ): the_row();?>
                                <button aria-label="Go to slide"></button>
                            <?php endwhile; ?>
                        </div>
                    
                    </div>
                
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="col-md-12 mt-5">
                    <div class="row">
                        <div class="col-md-4 noticias">
                            <h2 class="titulo">Notícias</h2>
                            <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'order' => 'DESC',
                                        'orderby' => 'date',
                                        'posts_per_page' => 1,
                                        'cat' => 6,
                                    );
                                    $wp_query = new WP_Query( $args );

                                    if( $wp_query->have_posts() ) :
                                        while( $wp_query->have_posts() ): $wp_query->the_post();?>
                                            <div class="destaque-home">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                    <div class="texto-destaque">
                                                        <h6 class="mt-3 titulo-destaque"><?php the_title(); ?></h6>
                                                        <?php the_excerpt(); ?> 
                                                        <div class="data">
                                                            <?php echo get_the_date( 'j \d\e F \d\e Y' ); ?> | <?php echo get_the_time( 'G:i' ); ?>
                                                        </div>
                                                    </div>
                                                    
                                                </a> 
                                            </div>  
                                    
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    
                                ;?>
                            
                        </div>
                        <div class="col-md-4 noticias">
                        
                            <div class="noticias-home">    
                            <div class="linha-direita"></div>  
                                <div class="noticias-home-resp">                  
                                    <?php
                                        $args = array(
                                            'post_type' => 'post',
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                            'posts_per_page' => 3,
                                            'category__not_in' => array('-6'),
                                            'tax_query' => array(
                                                array(
                                                    'category' => 'comunicados',
                                                )
                                            ),
                                            
                                            
                                        );
                                        $wp_query = new WP_Query( $args );

                                        if( $wp_query->have_posts() ) :
                                            while( $wp_query->have_posts() ): $wp_query->the_post();?>
                                                    <a class="mt-2" href="<?php the_permalink(); ?>">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <?php if ( has_post_thumbnail() ) { ?>
                                                                    <?php the_post_thumbnail(); ?> 
                                                                <?php 
                                                                    }else{ 
                                                                ?>
                                                                    <img class="img-padrao" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-padrao.png" alt="Imagem de plano de fundo azul com texto na cor branca escrito comunicado e simbolo de exclamação">
                                                                    <?php
                                                                } 
                                                                ?>  
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="titulo"><?php the_title(); ?></h6>
                                                                <div class="data">
                                                                    <?php echo get_the_date( 'j \d\e F \d\e Y' ); ?> | <?php echo get_the_time( 'G:i' ); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>                                 
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        
                                    ;?>                                
                                </div> 
                                <a class="comunicados" href="<?php bloginfo('url');?>/noticias">Mais Avisos</a>                       
                            </div>                        
                        </div>
                        <div class="col-md-4 fique-ligado">
                            <h2 class="center-img titulo">FIQUE POR DENTRO!</h2>
                            <ul class="row">
                                <?php
                                    while ( have_rows('fique_ligado', 110) ) : the_row();
                                        $titulo = get_sub_field('titulo');
                                        $link = get_sub_field('link');
                                        $cor = get_sub_field('cor_do_marcador');
                                    ?> 
                                        <li class="botoes-uteis col-md-6">                                        
                                            <a href="<?php echo $link; ?>" target="_blank">
                                                <span style="color:<?php echo $cor; ?>">&#9679;</span>
                                                <h6 class="titulo"><?php echo $titulo; ?></h6>
                                            </a>
                                        </li>                                 
                                            
                                    <?php
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <div class="container-fluid">
                                
                    <div class="areas">
                        <ul class="row mt-4 alinha-box-ajuda links-areas">
                                
                                <?php
                                    while ( have_rows('saiba_mais', 110) ) : the_row();
                                    $imagem = get_sub_field('icone');
                                    $titulo_ico = get_sub_field('titulo');
                                    $descricao_area = get_sub_field('descricao');
                                    $link_btn = get_sub_field('link_do_botao');
                                ?> 

                            <li class="col-md-3 texto-links">
                                
                                    <div class="box-borda-areas mb-3">
                                        
                                            <div>
                                                <img class="img-areas mt-3" src="<?php echo $imagem; ?>">

                                                <p class="titulo mt-2 mb-2"><?php echo $titulo_ico; ?></p>
                                                
                                            </div>
                                            
                                            <div class="descricao"><?php echo $descricao_area; ?></div>

                                            <div class="btn"><a class="saibamais" href="<?php echo $link_btn; ?>">Saiba Mais +</a></div>
                                            
                                        
                                    </div> 
                            </li>

                                <?php
                                        endwhile;
                                    ?>

                        </ul>   
                    </div>
            
            </div>
        
            <div class="container-fluid mt-5">
                <div class="row banner-inferior alinha-banner">
                    <?php
                        while ( have_rows('banner_lado_esquerdo', 110) ) : the_row();
                            $imagem = get_sub_field('banner');
                            $link = get_sub_field('link');
                        ?> 
                            
                            <a class="col-md-6" href="<?php echo $link; ?>" target="_blank"><img src="<?php echo $imagem; ?>" ></a>                  
                                
                        <?php
                        endwhile;
                    ?>
                    <?php
                        while ( have_rows('banner_lado_direito', 110) ) : the_row();
                            $imagem = get_sub_field('banner');
                            $link = get_sub_field('link');
                        ?> 
                            
                            <a class="col-md-6" href="<?php echo $link; ?>" target="_blank"><img src="<?php echo $imagem; ?>" ></a>                  
                                
                        <?php
                        endwhile;
                    ?>
                </div>                      
            </div>
            
        
    </div>

<?php get_footer(); ?>