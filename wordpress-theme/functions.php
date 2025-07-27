<?php
/**
 * TDFA Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function tdfa_theme_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tdfa-theme'),
    ));

    // Add image sizes
    add_image_size('game-thumb', 300, 200, true);
    add_image_size('news-thumb', 400, 250, true);
}
add_action('after_setup_theme', 'tdfa_theme_setup');

// Enqueue styles and scripts
function tdfa_theme_scripts() {
    wp_enqueue_style('tdfa-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('tdfa-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'tdfa_theme_scripts');

// Custom post type for Games
function tdfa_create_games_post_type() {
    register_post_type('games', array(
        'labels' => array(
            'name' => __('Jogos', 'tdfa-theme'),
            'singular_name' => __('Jogo', 'tdfa-theme'),
            'add_new' => __('Adicionar Novo', 'tdfa-theme'),
            'add_new_item' => __('Adicionar Novo Jogo', 'tdfa-theme'),
            'edit_item' => __('Editar Jogo', 'tdfa-theme'),
            'new_item' => __('Novo Jogo', 'tdfa-theme'),
            'view_item' => __('Ver Jogo', 'tdfa-theme'),
            'search_items' => __('Buscar Jogos', 'tdfa-theme'),
            'not_found' => __('Nenhum jogo encontrado', 'tdfa-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-games',
        'rewrite' => array('slug' => 'jogos'),
    ));
}
add_action('init', 'tdfa_create_games_post_type');

// Custom post type for News
function tdfa_create_news_post_type() {
    register_post_type('news', array(
        'labels' => array(
            'name' => __('Notícias', 'tdfa-theme'),
            'singular_name' => __('Notícia', 'tdfa-theme'),
            'add_new' => __('Adicionar Nova', 'tdfa-theme'),
            'add_new_item' => __('Adicionar Nova Notícia', 'tdfa-theme'),
            'edit_item' => __('Editar Notícia', 'tdfa-theme'),
            'new_item' => __('Nova Notícia', 'tdfa-theme'),
            'view_item' => __('Ver Notícia', 'tdfa-theme'),
            'search_items' => __('Buscar Notícias', 'tdfa-theme'),
            'not_found' => __('Nenhuma notícia encontrada', 'tdfa-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'menu_icon' => 'dashicons-admin-post',
        'rewrite' => array('slug' => 'noticias'),
    ));
}
add_action('init', 'tdfa_create_news_post_type');

// Add custom fields for games
function tdfa_add_game_meta_boxes() {
    add_meta_box(
        'game_details',
        'Detalhes do Jogo',
        'tdfa_game_details_callback',
        'games'
    );
}
add_action('add_meta_boxes', 'tdfa_add_game_meta_boxes');

function tdfa_game_details_callback($post) {
    wp_nonce_field('tdfa_save_game_details', 'tdfa_game_details_nonce');
    
    $category = get_post_meta($post->ID, '_game_category', true);
    $rating = get_post_meta($post->ID, '_game_rating', true);
    $platform = get_post_meta($post->ID, '_game_platform', true);
    $download_link = get_post_meta($post->ID, '_game_download_link', true);
    $featured = get_post_meta($post->ID, '_game_featured', true);
    
    echo '<table>';
    echo '<tr><td><label for="game_category">Categoria:</label></td>';
    echo '<td><input type="text" id="game_category" name="game_category" value="' . esc_attr($category) . '" /></td></tr>';
    echo '<tr><td><label for="game_rating">Avaliação (1-5):</label></td>';
    echo '<td><input type="number" id="game_rating" name="game_rating" min="1" max="5" value="' . esc_attr($rating) . '" /></td></tr>';
    echo '<tr><td><label for="game_platform">Plataforma:</label></td>';
    echo '<td><input type="text" id="game_platform" name="game_platform" value="' . esc_attr($platform) . '" /></td></tr>';
    echo '<tr><td><label for="game_download_link">Link de Download:</label></td>';
    echo '<td><input type="url" id="game_download_link" name="game_download_link" value="' . esc_attr($download_link) . '" /></td></tr>';
    echo '<tr><td><label for="game_featured">Destacado:</label></td>';
    echo '<td><input type="checkbox" id="game_featured" name="game_featured" value="1" ' . checked($featured, 1, false) . ' /></td></tr>';
    echo '</table>';
}

function tdfa_save_game_details($post_id) {
    if (!isset($_POST['tdfa_game_details_nonce']) || !wp_verify_nonce($_POST['tdfa_game_details_nonce'], 'tdfa_save_game_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('game_category', 'game_rating', 'game_platform', 'game_download_link', 'game_featured');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'tdfa_save_game_details');

// Format date in Portuguese
function tdfa_format_date($date) {
    $months = array(
        1 => 'janeiro', 2 => 'fevereiro', 3 => 'março', 4 => 'abril',
        5 => 'maio', 6 => 'junho', 7 => 'julho', 8 => 'agosto',
        9 => 'setembro', 10 => 'outubro', 11 => 'novembro', 12 => 'dezembro'
    );
    
    $day = date('d', strtotime($date));
    $month = $months[date('n', strtotime($date))];
    $year = date('Y', strtotime($date));
    
    return $day . ' de ' . $month . ' de ' . $year;
}

// Custom excerpt length
function tdfa_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'tdfa_excerpt_length');

// Custom excerpt more
function tdfa_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'tdfa_excerpt_more');
?>