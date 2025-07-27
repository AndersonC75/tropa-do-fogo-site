<?php get_header(); ?>

<main style="padding-top: 6rem;">
    <!-- Hero Section -->
    <section style="background: var(--gradient-gta); padding: 4rem 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 1rem;">Notícias TDFA</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                Fique por dentro de tudo que acontece na nossa comunidade e no mundo dos games
            </p>
        </div>
    </section>

    <!-- Featured News -->
    <?php
    $featured_news = new WP_Query(array(
        'post_type' => 'news',
        'posts_per_page' => 3,
        'meta_query' => array(
            array(
                'key' => '_news_featured',
                'value' => '1',
                'compare' => '='
            )
        )
    ));

    if ($featured_news->have_posts()) :
    ?>
    <section style="padding: 4rem 0;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 3rem;">Notícias em Destaque</h2>
            
            <div class="grid grid-2">
                <?php while ($featured_news->have_posts()) : $featured_news->the_post(); ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'news-thumb'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; height: 250px; object-fit: cover; border-radius: 0.375rem; margin-bottom: 1rem;">
                    <?php endif; ?>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="background: hsl(var(--primary)); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">
                            DESTAQUE
                        </span>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            <?php echo tdfa_format_date(get_the_date()); ?>
                        </span>
                    </div>
                    
                    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">
                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1rem;">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            Por <?php the_author(); ?>
                        </span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                            Ler Mais
                        </a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- All News -->
    <section style="padding: 4rem 0; background: hsl(var(--muted));">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 3rem;">Todas as Notícias</h2>
            
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $all_news = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => 9,
                'paged' => $paged,
                'post_status' => 'publish'
            ));

            if ($all_news->have_posts()) :
            ?>
            <div class="grid grid-3">
                <?php while ($all_news->have_posts()) : $all_news->the_post(); ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'news-thumb'); ?>" 
                             alt="<?php the_title(); ?>" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.375rem; margin-bottom: 1rem;">
                    <?php endif; ?>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="background: hsl(var(--secondary)); color: hsl(var(--secondary-foreground)); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">
                            NOTÍCIA
                        </span>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));">
                            <?php echo tdfa_format_date(get_the_date()); ?>
                        </span>
                    </div>
                    
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
                            Por <?php the_author(); ?>
                        </span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                            Ler Mais
                        </a>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <?php if ($all_news->max_num_pages > 1) : ?>
            <div style="text-align: center; margin-top: 3rem;">
                <?php
                echo paginate_links(array(
                    'total' => $all_news->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '← Anterior',
                    'next_text' => 'Próxima →',
                ));
                ?>
            </div>
            <?php endif; wp_reset_postdata(); ?>

            <?php else : ?>
            <p style="text-align: center; color: hsl(var(--muted-foreground));">
                Nenhuma notícia encontrada. Volte em breve para conferir as novidades!
            </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Newsletter -->
    <section style="padding: 4rem 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Fique por Dentro</h2>
            <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground)); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Junte-se ao nosso Discord para receber as últimas notícias e participar das discussões da comunidade
            </p>
            <a href="#" class="btn btn-primary">
                <span style="margin-right: 0.5rem;">💬</span>
                Entrar no Discord
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>