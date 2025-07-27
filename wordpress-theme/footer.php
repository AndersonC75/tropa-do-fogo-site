<footer style="background: hsl(var(--card)); border-top: 1px solid hsl(var(--border)); padding: 3rem 0;">
    <div class="container">
        <div class="grid grid-2" style="margin-bottom: 2rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="TDFA Logo" style="width: 2.5rem; height: 2.5rem;">
                    <?php endif; ?>
                    <span class="gradient-orange" style="font-size: 1.5rem; font-weight: bold;">TDFA</span>
                </div>
                <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1rem;">
                    A maior comunidade de gamers do Brasil. Junte-se a nós e faça parte da Tropa do Fogo Amigo!
                </p>
                <div style="display: flex; gap: 1rem;">
                    <a href="#" style="color: hsl(var(--primary)); text-decoration: none;">Discord</a>
                    <a href="#" style="color: hsl(var(--primary)); text-decoration: none;">Instagram</a>
                    <a href="#" style="color: hsl(var(--primary)); text-decoration: none;">YouTube</a>
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <div>
                    <h4 style="font-weight: bold; margin-bottom: 1rem;">Navegação</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <a href="<?php echo home_url(); ?>" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Início</a>
                        <a href="<?php echo home_url('/jogos'); ?>" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Jogos Grátis</a>
                        <a href="<?php echo home_url('/noticias'); ?>" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Notícias</a>
                        <a href="#" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Eventos</a>
                    </div>
                </div>
                
                <div>
                    <h4 style="font-weight: bold; margin-bottom: 1rem;">Comunidade</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <a href="#" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Discord</a>
                        <a href="#" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Regras</a>
                        <a href="#" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Suporte</a>
                        <a href="#" style="color: hsl(var(--muted-foreground)); text-decoration: none;">Contato</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="border-top: 1px solid hsl(var(--border)); padding-top: 2rem; text-align: center;">
            <p style="color: hsl(var(--muted-foreground)); font-size: 0.875rem;">
                © <?php echo date('Y'); ?> TDFA - Tropa do Fogo Amigo. Todos os direitos reservados.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>