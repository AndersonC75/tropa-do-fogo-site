<?php get_header(); ?>

<main style="padding-top: 6rem;">
    <!-- Hero Section -->
    <section style="background: var(--gradient-gta); padding: 4rem 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 1rem;">Jogos Grátis</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                Descubra os melhores jogos gratuitos selecionados pela nossa comunidade
            </p>
        </div>
    </section>

    <!-- Featured Games -->
    <?php
    $featured_games = new WP_Query(array(
        'post_type' => 'games',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_game_featured',
                'value' => '1',
                'compare' => '='
            )
        )
    ));

    if ($featured_games->have_posts()) :
    ?>
    <section style="padding: 4rem 0;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 3rem;">Jogos em Destaque</h2>
            
            <div class="grid grid-3">
                <?php while ($featured_games->have_posts()) : $featured_games->the_post();
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
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <?php if ($platform) : ?>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            🖥️ <?php echo esc_html($platform); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <div style="display: flex; gap: 0.5rem;">
                        <?php if ($download_link) : ?>
                        <a href="<?php echo esc_url($download_link); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem; flex: 1; text-align: center;" target="_blank">
                            Jogar Agora
                        </a>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem; border: 1px solid hsl(var(--border)); text-decoration: none; color: hsl(var(--foreground));">
                            Detalhes
                        </a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- All Games -->
    <section style="padding: 4rem 0; background: hsl(var(--muted));">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 3rem;">Todos os Jogos</h2>
            
            <?php
            $all_games = new WP_Query(array(
                'post_type' => 'games',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            if ($all_games->have_posts()) :
            ?>
            <div class="grid grid-3">
                <?php while ($all_games->have_posts()) : $all_games->the_post();
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
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <?php if ($platform) : ?>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            🖥️ <?php echo esc_html($platform); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <div style="display: flex; gap: 0.5rem;">
                        <?php if ($download_link) : ?>
                        <a href="<?php echo esc_url($download_link); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem; flex: 1; text-align: center;" target="_blank">
                            Jogar Agora
                        </a>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem; border: 1px solid hsl(var(--border)); text-decoration: none; color: hsl(var(--foreground));">
                            Detalhes
                        </a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else : ?>
            <p style="text-align: center; color: hsl(var(--muted-foreground));">
                Nenhum jogo encontrado. Volte em breve para conferir as novidades!
            </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Community Call to Action -->
    <section style="padding: 4rem 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Sugerir um Jogo</h2>
            <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground)); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Conhece algum jogo incrível que deveria estar na nossa lista? Compartilhe com a comunidade!
            </p>
            <a href="#" class="btn btn-primary">
                <span style="margin-right: 0.5rem;">💬</span>
                Sugerir no Discord
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>