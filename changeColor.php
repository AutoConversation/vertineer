<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("../rest.php");
require("avatar.php");
require_once("/var/www/html/site/bopimo.php");

if ($avatar->loggedIn()) {
	if(isset($_POST["limb"]) && isset($_POST["hex"])) {
		try {
		  if(strlen($_POST['hex']) < 6) {
		    die($rest->error("Invalid HEX."));
		  }
		    if($bop->local_info()->lastaction + 5 > time()) {
    die($rest->error('Please wait '.($bop->local_info()->lastaction + 5 - time()).' seconds before changing your avatar color again.'));
  }
  		$bop->updateFast();
			$avatar->changeColor($_SESSION["id"], $_POST["limb"], $_POST["hex"]);
			$render = new blender;
			$restult = $render->renderAvatar($_SESSION['id']);
			$rest->success();
		} catch (Exception $e) {
			$rest->error($e->getMessage());
		}
	} else {
		$rest->error("Missing parameters");
	}
} else {
	$rest->error("You must be logged in to use this");
}