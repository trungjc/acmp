<?php
include('views/shared/header-meta.php');
$globalVideoId = $nav['international']['video_id'];
?>
    <title>International competition</title>
    <?php include('views/shared/header.php') ?>    
    <div id="page-content-wrapper">
        <?php include('views/shared/headerPartial.php') ?>                                        
        <div class="main-ampc">   
            <?php 
            include('views/partials/playvideo.php') 
            ?>           
            <?php include('views/partials/international.php') ?>                       
        </div>
        <?php include('views/shared/footerPartial.php') ?>
        <?php include('views/shared/loadingPartial.php') ?>
    </div>
<?php include('views/shared/footer.php') ?>