<?php
require('/var/www/html/site/bopimo.php');

if(!$bop->loggedIn()) {
    die();
}

if($bop->local_info()->admin <= 0) {
    die(header('Location: /error/404.php'));
}

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID.");
}

if(!$bop->user_exists($_GET['id'])) {
    die("User does not exist.");
}

$admU = $bop->get_user($_GET['id']);
$getIp = $bop->query('SELECT * FROM `login` WHERE user_id = ? ORDER BY id DESC LIMIT 1', [$_SESSION['id']])->fetch(PDO::FETCH_OBJ);

require('/var/www/html/site/header.php');
?>
<div class="card b">
<div class="top">
<?=htmlentities($admU->username)?>'s Info
</div>
</div>
<div class="card border">
<p>Username: <?=htmlentities($admU->username)?></p>
<p>User ID: <?=number_format($_GET['id'])?></p>
<?php if($_SESSION['id'] == 1 || $_SESSION['id'] == 2 || $_SESSION['id'] == 6) { ?>
<p>Email: <?=htmlentities($admU->email)?></p>
<p>IP: <?=$getIp->ip_address?></p>
<?php } else { ?>
<p><font color="red">Some data has been hidden, like the IP address and the email.</font></p>
<?php } ?>
<p>Vix: <?=number_format($admU->bop)?></p>
<P>Administrator: <?=($admU->admin >= 1) ? "yes" : "no"?></P>
<p>Admin Level: <?=$admU->admin?></p>
<p>Admin Points: <?=number_format($admU->admin_points)?></p>
</div>