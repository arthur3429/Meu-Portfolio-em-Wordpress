<?php
// Função para salvar os dados da metabox
    function salvar_metabox_url( $post_id ) {
        if ( isset( $_POST['post_url'] ) ) {
            update_post_meta( $post_id, 'post_url', $_POST['post_url'] );
        }
    }
    add_action( 'save_post', 'salvar_metabox_url' );
