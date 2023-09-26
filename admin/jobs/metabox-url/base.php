<?php
// Função para exibir o conteúdo da metabox
function mostrar_conteudo_metabox_url( $post ) {
    get_template_part( 'admin/jobs/metabox-url/fields' );
}

require_once get_parent_theme_file_path( 'admin/jobs/metabox-url/save.php' );

// Adiciona a metabox para o Custom Post Type "jobs"
function adicionar_metabox_url() {
    add_meta_box(
        'metabox_url',
        'Destacar essa habilidade?',
        'mostrar_conteudo_metabox_url',
        'job',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'adicionar_metabox_url' );