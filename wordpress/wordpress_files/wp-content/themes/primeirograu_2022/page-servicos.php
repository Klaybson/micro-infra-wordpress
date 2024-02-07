<?php get_header(); ?>

    <div class="container conteudo-interno">
        
        <div>
        <span class="marcador">●</span>
            <h2 class="titulo titulo-page"><?php the_title(); ?></h2>
        </div> 
        <div class="breadcrumb-portal mt-3 mb-4" typeof="BreadcrumbList">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
        </div>        

        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
            
            <?php the_content() ;?>

        <?php endwhile; endif; ?>
        
    </div>

<?php get_footer(); ?>