<?php
$vid = isset($globalVideoId) ? $globalVideoId : '185581200';
// $vidn= isset($_GET['vidn']) ? $_GET['vidn'] : '';
$clickable="";

switch($vid) {
	case '185581200':
		$vidn = 'international-competition';
	 	
		break;
	case '186214910':
		$vidn = 'index.php';
		break;
	// case '186214894':
	// 	$vidn = 'international.php';
	// 	break;
	// case '186214893':
	// 	$vidn = 'regulatory.php';
	// 	break;
	// case '186214896':
	// 	$vidn = 'change.php';
	// 	break;
	// case '186214895':
	// 	$vidn = 'value.php';
	// 	break;
	// case '186214897':
	// 	$vidn = 'social.php';
	// 	break;
	// case '186214898':
	// 	$vidn = 'climate.php';
	// 	break;
	 default:
	 	$vidn = '#';
	 	$clickable="clickable";
}

// if ($vidn) {
// 	$next_link = $vidn ;
// }else{
// 	$next_link = 'index.php';
// }
?>
<div class="wrap_video">
	<div class="videoLightbox heightSafari" style="opacity: 1;">
	<!-- <iframe src="https://player.vimeo.com/video/186506644" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->

		<iframe id="player_ampc" class="embed-responsive-item videoLightbox__embed" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" src="https://player.vimeo.com/video/<?php echo $vid; ?>?autoplay=true&api=1" frameborder="0"></iframe>
		<div class="scroll-down">
			<a href="<?php echo $vidn ?>" class="a-scroll-down <?php echo $clickable ?>" data-scrollto=".sub_folder" style="<?php echo $rootimg;?>row-video.svg">
				<img src="<?php echo $rootimg;?>row-video.svg" />
			</a>
			<!-- <a href="<?php echo $next_link; ?>" class="a-scroll-down" style="<?php echo $rootimg;?>row-video.svg">
				<img src="<?php echo $rootimg;?>row-video.svg" />
			</a> -->
		</div>
	</div>
</div>