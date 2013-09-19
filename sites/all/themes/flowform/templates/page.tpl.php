<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">
<div class="inner">
  
  <header class="header" id="header" role="banner">
      <div class="wrap">
          <div class="inner">
            <?php if ($logo): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
            <?php endif; ?>
        
            <?php if ($main_menu): ?>
                <nav id="main-menu" role="navigation" tabindex="-1">
                  <?php
                  // This code snippet is hard to modify. We recommend turning off the
                  // "Main menu" on your sub-theme's settings form, deleting this PHP
                  // code block, and, instead, using the "Menu block" module.
                  // @see https://drupal.org/project/menu_block
                  print theme('links__system_main_menu', array(
                    'links' => $main_menu,
                    'attributes' => array(
                      'class' => array('clearfix'),
                    ),
                  )); ?>
                </nav>
            <?php endif; ?>
          
          </div>
      </div>
  </header>

  <div id="main">
  <div class="wrap">
  
    <div id="content" class="column padding" role="main">
    
      <a id="main-content"></a>
	  <?php print render($tabs); ?>
      
      <?php if ($title): ?>
      	<?php
			switch($node->type){
				case 'product':
					$title = 'Products';
				break;
				case 'project':
					$title = 'Projects';
				break;
			}
		?>
        <h1 class="page__title title" id="page-title">
		<?php print $title; ?>
        </h1>
      <?php endif; ?>
      
      <?php print $messages; ?>
      <?php print render($page['help']); ?>
      
      <div class="inner">
	  	<?php print render($page['content']); ?>
      </div>
    </div>
  
  </div>
  </div>
  
  <?php print render($page['bottom']); ?>
  
  <?php include_once DRUPAL_ROOT . '/' . path_to_theme() . '/includes/include--social.inc';?>

  <?php print render($page['footer']); ?>
  
  <?php include_once DRUPAL_ROOT . '/' . path_to_theme() . '/includes/include--buckets.inc';?>
  
  <div id="footnote">
  	<div class="wrap">
    	&copy; <?php print date('Y'); ?> <span class="archivo">FLOW</span>FORM BIKE RAMPS, 8-1050 Millar Creek Road, Whistler, BC, V0N 1B1, CANADA
    </div>
  </div>


</div>
</div>


