<?php
// Função para salvar os dados da metabox
    function salvar_metabox_destaque( $post_id ) {
        if ( isset( $_POST['destaque'] ) ) {
            update_post_meta( $post_id, 'destaque', $_POST['destaque'] );
        }
    }
    add_action( 'save_post', 'salvar_metabox_destaque' );
