<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php get_sidebar(); ?>
            <section id="content" class="col-md-8">
            	<header class="page">
					<h1><?php single_cat_title( '', true ); ?></h1>
				</header>
                <div class="breadcrumb-portal mt-3 mb-4" typeof="BreadcrumbList">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>
            </section>
        </div>
    </div>
<?php get_footer(); ?>