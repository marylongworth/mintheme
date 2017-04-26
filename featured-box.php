<?php
/* 	
 * Min Theme's Featured Box to show under the slider on the front page
*/
?>

<div id="featured-boxes">


<?php  foreach (range(1, 4) as $fboxn2) { ?>
<span class="featured-box"> 
<img class="box-icon" src="<?php echo esc_url(mintheme_get_option('featured-image2' . $fboxn2, get_template_directory_uri() . '/images/featured-image' . $fboxn2 . '.png')) ?>"/>
<h3 class="featured-box2"><?php echo esc_textarea(mintheme_get_option('featured-title2' . $fboxn2, __('mintheme Theme for Business','mintheme'))); ?></h3>
<div class="clear"> </div>
<p><?php echo esc_textarea(mintheme_get_option('featured-description2' . $fboxn2 , __('mintheme is a clean Responsive Theme theme','mintheme'))); ?></p>

</span>

<?php }  ; ?>



</div> <!-- featured-boxes -->