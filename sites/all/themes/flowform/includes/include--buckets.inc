<?php

// Get catalouge URL
$fids = db_query('SELECT field_catalogue_fid FROM {field_data_field_catalogue} n WHERE n.entity_id = :entity_id', array(':entity_id' => 21));
foreach( $fids as $fid){
	$fileID = $fid->field_catalogue_fid;
}
$catalogue = db_query('SELECT uri FROM {file_managed } n WHERE n.fid = :fid', array(':fid' => $fileID));
foreach( $catalogue as $cat){
	$uri = $cat->uri;
}
$catURL = file_create_url($uri);

// Get featured project 
$nids = db_query('SELECT field_featured_project_nid FROM {field_revision_field_featured_project} n WHERE n.entity_id = :entity_id', array(':entity_id' => 21));
foreach( $nids as $nid){
	$nodeID = $nid->field_featured_project_nid;
}
$projectURL = drupal_get_path_alias('node/' . $nodeID);

// Get featured video url
$vids = db_query('SELECT field_featured_video_value  FROM { field_data_field_featured_video} n WHERE n.entity_id = :entity_id', array(':entity_id' => 21));
foreach( $vids as $vid){
	$vidURL = $vid->field_featured_video_value;
}


?>

<div id="buckets" class="view">
	<div class="wrap padding">
    	<div class="inner views-row">
        	<?php
			  global $user;
			  if (in_array('FlowForm Admin', array_values($user->roles)) || in_array('administrator', array_values($user->roles))):
			  ?>
				<div class="views-field views-field-edit-node">
                	<span class="field-content"><a href="/node/21/edit">edit</a></span>
                </div>	
			 <?php endif ;?>
        	<ul class="nostyle layout-grid clearfix">
            	<li class="grid third">
                	<div class="inner">
                    	<a href="<?php print $catURL ?>" rel="external"><img src="/<?php print path_to_theme() ?>/images/bucket_catalogue.jpg" /></a>
                    </div>
                </li>
                <li class="grid third">
                	<div class="inner">
                    	<a href="<?php print $projectURL ?>"><img src="/<?php print path_to_theme() ?>/images/bucket_project.jpg" /></a>
                    </div>
                </li>
                <li class="grid third">
                	<div class="inner">
                    	<a href="<?php print $vidURL ?>" rel="external"><img src="/<?php print path_to_theme() ?>/images/bucket_video.jpg" /></a>
                    </div>
                </li>
            </ul>
        
        </div>
    </div>
</div>