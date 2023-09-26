<?php
    //Remove a block library do wordpress
    function wpassist_remove_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );  
    } 
    add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

    //Remove a barra de admin que fica no topo do site, chatão
    add_filter('show_admin_bar', '__return_false');

    //Adiciona suporte a thumbnails
    add_theme_support('post-thumbnails');


    //Enfileira meus scripts
    function enqueue_my_scripts() {

        $versao_do_tema = wp_get_theme()->get('Version');


        //JS e CSS do Flickity (lib do slider)
        wp_enqueue_script('flickity-js', get_template_directory_uri() . '/assets/libs/flickity/flickity.pkgd.min.js', array(), $versao_do_tema, true);
        wp_enqueue_style('flickity-css', get_template_directory_uri() . '/assets/libs/flickity/flickity.min.css', array(), $versao_do_tema, false);

        // Meu JS e meu CSS
        wp_enqueue_style('main-stylesheet', get_stylesheet_uri(), array(), $versao_do_tema, false);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $versao_do_tema, true);

        //CSS e JS do rteam-notify (lib da notificação)
        wp_enqueue_script('rteam-notify-script', get_template_directory_uri() . '/assets/libs/rteam-notify/rteam_native_notify2.js', array('jquery'), $versao_do_tema, true);
        wp_enqueue_style('rteam-notify-styles', get_template_directory_uri() . '/assets/libs/rteam-notify/rteam_native_notify2.css', array(), $versao_do_tema, false);


    }

    add_action('wp_enqueue_scripts', 'enqueue_my_scripts');


    //Registra o Post Type Habilidades
    function register_skills_post_type() { 
        $labels = [
            'name' => 'Habilidades',
            'singular_name' => 'Habilidade',
            'add_new' => 'Adicionar Nova',
            'add_new_item' => 'Adicionar Nova Habilidade',
            'edit_item' => 'Editar Habilidade',
            'new_item' => 'Nova Habilidade',
            'view_item' => 'Ver Habilidade',
            'search_items' => 'Buscar Habilidades',
            'not_found' => 'Nenhuma Habilidade Encontraada',
            'not_found_in_trash' => 'Nenhuma Habilidade encontrada na lixeira',
            'menu_name' => 'Minhas Habilidades'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-plus-alt',
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'skill'),
            'template' => array(
                array('single-skill.php')
            ),
            'capability_type' => 'page',
            'hierarchical' => true,
        ];

        register_post_type('skill', $args);
    }

    add_action('init', 'register_skills_post_type');

    //Chama a metabox que define se a  habilidade ficará em destaque
    require_once get_parent_theme_file_path('admin/skills/metabox-destaque/base.php');


    //Registra o Post Type Trabalhos
    function register_jobs_post_type() { 
        $labels = [
            'name' => 'Trabalhos',
            'singular_name' => 'Trabalho',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar Novo Trabalho',
            'edit_item' => 'Editar Trabalho',
            'new_item' => 'Novo Trabalho',
            'view_item' => 'Ver Trabalho',
            'search_items' => 'Buscar Trabalhos',
            'not_found' => 'Nenhum Trabalho Encontrado',
            'not_found_in_trash' => 'Nenhum Trabalho encontrado na lixeira',
            'menu_name' => 'Meus Trabalhos'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-plus-alt',
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'job'),
            'template' => array(
                array('single-job.php')
            ),
            'capability_type' => 'page',
            'hierarchical' => true,
        ];

        register_post_type('job', $args);
    }

    add_action('init', 'register_jobs_post_type');

    //Chama a metabox que armazena a url do projeto
    require_once get_parent_theme_file_path('admin/jobs/metabox-url/base.php');

?>