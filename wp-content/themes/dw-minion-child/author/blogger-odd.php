<?php 
$blogger = $GLOBALS["blogger"];
$link = get_author_posts_url( $blogger->ID);
$avatar = get_avatar($blogger->user_email, 280, '', $blogger->first_name);
$avatar = '<a href="'.$link.'" title="Se indlæg for blogger" class="block">' . $avatar . '</a>';
?>
<div class="row-fluid author">
    <div class="span8">
        <h3><a href="<?=$link;?>" title="Se indlæg for blogger" class="block"><?= $blogger->first_name;?></a></h3>
        <strong><a href="<?=$link;?>" title="Se indlæg for blogger" class="block"><?= $blogger->title; ?> <?php if($blogger->category) :?> | <?= $blogger->category; ?><?php endif; ?></a></strong>
        <p><?php echo $blogger->description; ?></p>
    </div>
    <div class="span4"> <?php echo $avatar; ?></div>
</div>