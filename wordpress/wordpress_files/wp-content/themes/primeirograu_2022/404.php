<?php get_header(); ?>

    <div class="container conteudo-interno">
        
        <div>
        <span class="marcador">●</span>
            <h2 class="titulo titulo-page"><?php echo esc_html__( 'HTTP 404 ' ); ?></h2>
        </div> 
        <div class="breadcrumb-portal mt-3 mb-4" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <div class="row mt-4">

            <div class="col-md-6">
                <a href="<?php echo '/primeirograu'; ?>">
                    <div class="boxes-404">
                        <div class="boxes-titulo">Home - Portal da Diretoria de Primeiro Grau</div>
                        <div class="boxes-corpo">Você pode ir na página principal do portal</div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="<?php echo 'http://www5.tjba.jus.br/portal/'; ?>">
                    <div class="boxes-404">
                        <div class="boxes-titulo">Site Oficial PJBA</div>
                        <div class="boxes-corpo">Portal principal do Poder Judiciário da Bahia</div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="<?php echo '/corregedoria'; ?>">
                    <div class="boxes-404">
                        <div class="boxes-titulo">Home - Portal da Corregedoria</div>
                        <div class="boxes-corpo">Você pode ir na página principal do portal</div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="<?php echo 'http://www7.tjba.jus.br/ouvidoria_web/esic.wsp'; ?>">
                    <div class="boxes-404">
                        <div class="boxes-titulo">Solicitações de Informações (SIC)</div>
                        <div class="boxes-corpo">Você pode solicitar informações pelo nosso SIC</div>
                    </div>
                </a>
            </div>    

            <div class="col-md-6">
                <a href="<?php echo 'http://www5.tjba.jus.br/portal/contato/'; ?>">
                    <div class="boxes-404">
                        <div class="boxes-titulo">Contatos</div>
                        <div class="boxes-corpo">Encontre um contato para te ajudar</div>
                    </div>
                </a>
            </div>

        </div>
        
    </div>

<?php get_footer(); ?>