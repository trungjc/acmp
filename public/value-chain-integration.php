<?php
include('views/shared/header-meta.php');
$globalVideoId = $nav['value']['video_id'];
?>
    <title>Value chain intergation</title>
    <?php include('views/shared/header.php') ?>    
    <div id="page-content-wrapper">
        <?php include('views/shared/headerPartial.php') ?>                                        
        <div class="main-ampc">  
            <?php include('views/partials/playvideo.php') ?>            
            <?php include('views/partials/value.php') ?>                       
        </div>
        <?php include('views/shared/footerPartial.php') ?>
        <?php include('views/shared/loadingPartial.php') ?>
    </div>
<?php include('views/shared/footer.php') ?>