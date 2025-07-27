<?php get_header(); ?>

<main style="padding-top: 6rem;">
    <?php while (have_posts()) : the_post(); ?>
    
    <article style="padding: 4rem 0;">
        <div class="container" style="max-width: 800px;">
            <!-- Back Link -->
            <div style="margin-bottom: 2rem;">
                <a href="<?php echo home_url('/noticias'); ?>" style="color: hsl(var(--primary)); text-decoration: none; font-size: 0.875rem;">
                    ← Voltar às Notícias
                </a>
            </div>
            
            <!-- Article Header -->
            <header style="text-align: center; margin-bottom: 3rem;">
                <div style="margin-bottom: 1rem;">
                    <span style="background: hsl(var(--primary)); color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 0.875rem;">
                        NOTÍCIA
                    </span>
                </div>
                
                <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem; line-height: 1.2;">
                    <?php the_title(); ?>
                </h1>
                
                <div style="display: flex; justify-content: center; align-items: center; gap: 1rem; color: hsl(var(--muted-foreground)); font-size: 0.875rem;">
                    <span>Por <?php the_author(); ?></span>
                    <span>•</span>
                    <span><?php echo tdfa_format_date(get_the_date()); ?></span>
                </div>
            </header>
            
            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
            <div style="margin-bottom: 3rem;">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                     alt="<?php the_title(); ?>" 
                     style="width: 100%; border-radius: 0.5rem; box-shadow: var(--shadow-dark);">
            </div>
            <?php endif; ?>
            
            <!-- Article Content -->
            <div style="font-size: 1.125rem; line-height: 1.8; margin-bottom: 3rem;">
                <?php the_content(); ?>
            </div>
            
            <!-- Article Footer -->
            <footer style="border-top: 1px solid hsl(var(--border)); padding-top: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <div>
                        <strong>Compartilhe esta notícia:</strong>
                    </div>
                    <div style="display: flex; gap: 1rem;">
                        <button onclick="navigator.share({title: '<?php echo esc_js(get_the_title()); ?>', url: '<?php echo esc_js(get_permalink()); ?>'})" class="btn" style="padding: 0.5rem 1rem; border: 1px solid hsl(var(--border)); background: transparent;">
                            📤 Compartilhar
                        </button>
                        <a href="#" class="btn btn-primary" style="padding: 0.5rem 1rem;">
                            💬 Discord
                        </a>
                    </div>
                </div>
                
                <!-- Author Info -->
                <div style="background: hsl(var(--muted)); padding: 1.5rem; border-radius: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <?php echo get_avatar(get_the_author_meta('ID'), 60, '', '', array('style' => 'border-radius: 50%;')); ?>
                        <div>
                            <h4 style="font-weight: bold; margin-bottom: 0.25rem;"><?php the_author(); ?></h4>
                            <p style="color: hsl(var(--muted-foreground)); font-size: 0.875rem;">
                                <?php echo get_the_author_meta('description') ?: 'Redator da TDFA'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </article>
    
    <!-- Related News -->
    <section style="padding: 4rem 0; background: hsl(var(--muted));">
        <div class="container">
            <h2 style="text-align: center; font-size: 2rem; font-weight: bold; margin-bottom: 3rem;">Notícias Relacionadas</h2>
            
            <?php
            $related_news = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($related_news->have_posts()) :
            ?>
            <div class="grid grid-3">
                <?php while ($related_news->have_posts()) : $related_news->the_post(); ?>
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>