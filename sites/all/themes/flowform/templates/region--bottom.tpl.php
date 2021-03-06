<?php
/**
 * @file
 * Returns HTML for a region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728112
 */
?>
<?php if ($content): ?>
  <div id="page-bottom">
  	<div class="wrap padding">
		<div class="inner <?php print $classes; ?> clearfix">
			<?php print $content; ?>
		</div>
    </div>
  </div>
<?php endif; ?>
