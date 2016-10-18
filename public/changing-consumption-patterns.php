<?php
include('views/shared/header-meta.php');
$globalVideoId = $nav['changing']['video_id'];
?>
    <title>Changing consumption patterns</title>
    <?php include('views/shared/header.php') ?>    
    <div id="page-content-wrapper">
        <?php include('views/shared/headerPartial.php') ?>                                        
        <div class="main-ampc">     
            <?php include('views/partials/playvideo.php') ?>         
            <?php include('views/partials/change.php') ?>                       
        </div>
        <?php include('views/shared/footerPartial.php') ?>
        <?php include('views/shared/loadingPartial.php') ?>
    </div>
<?php include('views/shared/footer.php') ?>