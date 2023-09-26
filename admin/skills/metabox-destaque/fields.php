<?php 

    //recupera o valor do campo 'destaque'

    $destaque = get_post_meta($post->ID, 'destaque', true);

?>

<div class="admin-metabox-container">
   <p>Deseja destacar essa Habilidade?</p>
    <label>
        <input type="radio" name="destaque" value="sim" <?php checked( $destaque, 'sim' ); ?>>
        Sim
    </label>
    <label>
        <input type="radio" name="destaque" value="nao" <?php checked( $destaque, 'nao' ); ?>>
        Não
    </label>
</div>