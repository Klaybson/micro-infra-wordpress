            </div>
        </div>


        <footer class="rodape fundo-azul pb-4">
            <div class="scroll">
                <a href="#"><i class="fas fa-share"></i></a>                
            </div>
            <div class="col-md-8 offset-md-2 col-sm-12">

                            <?php
                                    
                                    while (have_rows('rodape', 110 ) ): the_row();
                                    $imagem_tj = get_sub_field('logo_rodape');
                                    $marcas = get_sub_field('logo_rodape_secundario');
                                    $endereco = get_sub_field('endereco');
                                    $selo = get_sub_field('selo');
        
                            ?>
           
                <div class="row">
                    <div class="col-md-8 col-sm-12 logo-rodape">
                        <a href="<?php bloginfo('url');?>">
                            <img src="<?php echo $imagem_tj; ?>" alt="Logo da Diretoria de Primeiro Grau">
                        </a>

                        <div class="logos-rodape-secundarias">
                            <img src="<?php echo $marcas; ?>" alt="Marcas">
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-12 menu-rodape">
                        <?php wp_nav_menu(array('menu' => 'rodape',)); ?>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-12 endereco-rodape">
                        <span><?php echo $endereco; ?>
                        </span>
                    </div>
                </div>

                <?php endwhile;?>

                <div class="linha-rodape"></div>
                <div class="redes mt-2">
                    <div class="copyright">
                        <span><strong>© Poder Judiciário do Estado da Bahia,</strong> Inc. 2022. <br>
                        </span>
                    </div>
                    
                    <div class="redes-sociais">
                        
                        <div class="container">
                            <p class="margem-redes-sociais"><strong>Redes Sociais</strong></p>

                            <ul class="links-uteis-ul"> 
                                <?php
                                
                                    while (have_rows('redes_sociais', 110 ) ): the_row();
                                    $imagem_rede = get_sub_field('imagem_rede_social');
                                    $link_rede = get_sub_field('link_redes_sociais')

                                ?>

                                <li>                                    
                                    <a href="<?php echo $link_rede; ?>" target="_blank"><img src="<?php echo $imagem_rede; ?>" ></a>
                                </li>

                                <?php
                                    endwhile; 
                                ?>
                            </ul>
                        </div>                    
                    </div>   
                </div>
            </div> 
        </footer>
        
        
        <?php wp_footer(); ?>
        
    </body>
</html>