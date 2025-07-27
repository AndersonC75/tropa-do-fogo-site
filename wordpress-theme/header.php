<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="TDFA Logo">
                <?php endif; ?>
                
                <div>
                    <div class="logo-text gradient-orange">TDFA</div>
                    <div style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); display: none;">
                        @media (min-width: 768px) { display: block; }
                        Tropa do Fogo Amigo
                    </div>
                </div>
            </a>
            
            <nav class="nav">
                <a href="<?php echo home_url(); ?>">Início</a>
                <a href="<?php echo home_url(); ?>#community">Comunidade</a>
                <a href="<?php echo home_url('/jogos'); ?>">Jogos Grátis</a>
                <a href="<?php echo home_url('/noticias'); ?>">Notícias</a>
                <a href="<?php echo home_url(); ?>#events">Eventos</a>
            </nav>
            
            <a href="#" class="btn btn-primary">
                <span style="margin-right: 0.5rem;">💬</span>
                Entrar no Discord
            </a>
        </div>
    </div>
</header>