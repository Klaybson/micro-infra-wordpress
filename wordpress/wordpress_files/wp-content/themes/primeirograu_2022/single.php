<?php get_header(); ?>


    <div class="container conteudo-interno">
        <div>
            <h3 class="titulo titulo-page-post"><?php the_title(); ?></h3>
        </div> 
        <div class="breadcrumb-portal mt-3 mb-4" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>  

        <?php
            if( have_posts() ) :
                while( have_posts() ): the_post();?>
                    <div class="col-md-12 mt-3 img-interna">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="col-md-12 mt-3">
                        <?php the_content() ;?>
                    </div>             
                <?php
                endwhile;
                wp_reset_postdata();
            endif;                        
        ;?>
        
    </div>

<?php get_footer(); ?>