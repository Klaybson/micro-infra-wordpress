<?php get_header(); ?>

    <div class="col-md-12 mt-4">
        <div>
            <h3 class="titulo titulo-page"><?php the_title(); ?></h3>
        </div> 
        <div class="breadcrumb-portal mt-3" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <div>
            <ul class="row noticias mt-4">
            <?php
                    $args = array(
                        'post_type' => 'post',
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'posts_per_page' => 3,
                        'cat' => 6,
                    );
                    
                    $wp_query = new WP_Query( $args );

                    if( $wp_query->have_posts() ) :
                        while( $wp_query->have_posts() ): $wp_query->the_post();?>
                            <li class="col-md-4 destaque-home lista-noticias-destaque">
                            
                                <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) { ?>
                                        <?php the_post_thumbnail(); ?> 
                                    <?php 
                                        }else{ 
                                    ?>
                                        <img class="img-padrao" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-padrao-menor.png" alt="Imagem de plano de fundo azul com texto na cor branca escrito comunicado e simbolo de exclamação">
                                        <?php
                                    } 
                                    ?>  
                                    <div class="texto-destaque">
                                        <h6 class="mt-3 titulo"><?php the_title(); ?></h6>
                                        
                                        <div class="data-interna">
                                            <?php echo get_the_date( 'j \d\e F \d\e Y' ); ?> | <?php echo get_the_time( 'G:i' ); ?>
                                        </div>
                                    </div>
                                    
                                </a> 
                            
                            </li> 
                    
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    
                ;?>
            </ul>
        </div>
                                
                    
            

        <div class="conteudo col-md-12">

            
            <div class="row">
                <div class="col-md-9 mt-4">

                    <div class="row noticias-outras mb-4">
                        <h5 class="titulo-outras-noticias">Outras notícias</h5>
                        <div class="col-md-10 linha-outras-noticias"></div>
                    </div>

                    <div id="misha_posts_wrap">

                        <div id="response">
                            <div class="outras-noticias">   
                                             
                                <?php
                                
                                    $args = array(
                                        'post_type' => 'post',
                                        'order' => 'DESC',
                                        'orderby' => 'date',
                                        'posts_per_page' => 3,
                                        'category__not_in' => array('-6'),
                                        'cat' => 8,
                                        
                                    );
                                    $wp_query = new WP_Query( $args );

                                    if( $wp_query->have_posts() ) :
                                        while( $wp_query->have_posts() ): $wp_query->the_post();?>
                                                
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
                                    
                                ;?>  
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <?php  

                                    global $wp_query;

                                    if (  $wp_query->max_num_pages > 1 ) :
                                        echo '<div id="misha_loadmore">Ver mais notícias</div>'; // you can use <a> as well
                                    endif;
                                ;?>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="box-mais-lidas">

                    <h5 class="titulo-outras-noticias-lidas">Notícias mais lidas</h5>

                    <?php $popular = new WP_Query(array( 'posts_per_page'=>3, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'category' => 'noticias', 'order'=>'DESC'));
                    while ($popular->have_posts()) : $popular->the_post(); ?>

                    <div class="col-md-11 container">
                    <a  href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>">
                            <?php the_post_thumbnail('lidas'); ?>  

                            <h6 class="titulo-mais-lidas mt-4 mb-2"><?= get_the_title(); ?></h6>

                    </a>

                    <div class="linha-separacao"></div>

                    </div>

                        <?php endwhile; wp_reset_query(); wp_reset_postdata(); ?>

                    </div>
                </div>

            </div>

        </div>
        
    </div>

<?php get_footer(); ?>


