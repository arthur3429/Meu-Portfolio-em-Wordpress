<?php
    $title          =   get_the_title();
    $description    =   get_the_excerpt();
    $thumbnail      =   get_the_post_thumbnail_url();
    $permalink      =   get_post_meta(get_the_ID(), 'post_url', true);
?>
<div class="jobs-card">
    <div class="circles">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <a href="<?php echo $permalink; ?>" target="_blank">
        <img
            src="<?php echo $thumbnail; ?>"
            alt="Imagem de destaque do post de <?php echo $title; ?>"
            loading="lazy"
        />
    </a>
    <div class="job-description">
        <p><strong><?php echo $title; ?></strong></p>
        <p><?php echo $description; ?></p>
    </div>
</div>