<?php /* Template Name: Agenda DPG */ ?>

<!doctype html>
<html class="no-js" lang="pt-BR" xml:lang="pt-BR">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Portal da Diretoria de Primeiro Grau</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="pragma" content="no-cache"><meta http-equiv="cache-control" content="no-store,no-cache"> -->

    <!-- Remoção de link de pai -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/menu.js"></script>

    <!-- Script -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR" async defer></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	

	
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
	
<noscript>
		Javascript desabilitado! Favor habilitar ou usar outro navegador.
</noscript>

    <div class="col-md-12">

       
            <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                
                

                    <?php the_content() ;?>

                

            <?php endwhile; endif; ?>
            
        
    </div>
