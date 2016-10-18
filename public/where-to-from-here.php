<?php
include('views/shared/header-meta.php');
$globalVideoId = $nav['where']['video_id'];
?>
    <title>Where to from here</title>
    <?php include('views/shared/header.php') ?>    
    <div id="page-content-wrapper">
        <?php include('views/shared/headerPartial.php') ?>                                        
        <div class="main-ampc">            
            <?php include('views/partials/playvideo.php') ?>                       
        </div>
        <?php include('views/shared/footerPartial.php') ?>
        <?php include('views/shared/loadingPartial.php') ?>
    </div>
<?php include('views/shared/footer.php') ?>