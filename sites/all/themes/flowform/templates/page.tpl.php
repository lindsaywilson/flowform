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
            <div id="menu-toggle"><a class="open" href="#">Menu</a></div>
       	  </div>
          
                <nav id="main-menu" role="navigation" tabindex="-1">
                  <?php print render($page['nav']); ?>
                </nav>
          
          
      </div>
  </header>

  <div id="main">
  <div class="wrap">
  
    <div id="content" class="column padding" role="main">
    
      <a id="main-content"></a>
	  <?php print render($tabs); ?>
      
      <?php if ($title): ?>
      	<?php
		if(isset($node)){
			switch($node->type){
				case 'product':
					$title = 'Products';
				break;
				case 'project':
					$title = 'Projects';
				break;
			}
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
    	&copy; <?php print date('Y'); ?> <span class="archivo">FLOW</span>FORM BIKE RAMPS, Whistler, BC, CANADA
    </div>
  </div>


</div>
</div>


