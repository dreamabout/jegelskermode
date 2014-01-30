<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
    <?php while($mb->have_fields_and_multi('docs')): ?>
    <?php $mb->the_group_open(); ?>
 
        
 
        <?php $mb->the_field('title'); ?>
        <label for="<?php $mb->the_name(); ?>">Title</label>
        <p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>	   
	   
	   
        <?php $mb->the_field('imgurl'); ?>
        <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Indsæt i galleri')->setTab('type'); ?>
 
        <p>
            <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?><a href="#" class="dodelete button">Fjern</a>
        </p>
 

 
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
 
    <p style="margin-bottom:15px; padding-top:5px;">
	     <a href="#" class="docopy-docs button">Tilføj en mere til listen</a>
		<a href="#" class="dodelete-docs button">Fjern alle</a>
</p>
 
</div>
