<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="gradient-orange">Tropa do Fogo Amigo</h1>
                <p>A maior comunidade de gamers do Brasil se reúne aqui! Participe de eventos épicos, descubra novos jogos e faça parte da nossa gangue.</p>
                <a href="#" class="btn btn-primary">
                    <span>💬</span>
                    Entrar no Discord
                </a>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section style="padding: 5rem 0; background: hsl(var(--muted));">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Nossa Comunidade</h2>
                <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground)); max-width: 600px; margin: 0 auto;">
                    Somos uma família de gamers apaixonados por aventuras virtuais e amizades reais.
                </p>
            </div>

            <div class="grid grid-3">
                <div class="card" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">👥</div>
                    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">+5000 Membros</h3>
                    <p style="color: hsl(var(--muted-foreground));">Uma comunidade ativa e engajada de verdadeiros gamers</p>
                </div>

                <div class="card" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🎮</div>
                    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">Eventos Diários</h3>
                    <p style="color: hsl(var(--muted-foreground));">Campeonatos, raids e aventuras organizadas todo dia</p>
                </div>

                <div class="card" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏆</div>
                    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">Prêmios Épicos</h3>
                    <p style="color: hsl(var(--muted-foreground));">Recompensas incríveis para os melhores jogadores</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section style="padding: 5rem 0;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Últimas Notícias</h2>
                <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground));">
                    Fique por dentro de tudo que rola na comunidade
                </p>
            </div>

            <div class="grid grid-2">
                <?php
                $news_query = new WP_Query(array(
                    'post_type' => 'news',
                    'posts_per_page' => 4,
                    'post_status' => 'publish'
                ));

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'news-thumb'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.375rem; margin-bottom: 1rem;">
                    <?php endif; ?>
                    
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">
                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1rem;">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            <?php echo tdfa_format_date(get_the_date()); ?>
                        </span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                            Ler Mais
                        </a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?php echo home_url('/noticias'); ?>" class="btn btn-primary">Ver Todas as Notícias</a>
            </div>
        </div>
    </section>

    <!-- Featured Games -->
    <section style="padding: 5rem 0; background: hsl(var(--muted));">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Jogos em Destaque</h2>
                <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground));">
                    Os jogos favoritos da nossa comunidade
                </p>
            </div>

            <div class="grid grid-3">
                <?php
                $games_query = new WP_Query(array(
                    'post_type' => 'games',
                    'posts_per_page' => 3,
                    'meta_query' => array(
                        array(
                            'key' => '_game_featured',
                            'value' => '1',
                            'compare' => '='
                        )
                    )
                ));

                if ($games_query->have_posts()) :
                    while ($games_query->have_posts()) : $games_query->the_post();
                        $rating = get_post_meta(get_the_ID(), '_game_rating', true);
                        $category = get_post_meta(get_the_ID(), '_game_category', true);
                        $platform = get_post_meta(get_the_ID(), '_game_platform', true);
                        $download_link = get_post_meta(get_the_ID(), '_game_download_link', true);
                ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'game-thumb'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.375rem; margin-bottom: 1rem;">
                    <?php endif; ?>
                    
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">
                        <?php the_title(); ?>
                    </h3>
                    
                    <?php if ($rating) : ?>
                    <div style="margin-bottom: 0.5rem;">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span style="color: <?php echo $i <= $rating ? '#f59e0b' : '#d1d5db'; ?>;">★</span>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($category) : ?>
                    <span style="background: hsl(var(--primary)); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; margin-bottom: 0.5rem; display: inline-block;">
                        <?php echo esc_html($category); ?>
                    </span>
                    <?php endif; ?>
                    
                    <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1rem;">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <?php if ($platform) : ?>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            <?php echo esc_html($platform); ?>
                        </span>
                        <?php endif; ?>
                        
                        <?php if ($download_link) : ?>
                        <a href="<?php echo esc_url($download_link); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;" target="_blank">
                            Jogar Agora
                        </a>
                        <?php endif; ?>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?php echo home_url('/jogos'); ?>" class="btn btn-primary">Ver Todos os Jogos</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>