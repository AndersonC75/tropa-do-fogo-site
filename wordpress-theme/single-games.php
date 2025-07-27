<?php get_header(); ?>

<main style="padding-top: 6rem;">
    <?php while (have_posts()) : the_post();
        $rating = get_post_meta(get_the_ID(), '_game_rating', true);
        $category = get_post_meta(get_the_ID(), '_game_category', true);
        $platform = get_post_meta(get_the_ID(), '_game_platform', true);
        $download_link = get_post_meta(get_the_ID(), '_game_download_link', true);
    ?>
    
    <article style="padding: 4rem 0;">
        <div class="container">
            <div class="grid grid-2" style="gap: 3rem; align-items: start;">
                <!-- Game Image -->
                <div>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; border-radius: 0.5rem; box-shadow: var(--shadow-dark);">
                    <?php endif; ?>
                </div>
                
                <!-- Game Details -->
                <div>
                    <div style="margin-bottom: 1rem;">
                        <a href="<?php echo home_url('/jogos'); ?>" style="color: hsl(var(--primary)); text-decoration: none; font-size: 0.875rem;">
                            ← Voltar aos Jogos
                        </a>
                    </div>
                    
                    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;"><?php the_title(); ?></h1>
                    
                    <?php if ($rating) : ?>
                    <div style="margin-bottom: 1rem;">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span style="color: <?php echo $i <= $rating ? '#f59e0b' : '#d1d5db'; ?>; font-size: 1.5rem;">★</span>
                        <?php endfor; ?>
                        <span style="margin-left: 0.5rem; color: hsl(var(--muted-foreground));">
                            (<?php echo esc_html($rating); ?>/5)
                        </span>
                    </div>
                    <?php endif; ?>
                    
                    <div style="display: flex; gap: 1rem; margin-bottom: 2rem;">
                        <?php if ($category) : ?>
                        <span style="background: hsl(var(--primary)); color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 0.875rem;">
                            <?php echo esc_html($category); ?>
                        </span>
                        <?php endif; ?>
                        
                        <?php if ($platform) : ?>
                        <span style="background: hsl(var(--muted)); color: hsl(var(--muted-foreground)); padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 0.875rem;">
                            🖥️ <?php echo esc_html($platform); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <div style="font-size: 1.125rem; line-height: 1.7; margin-bottom: 2rem;">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if ($download_link) : ?>
                    <div style="display: flex; gap: 1rem;">
                        <a href="<?php echo esc_url($download_link); ?>" class="btn btn-primary" target="_blank" style="padding: 1rem 2rem; font-size: 1rem;">
                            🎮 Jogar Agora
                        </a>
                        <button onclick="navigator.share({title: '<?php echo esc_js(get_the_title()); ?>', url: '<?php echo esc_js(get_permalink()); ?>'})" class="btn" style="padding: 1rem 2rem; font-size: 1rem; border: 1px solid hsl(var(--border)); background: transparent;">
                            📤 Compartilhar
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>
    
    <!-- Related Games -->
    <section style="padding: 4rem 0; background: hsl(var(--muted));">
        <div class="container">
            <h2 style="text-align: center; font-size: 2rem; font-weight: bold; margin-bottom: 3rem;">Jogos Relacionados</h2>
            
            <?php
            $related_games = new WP_Query(array(
                'post_type' => 'games',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand'
            ));

            if ($related_games->have_posts()) :
            ?>
            <div class="grid grid-3">
                <?php while ($related_games->have_posts()) : $related_games->the_post();
                    $related_rating = get_post_meta(get_the_ID(), '_game_rating', true);
                    $related_category = get_post_meta(get_the_ID(), '_game_category', true);
                    $related_platform = get_post_meta(get_the_ID(), '_game_platform', true);
                    $related_download = get_post_meta(get_the_ID(), '_game_download_link', true);
                ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'game-thumb'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.375rem; margin-bottom: 1rem;">
                    <?php endif; ?>
                    
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">
                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <?php if ($related_rating) : ?>
                    <div style="margin-bottom: 0.5rem;">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span style="color: <?php echo $i <= $related_rating ? '#f59e0b' : '#d1d5db'; ?>;">★</span>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                    
                    <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1rem;">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%; text-align: center; padding: 0.75rem;">
                        Ver Detalhes
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>