<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 //dpm($view);

?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php
  switch($view->name){
	case 'profiles':
		$classes_array[$id] .= ' grid half';
		break;
	case 'products':
	case 'projects':
		$classes_array[$id] .= ' grid third';
		break;
  }
  $classes_array[$id] .= ' clearfix';
  ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <div class="inner">
		<?php print $row; ?>
    </div>
  </div>
<?php endforeach; ?>
