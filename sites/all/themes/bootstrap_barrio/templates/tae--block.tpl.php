<?php

/**
 * @file
 * Override of Bootstrap block.tpl.php.
 */

$padding_top='';

if($block_html_id=='block-block-1')
{
    $block_html_id = 'about';
   // $padding_top = 'style="padding-top: 100px;"';

}
if($block_html_id == 'block-block-3') {
    $block_html_id = 'service';
   //$padding_top = 'style="padding-top: 100px;"';
}


?>


<!--<section id="<?php //print $block_html_id; ?>" class="<?php //print $classes;?>"<?php //print $attributes; ?>>-->
<section id = "<?php print $block_html_id; ?>" class="<?php print $classes;?>" <?php print $attributes; ?><?php //print $padding_top; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2 class="mainlane-title"><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>


    <!--T2DM Carousel -->
    <?php if ($block_html_id == 'block-t2dm-carousel-t2dm-carousel'): ?>
        <?php print $content ?>
    <?php endif; ?>

    <!-- About block -->
    <?php if ($block_html_id == 'about'): ?>
        <div class="block-content mainlane-body"><?php print $content ?></div>
    <?php endif; ?>


    <!--<div class="block-content mainlane-body"><?php //print $content ?></div>-->
  <?php if($block_html_id == 'service'): ?>
      <?php //print $content ?>
      <div class="row" style="padding-top: 10px;" >
          <div class="col-xs-12 col-md-4" >
              <a href="#" class="thumbnail mainlane-body" ">
                  <p>Concrete pavement replacement</p>
              </a>
          </div>
          <div class="col-xs-12 col-md-4" >
              <a href="#" class="thumbnail mainlane-body"  >
                  <p>Asphalt Replacement</p>
              </a>
          </div>
          <div class="col-xs-12 col-md-4" >
              <a href="#" class="thumbnail mainlane-body">
                  Structural Concrete and Steel Repair
              </a>
          </div>
      </div>

      <div class="row">
          <div class="col-xs-12 col-md-4" >
              <a href="#" class="thumbnail mainlane-body"  >
                  Emergency Cleanup and Repair
              </a>
          </div>
          <div class="col-xs-12 col-md-4" >
              <a href="#" class="thumbnail mainlane-body"  >
                  Road Improvements and Realignments
              </a>
          </div>
          <div class="col-xs-12 col-md-4" style="height: 70px;">
              <a href="#" class="thumbnail mainlane-body" style="height: 100%;">
                  Bridge Maintenance
              </a>
          </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12" >

            <h2 class="mainlane-title">We response within 4 hrs and operate 24 hrs a day</h2>

        </div>

      </div>

  <?php endif; ?>

    <!-- Contact block -->
    <?php //if ($block_html_id == 'block-block-4'): ?>
        <div class="block-content"><?php print $block_html_id; ?></div>
    <?php //endif; ?>

</section> <!-- /.block -->
