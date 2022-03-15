<?php

if(!isset($_GET['id']))
{
  die("Bad request");
}

if(!is_numeric($_GET['id']))
{
  die("bad request");
}
$cid = (int) $_GET['id'];

require("/var/www/html/site/bopimo.php");
if(!$bop->logged_in())
{
  die();
}
$localUser = $bop->local_info();
if(!$bop->isAllowed($localUser->id))
{
  die();
}
require("/var/www/html/api/community/class.php");
$community = $com->get($cid);
if(!$community)
{
  die("community don't exist");
}
if($community->desc_hidden == 0) {
  $hide = $bop->update_('community', ["desc_hidden" => 1], ["id" => $cid]);
} else {
  $hide = $bop->update_('community', ["desc_hidden" => 0], ["id" => $cid]);
}
$bop->insert("admin_logs", [
"user" => $_SESSION['id'],
"affected" => $cid,
"msg" => "censored desc",
"type" => "community"
]);
$bop->updateAdminPoints(3);
die(header("location: /profile/{$uid}"));
?>

