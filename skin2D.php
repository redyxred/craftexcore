<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);

	require ROOT.'/core/classes/SkinViewer2D.class.php';
	header("Content-type: image/png");

	$show = $_GET['show'];
    $skin = ROOT.'/uploads/skins/'.$_GET['login'].'.png';

    if (!file_exists($skin)) { $skin = ROOT.'/uploads/skins/default.png'; }
    
	if ($show !== 'head') {
		$cloak = isset($_GET['cloak']) ? (($_GET['cloak'] === 'hd') ? './hd_cloak.png' : './cloak.png') : false;
		$side = isset($_GET['side']) ? $_GET['side'] : false;

		$img = skinViewer2D::createPreview($skin, $cloak, $side);
	} else {
		$img = skinViewer2D::createHead($skin, 64);
	}

	imagepng($img);
?>