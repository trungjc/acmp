<?php 
$file = basename($_SERVER['PHP_SELF']);

$video_id = isset($globalVideoId) ? $globalVideoId : '';

//echo $file;
?>
<header id="header">  
    <div class="inner">
      <div class="up_header">
            <div class="div_logo">
                <a class="a_logo" href="<?php echo $domain ?>">
                    <img src="<?php echo $rootimg;?>logo-v.svg" class="logo_tab_up">
                    <img src="<?php echo $rootimg;?>logo.svg" class="logo_mobile">
                </a>
                <div class="download_report">
                    <!-- <a href="<?php echo $root?>assets/src/AMPC-SR16-Sustainability-Report.pdf" class="btn-download btn-am" style="display:inline-block;">Download Report</a> -->
                    <a href="<?php echo $root?>assets/src/AMPC-SR16-Sustainability-Report.pdf" class="btn-download btn-am" style="display:inline-block;" target="_blank">Download Report</a>
                </div>
            </div>
      </div>
      <!-- Menu desktop -->
      <ul class="ul ul_menu tab_menu_up" id="ul_menu">
          <!-- about -->
        <?php if($file === 'about.php') { ?>
          <li class="active">
        <?php } else{ ?>
          <li>
        <?php } ?>
              <a href="<?php echo $domain ?>/about.php" class="main-nav">
                  About <span>AMPC</span>
              </a>
          </li>
          <!-- -->
          <?php if($file == 'where-to-next.php' || $file == 'welcome.php' || $file == 'international-competition.php' || $file == 'regulatory-environment.php' || $file == 'changing-consumption-patterns.php' || $file == 'value-chain-integration.php' || $file == 'social-licence-to-operate.php' || $file == 'climate-change.php') { ?>
              <li class="hasChild active">
            <?php } else{ ?>
              <li class="hasChild">
            <?php } ?>
           
              <a href="#" class="main-nav">
                  <span>The</span> Issues
                  <span class="row-down"></span>
              </a>
              <ul class="ul ul_child sub-nav">
                  <?php foreach($nav as $key => $link): ?>
                    <?php
                    $class = '';
                    if ($key == 'welcome') {
                      if ($file == $link['file'] && $video_id == $link['video_id']) {
                        $class = 'active';
                      }
                    } else {
                      if ($file == $link['file'] || $video_id == $link['video_id']) {
                        $class = 'active';
                      }
                    }
                    ?>
                    <li class="<?php echo $class; ?>">
                      <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    </li>
                  <?php endforeach; ?>
                  <li class="close-li">
                      <img src="<?php echo $rootimg;?>close.svg" class="img-close" />
                  </li>
              </ul>
          </li>
           <?php if($file === 'contact.php') { ?>
          <li class="active">
        <?php } else{ ?>
          <li>
        <?php } ?>
              <a href="<?php echo $domain ?>/about.php#contact-form" class="main-nav">
                  Contact <span>us</span>
              </a>
          </li>
          <li>
              <a href="<?php echo $root; ?>assets/src/2897-AMPC-GRI-Index.pdf" class="main-nav" target="_blank">
                 Gri index
              </a>
          </li>
      </ul>
      <!-- Menu mobile -->
      <ul class="ul ul_menu mobile_menu">
          <!-- about -->
        <?php if($file === 'about.php') { ?>
          <li class="active">
        <?php } else{ ?>
          <li>
        <?php } ?>
              <a href="<?php echo $domain ?>/about.php" class="main-nav">
                  About <span>AMPC</span>
              </a>
          </li>
          
          
            <li class="hasChild">
              <a href="#" class="main-nav">
                  <span>The</span> Issues
                  <span class="row-down"></span>
              </a>
              <ul class="ul ul_child sub-nav">
                  <?php foreach($nav as $key => $link): ?>
                    <?php
                    $class = '';
                    if ($key == 'welcome') {
                      if ($file == $link['file'] && $video_id == $link['video_id']) {
                        $class = 'active';
                      }
                    } else {
                      if ($file == $link['file'] || $video_id == $link['video_id']) {
                        $class = 'active';
                      }
                    }
                    ?>
                    <li class="<?php echo $class; ?>">
                      <a href="<?php echo $link['url'] ?>"><?php echo $link['title']; ?></a>
                    </li>
                  <?php endforeach; ?>
                  <li class="close-li">
                      <img src="<?php echo $rootimg;?>close.svg" class="img-close" />
                  </li>
              </ul>
          </li>
           <?php if($file === 'contact.php') { ?>
          <li class="active">
        <?php } else{ ?>
          <li>
        <?php } ?>
              <a href="<?php echo $domain ?>/about.php#contact-form" class="main-nav">
                  Contact <span>us</span>
              </a>
          </li>
          <li>
              <!-- <a href="<?php echo $root; ?>assets/src/2897-AMPC-GRI-Index.pdf" class="main-nav">
                 Gri index
              </a> -->
              <a href="<?php echo $root; ?>assets/src/2897-AMPC-GRI-Index.pdf" class="main-nav" target="_blank">
                 Gri index
              </a>
          </li>
      </ul>
    </div>
    
</header>