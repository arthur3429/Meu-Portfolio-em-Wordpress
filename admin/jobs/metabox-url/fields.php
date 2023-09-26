<?php 

    //recupera o valor do campo 'url'

    $url = get_post_meta($post->ID, 'post_url', true);

?>

<style> 
    .admin-metabox-container input {
        width: 100%;
    }

</style>

<div class="admin-metabox-container">
   <p>Insira a URL do Projeto:</p>
    <input type="text" name="post_url" value="<?php echo $url; ?>">

</div>