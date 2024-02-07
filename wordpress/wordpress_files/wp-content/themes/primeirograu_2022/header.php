<!doctype html>
<html class="no-js" lang="pt-BR" xml:lang="pt-BR">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Portal do 1º Grau</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Remoção de link de pai -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/menu.js"></script>

    <!-- Script -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
    <!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR" async defer></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TDL8W7T');</script>
    <!-- End Google Tag Manager -->
	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fontawesome-free-5.15.1-web/css/all.css">

    <!-- Pushy Menu CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/pushy-1.4.0/css/pushy.css">

    <!-- Font-family -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto&display=swap" rel="stylesheet">
    
    <!-- CSS do Tema -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">

    <?php wp_head(); ?>
    
</head>

<body>

<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDL8W7T"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<noscript>
		Javascript desabilitado! Favor habilitar ou usar outro navegador.
</noscript>
	
	<a id="pojo-a11y-skip-content" class="pojo-skip-link pojo-skip-content" tabindex="1" accesskey="s" href="#content">Ir para o conteúdo</a>

    <header id="content">   
    <div class="menu-superior-2">
        <div class="container-fluid">   
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 menu-superior-left margin-menu"><?php wp_nav_menu(array('menu' => 'menu-superior-esquerdo',)); ?></div>
                        <div class="col-md-3 menu-superior-sistemas">
                            
                                <button class="btn btn-secondary dropdown-toggle alinha-btn-sites" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="fonte-combo">Sistemas do Judiciário </span> <span class="linha-vertical-menu-1"> </span>
                                </button>
                                <div class=" dropdown-menu">
                                    <?php wp_nav_menu(array('menu' => 'menu-superior-sistemas',)); ?>
                                </div>
                            
                        </div>
                        <div class="col-md-3 menu-superior-sistemas">
                            
                                <button class="btn btn-secondary dropdown-toggle alinha-btn-sites" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="fonte-combo">Sites do Judiciário </span> <span class="linha-vertical-menu-1"> </span>
                                </button>
                                <div class="dropdown-menu">
                                    <?php wp_nav_menu(array('menu' => 'menu-superior-sites',)); ?>
                                </div>
                            
                        </div>
                    </div>
                </div>
        </div>
            
    </div>
        <?php if ( is_home() ) { ;?>
            <div id="topo1" class="topo1-cor">           
                <div class="container-fluid">
                    <div class="row"> 
                        <div id="menu" class="col-md-1 col-sm-1">                  
                            <input class="" type="checkbox" id="control-nav" />

                            <label for="control-nav" class="control-nav">|</label>

                            <label for="control-nav" class="control-nav-close">X</label>

                            <nav class="pushy pushy-left" data-focus="#home-link">
                                <div class="pushy-interno">
                                    <div class="center-img logo-menu mt-4 padrao">
                                        <?php
                                                
                                            while (have_rows('cabecalho', 110 ) ): the_row();
                                            $img_logo = get_sub_field('logo_cabecalho');
                            
                                        ?>

                                            <a href="<?php bloginfo('url');?>">
                                                <img class="logo-topo-home" src="<?php echo $img_logo; ?>" alt="Logo da Diretoria de Primeiro Grau">
                                            </a>

                                        <?php endwhile;?>

                                        <h4 class="titulo-topo">Portal do 1º Grau</h4>
                                    </div>

                                    <?php wp_nav_menu(array('menu' => 'menu_principal',)); ?>
                                
                                </div>
                            </nav>
                        </div>

                        <div class="col-md-3 m-auto logo-topo-home">

                                <?php
                                            
                                    while (have_rows('cabecalho', 110 ) ): the_row();
                                    $img_logo = get_sub_field('logo_cabecalho');
                
                                ?>
                                        <a href="<?php bloginfo('url');?>">
                                        
                                            <img class="logo-topo-home" src="<?php echo $img_logo; ?>" alt="Logo da Diretoria de Primeiro Grau">

                                        </a>

                                <?php endwhile;?>
                        </div>

                        <div class="col-md-8 width-resp">
                            <div class="links-topo">
                                <?php wp_nav_menu(array('menu' => 'menu-secundario',)); ?>
                            </div>
                        </div>                 
                    </div> 
                    <div class="row">
                        <h1 class="titulo-topo m-0">Portal do 1º Grau</h1>
                    </div>
                    <div class="row">
                        <div id="busca-principal" class="offset-md-2 col-md-8 col-sm-12">
                            <div class="input-group">
                                <form class="busca-principal" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                    <div class="busca">							
                                        <input type="hidden" id="searchsubmit" value="Buscar" />
                                        <input type="text" value="" name="s" id="s" placeholder="Realize aqui sua BUSCA" class="input-campo-busca" />
                                        <button type="submit" class="btn-search btn btn-danger">
                                            BUSCAR
                                        </button>
                                    </div>
                                </form> 
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-5 alinha-cards">
                        <div class="col-md-12">
                        <div class="swiffy-slider slider-indicators-outside cards-topo slider-indicators-round">
                            <ul class="slider-container slider-item-show6 slider-nav-outside-expand slide">
                                <?php
                                    
                                    while (have_rows('cards_topo', 110 ) ): the_row();
                                    $imagem_card = get_sub_field('imagem_card');
                                    $titulo_card = get_sub_field('titulo_card');
                                    $link_card = get_sub_field('link_card')

                                ?>

                                <li>                                    
                                    <a href="<?php echo $link_card; ?>" target="_blank">
                                        <img class="img-card-topo" src="<?php echo $imagem_card; ?>" >
                                        <div>
                                            <h6 class="col-md-12"><?php echo $titulo_card; ?></h6>
                                        </div>
                                        
                                    </a>
                                </li>

                                <?php
                                    endwhile; 
                                ?>
                                
                                
                                
                            </ul>
                            <button type="button" class="slider-nav" aria-label="Go left"></button>
                            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
                            <div class="slider-indicators">
                                <?php
                                    
                                    while (have_rows('cards_topo', 110 ) ): the_row();

                                ?>

                                    <button aria-label="Go to slide"></button>

                                <?php
                                    endwhile; 
                                ?>
                            </div>
                        </div>
                        </div>  
                    </div>
                </div>  
            </div> 

        <?php } else { ;?>
            <div id="topo1" class="topo1-cor interno">           
                <div class="container-fluid">
                    <div class="col-md-12">
                    <div class="row"> 
                        <div id="menu" class="posicao-ico-menu col-md-1 col-sm-1">                  
                            <input class="" type="checkbox" id="control-nav" />

                            <label for="control-nav" class="control-nav">|</label>

                            <label for="control-nav" class="control-nav-close">X</label>

                            <nav class="pushy pushy-left" data-focus="#home-link">
                                <div class="pushy-interno">
                                    <div class="center-img logo-menu mt-4 padrao">
                                        <?php 
                                                while (have_rows('cabecalho', 110 ) ): the_row();
                                                $img_logo = get_sub_field('logo_cabecalho');
                                        ?>
    
                                            <a href="<?php bloginfo('url');?>">
                                                <img src="<?php echo $img_logo; ?>" alt="Logo da Diretoria de Primeiro Grau">
                                            </a>
    
                                            <?php endwhile;?>
                                        <h4 class="titulo-topo">Portal do 1º Grau</h4>
                                    </div>

                                    <?php wp_nav_menu(array('menu' => 'menu_principal',)); ?>
                                
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-2 margem-logo-interna logo-topo-interna">
                                    <?php
                                                            
                                        while (have_rows('cabecalho', 110 ) ): the_row();
                                        $img_logo = get_sub_field('logo_cabecalho');
                                            
                                    ?>
    
                                            <a href="<?php bloginfo('url');?>">
                                                <img src="<?php echo $img_logo; ?>" alt="Logo da Diretoria de Primeiro Grau">
                                            </a>
    
                                    <?php endwhile;?>
                        </div>
                        
                        <div class="col-md-7 width-resp">
                            <div class="links-topo">
                                <?php wp_nav_menu(array('menu' => 'menu-secundario',)); ?>
                            </div>
                        </div>
                        <div class="col-md-2 width-resp align-center">
                            <div id="busca-principal" class="busca-interno">
                                <div class="input-group">
                                    <form class="busca-principal-interna" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                        <div class="busca">							
                                            <input type="hidden" id="searchsubmit" value="Procurar no 1º Grau" />
                                            <input type="text" value="" name="s" id="s" placeholder="Realize a sua BUSCA" class="input-campo-busca" />
                                            
                                        </div>
                                    </form> 
                                </div>
                            </div> 
                        </div> 
                    </div>  
                    </div>
                </div>                             
            </div>                             
        <?php  } ;?>                       
                
    </header>

    <div class="conteudo">
        <div class="row">