<?php 

	//global variables
	//$domain= "http://ampc.project-staging.com";
	$domain= "http://localhost:3000/ampc/public";
	//$domain="http://feastofideas.com";
	$root = "/ampc/public/";
	//$root = "/";
	$rootcss = $root . "assets/css/";
	$rootjs = $root . "assets/js/";
	$rootvendor = $root . "assets/vendor/";
	$rootimg = $root . "assets/images/";

	$currentPageName = basename($_SERVER['PHP_SELF']);
	$nav = array(
	'welcome' => array(
		'title' => 'Welcome',
		'video_id' => '185581200',
		'file'  => 'welcome.php',
		'url' => 'welcome'
	),
	'international' => array(
		'title' => 'International competition',
		'video_id' => '186214894',
		'file'  => 'international-competition.php',
		'url' => 'international-competition'
	),
	'regulatory' => array(
		'title' => 'Regulatory environment',
		'video_id' => '186214893',
		'file'  => 'regulatory-environment.php',
		'url' => 'regulatory-environment'
	),
	'changing' => array(
		'title' => 'Changing consumption patterns',
		'video_id' => '186214896',
		'file'  => 'changing-consumption-patterns.php',
		'url' => 'changing-consumption-patterns'
	),
	'value' => array(
		'title' => 'Value chain integration',
		'video_id' => '186214895',
		'file'  => 'value-chain-integration.php',
		'url' => 'value-chain-integration'
	),
	'social' => array(
		'title' => 'Social licence to operate',
		'video_id' => '186214897',
		'file'  => 'social-licence-to-operate.php',
		'url' => 'social-licence-to-operate'
	),
	'climate' => array(
		'title' => 'Climate change',
		'video_id' => '186214898',
		'file'  => 'climate-change.php',
		'url' => 'climate-change'
	),
	'where' => array(
		'title' => 'Where to from here',
		'video_id' => '186214910',
		'file'  => 'where-to-from-here.php',
		'url' => 'where-to-from-here'
	)
);
?>
<!DOCTYPE html>
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />				
