<?php
// Função para exibir o conteúdo da metabox
function mostrar_conteudo_metabox_destaque( $post ) {
    get_template_part( 'admin/skills/metabox-destaque/fields' );
}

require_once get_parent_theme_file_path( 'admin/skills/metabox-destaque/save.php' );

// Adiciona a metabox para o Custom Post Type "Skills"
function adicionar_metabox_destaque() {
    add_meta_box(
        'metabox_destaque',
        'Destacar essa habilidade?',
        'mostrar_conteudo_metabox_destaque',
        'skill',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'adicionar_metabox_destaque' );