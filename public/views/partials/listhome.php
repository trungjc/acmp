<?php

$rootVideo = $root . "assets/src/converted/";
?>
<div class="listhome heightSafari">
	<a href="welcome" data-video-id="185581200" class="list-item main-item" style="background-image:url(<?php echo $rootimg;?>bg/1.jpg)">
		<video width="100%"  >
			<source src="<?php echo $rootVideo;?>video1.mp4" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
		<div class="mask"></div>
		<div class="txt_inner">
			<h1>Welcome to</h1>
			<h2>A Feast of ideas</h2>
			<p class="p_start">
				<button class="btn-start btn-am">Start here</button>
			</p>
		</div>
	</a>
	<div class="two-items">
		<a href="international-competition" data-video-id="186214894" class="list-item second-item" style="background-image:url(<?php echo $rootimg;?>bg/2.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video2.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>International<br/>competition</h3>
			</div>
		</a>
		<a href="regulatory-environment" data-video-id="186214893" class="list-item second-item" style="background-image:url(<?php echo $rootimg;?>bg/3.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video3.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Regulatory<br/>Environment</h3>
			</div>
		</a>
		<a href="changing-consumption-patterns" data-video-id="186214896" class="list-item second-item" style="background-image:url(<?php echo $rootimg;?>bg/4.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video4.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Changing<br/>consumption<br/>patterns</h3>
			</div>
		</a>
		<a href="value-chain-integration" data-video-id="186214895" class="list-item second-item" style="background-image:url(<?php echo $rootimg;?>bg/5.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video5.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Value chain<br/>integration</h3>
			</div>
		</a>
	</div>
	<div class="three-items">
		<a href="social-licence-to-operate" data-video-id="186214897" class="list-item third-item" style="background-image:url(<?php echo $rootimg;?>bg/6.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video6.mp4" type="video/mp4">
				
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Social licence<br/>to operate</h3>
			</div>
		</a>
		<a href="climate-change" data-video-id="186214898" class="list-item third-item" style="background-image:url(<?php echo $rootimg;?>bg/7.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video7.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Climate<br/>change</h3>
			</div>
		</a>
		<a href="where-to-from-here" data-video-id="186214910" class="list-item third-item" style="background-image:url(<?php echo $rootimg;?>bg/8.jpg)">
			<video width="100%" >
				<source src="<?php echo $rootVideo;?>video8.mp4" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
			<div class="mask"></div>
			<div class="txt_inner">
				<h3>Where to from here?</h3>
			</div>
		</a>
	</div>
</div>
<script type="text/javascript">
	
	$(function () {
		
	});




</script>
<style>

	video {
		display: none;
		width:100%;
	}
	video.active {
		display: block;
	}
</style>