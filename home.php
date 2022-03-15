<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require("/var/www/html/site/bopimo.php");

/*
Admin Levels:

1 - Trial Moderator
*/

$requiredLevel = 1; // Trial Mod Minimum To Access
if(!$bop->isAllowed($requiredLevel))
{
  require("/var/www/html/error/404.php");
  die();
}

$user = $bop->local_info();
$avatar = $bop->avatar($user->id);

$logs = $bop->query("SELECT * FROM admin_logs WHERE user=? ORDER BY id DESC LIMIT 0, 10", [$user->id]);

$players = $bop->query("SELECT COUNT(*) FROM users", [])->fetchColumn();
$randPlayers = $bop->query("SELECT * FROM users WHERE hidden=0 AND lastseen > 0 ORDER BY RAND() LIMIT 0, 5", [], true);

$onlinePlayers = $bop->query("SELECT COUNT(*) FROM users WHERE lastseen > ?", [time()-180])->fetchColumn();

$itemCount = $bop->query("SELECT COUNT(*) FROM items", [])->fetchColumn();
$randItems = $bop->query("SELECT * FROM items WHERE verified=1 ORDER BY RAND() LIMIT 0, 5", [], true);

$communities = $bop->query("SELECT COUNT(*) FROM community", [])->fetchColumn();
$randCommunities = $bop->query("SELECT * FROM community WHERE pending=1 ORDER BY members DESC LIMIT 0, 8", [], true);


?>



<div class="col-4-12">
  <div class="card b centered">
    <div class="top">You</div>
    <div class="body">
      <img src="https://storage.vertineer.com/avatars/<?=$avatar->cache?>.png" class="image">
      <br><br>
      Rank: <?=$bop->modString($user->admin)?>
      <br>
      Admin Points: <b><u><?=$user->admin_points?></u></b>
    </div>
  </div>
  <div class="card b">
	<div class="top centered">Gift Item</div>
    <div class="body" id="giftContainer">
		<span style="color:grey;font-size:0.9rem">User ID</span>
		<input id="giftUserId" type="text" style="width:100%;padding:3px;">
		<span style="color:grey;font-size:0.9rem">Item ID</span>
		<input id="giftItemId" type="text" style="width:100%;padding:3px;">
		<div class="shop-search-button centered" id="giftItem" style="width:50%;margin: auto;">Gift</div>
	</div>
  </div>
</div>
<div class="col-8-12">
  <div class="card b">
    <div class="top">Recent Moderation Actions</div>
  </div>
  <?php
  if($logs->rowCount() == 0)
  {
    ?>
    <div class="banner alert">No Results</div>
    <?php
  } else {
    foreach($logs as $log)
    {
      $log = (object) $log;
      ?>
      <div class="card border">You <?=$log->msg?> <?=$log->type?> #<?=$log->affected?></div>
      <?php
    }
  }
  ?>
<div class="card b">
<div class="top">Vertineer Live Statistics</div>
<div class="body" id="giftContainer">
<p>Total Users: <?=$players?></p>
<p>Online Users: <?=$onlinePlayers?></p>
<p>Assets: <?=$itemCount?></p>
<p>Communities: <?=$communities?></p>
</div>

