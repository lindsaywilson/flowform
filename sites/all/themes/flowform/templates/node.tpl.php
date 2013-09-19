<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title && $node->type != 'webform'): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
  
  <?php if($node->type == 'project'): ?>
  	<div id="page-header">
    	<?php
		print '<h2>'.$title.'<span>'.$node->field_location['und'][0]['value'].'</span></h2>'; 
		?>
    </div>
    <?php 
	if(isset($content['field_images'])){
		print '<div class="images">';
		print render($content['field_images']);
		print '</div>';
	} ?>
  <?php endif; ?>
  
  <div class="right">
    <?php
	if($node->type == 'product'){ 
		print '<h2>FlowForm '.$title.'<span>Item #'.$node->field_page_heading['und'][0]['value'].'</span></h2>'; 
	}
    if(isset($content['field_page_heading']) && $node->type != 'product'){
		print render($content['field_page_heading']);
	}
	if($node->type == 'product'){ 
		print '<h4>Features</h4>'; 
	}
	
	if($node->type != 'webform'){
		print render($content['body']);
	}
	
	if($node->type == 'webform'){
		print render($content);
	}
	
	print render($content['field_video']);
	if($node->type == 'product'){ 
		print '<h4>Options</h4>'; 
		print render($content['field_text']);
	}
	
	if($node->type == 'product'):
	?>
    <div class="footnote">
    	<p>Every project is unique and required special considerations. <a href="/contact">Contact us</a> today to determine what the best solutions are for your park!</p>
    </div>
    <?php endif; ?>
  </div>
  
  <div class="left">
	<?php
	if($node->type == 'webform'){
		print render($content['body']);
	}
	
	if(isset($content['field_images']) && $node->type == 'product'){
		print '<div class="images">';
		print render($content['field_images']);
		print '</div>';
	}
	if(isset($content['field_image'])){
		print '<div class="image">';
		print render($content['field_image']);
		print '</div>';
	}
	if($node->type == 'project'){
		print '<div class="field field-name-field-title field-label-above">
		<div class="field-label"><h4>Project Name</h4></div>
		<div class="field-item">
		'.$title.'
		</div></div>';
	}
	if(isset($content['field_images']) && $node->type == 'project'){
		print render($content['field_client']);
		print render($content['field_gc']);
		print render($content['field_budget']);
		print render($content['field_text']);
	}
	?>
  </div>
  
  
  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>

</article>
