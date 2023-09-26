<?php
    $title          =   get_the_title();
    $description    =   get_the_excerpt();
    $thumbnail      =   get_the_post_thumbnail_url();
    $destaque       =   get_post_meta(get_the_ID(), 'destaque', true);

?>

<div class="skill-card <?php if($destaque == 'sim') echo 'show-card'; ?>">
    <picture>
        <img src="<?php echo $thumbnail; ?>" alt='<?php echo "Ícone da tecnologia $title"?>' />
    </picture>
    <div class="card-description">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $description; ?></p>
    </div>
</div>