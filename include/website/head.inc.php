<?php
    @session_start();
    require('../include/database/database.php');
    require('../include/functions.inc.php');
	require('../include/settings.inc.php');
	require($options['pluginpath']."/loadplugins.inc.php");
	add("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."");
?>
<!DOCTYPE html>
<html lang="<?php echo $options['short_language']; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?> | <?php echo $options['sitename']; ?></title>
	<meta name="language" content="<?php echo $options['short_language']; ?>">
	<meta name="date" content="<?php echo $options['created']; ?>">
	<meta name="keywords" content="<?php echo $options['keywordsmain']; ?>">
	<meta name="description" content="<?php echo $options['sitedescription']; ?>">
	<meta name="robots" content="<?php echo $options['robots']; ?>">
	<meta http-equiv="language" content="<?php echo "deutsch, ".$options['short_language']; ?>">
	<meta name="author" content="<?php echo $options['author']; ?>">
	<meta name="msapplication-TileColor" content="<?php echo $options['maincolor']; ?>">
	<meta name="theme-color" content="<?php echo $options['maincolor']; ?>">
	<style>
		:root {
			--maincolor: <?php echo $options['maincolor']; ?>;
			--mainfontcolor: <?php echo $options['mainfontcolor']; ?>;
			--mainbackgroundcolor: <?php echo $options['mainbackgroundcolor']; ?>;
			--mainhovercolor: <?php echo $options['mainhovercolor']; ?>
		}
<?php if ($options['font'] != 'none' || empty($options['font'])) { ?>
		@font-face { 
			font-family: '<?php echo $options['fontname']; ?>';
			src: url('<?php echo $options['siteurl']; ?>/include/database/fonts/<?php echo $options['font'];; ?>');
		}
		html,
		body { 
			font-family: <?php echo $options['fontname']; ?>, sans-serif; 
		}
<?php } ?>
	</style>
	<link rel="stylesheet" href="./design/<?php echo $options['frontenddesign']; ?>/style.css">
<?php 
	require('design/'.$options['frontenddesign'].'/head.php');
?>
</head>
<?php 
	//$msg = "Diese Seite wird momentan noch entwickelt";
	include('../include/website/header.inc.php');
?>
	