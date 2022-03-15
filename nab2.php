<?php
$nogrid = true;
include "site/header.php";

/*
yes i yeeted your code from the other landing page because I was lazy
*/

$players = $bop->query("SELECT COUNT(*) FROM users", [])->fetchColumn();
$randPlayers = $bop->query("SELECT * FROM users WHERE hidden=0 AND lastseen > 0 ORDER BY RAND() LIMIT 0, 5", [], true);

$itemCount = $bop->query("SELECT COUNT(*) FROM items", [])->fetchColumn();
$randItems = $bop->query("SELECT * FROM items WHERE verified=1 ORDER BY RAND() LIMIT 0, 5", [], true);

$communities = $bop->query("SELECT COUNT(*) FROM community", [])->fetchColumn();
$randCommunities = $bop->query("SELECT * FROM community WHERE pending=1 ORDER BY members DESC LIMIT 0, 8", [], true);

?>
</head>
<div class="entire-site" style="min-height:100%;">
  <style>
    .navbar-elements {
      background-color: #444 !important;
      height: 1.6rem;
      color: white;
      padding: 8px;
      border-radius: 5px;
    }

    .navbar-elements a {
      color: #ffffff;
      text-decoration: none;
      font-size: 14px;
    }

    .navbar-elements a:focus,
    a:hover {
      color: #E1E1E1;
      text-decoration: none;
    }
  </style>

  <body>
    <div style="overflow:auto;margin-bottom:125px;">
      <div class="landing-black">
        <div class="grid grid-pad" style="padding:1.5rem;">
          <div style="overflow:auto;padding-bottom:20px;">
            <img class="right" src="https://vertineer.com/vertineernew.png" style="height:150px;width:150px;" alt="Logo">
            <h1> A place to let your creativity flow. </h1>
            <h4> Vertineer is an upcoming sandbox game where you can dress up virtual avatars, </h4>
            <h4> Meet friends, play games, chat on our forum and so much more. </h4>
          </div>
        </div>
      </div>
      <div class="grid grid-pad" style="padding:1.5rem;">
        <div class="col-1-3" style="text-align:right;">
          <div class="page-title">Shop</div>
          <div class="description">Buy, sell, and trade items with our shop</div>
        </div>
        <div class="col-2-3">
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/1064.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/580.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/651.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/954.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/1228.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/1094.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/1272.png" />
            </div>
          </div>
          <div class="col-3-12">
            <div class="shop-item">
              <img style="width:100%;" src="https://storage.vertineer.com/thumbnails/1396.png" />
            </div>
          </div>
          <div class="col-3-12"></div>
        </div>
      </div>
      <div class="landing-black">
        <div class="grid grid-pad" style="text-align:center;padding:1.5rem;">
          <h1> Here's what you can do in Vertineer </h1>
          <br>
          <div class="col-1-4">
            <div class="page-title" style="font-size: 60px;"><i class="fas fa-gamepad"></i></div>
            <div style="font-size: 20px;" >Play games!</div>
          </div>
          <div class="col-1-4">
           <div class="page-title" style="font-size: 60px;"><i class="fas fa-shopping-basket"></i></div>
           <div style="font-size: 20px;">Buy items!</div>
          </div>
          <div class="col-1-4">
          <div class="page-title" style="font-size: 60px;"><i class="fas fa-user-friends"></i></div>
          <div style="font-size: 20px;">Join communites!</div>
          </div>
          <div class="col-1-4">
            <div class="page-title" style="font-size: 60px;"><i class="fas fa-comments"></i></div>
            <div style="font-size: 20px;">Chat on the forum!</div>
          </div>
          </div>
          </div>
      <div class="grid grid-pad" style="padding:1.5rem;text-align:center;">
        <div class="col-1-3">
          <div class="page-title"><?=$players?></div>
          <div><i class="fas fa-users"></i> Users</div>
        </div>
        <div class="col-1-3">
          <div class="page-title"><?=$itemCount?></div>
          <div><i class="fas fa-shapes"></i> Items</div>
        </div>
        <div class="col-1-3">
          <div class="page-title"><?=$communities?></div>
          <div><i class="fas fa-user-friends"></i> Communities</div>
        </div>
      </div>
      </div>
      <div class="landing-black">
        <div class="grid grid-pad" style="text-align:center;padding:1.5rem;">
          <h1> Ready to join? </h1>
          <br>
          <div>
            <a href="/account/login/" class="landing-button" style="margin-right:20px">Login</a>
            <a href="/account/register/" class="landing-button blurple">Register</a>
          </div>
          <br>
      </div>
      </div>
      <!-- bopimo top and bottom -->
      <div style='width:100%;padding-bottom:10px;text-align:center;'>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Horizontal -->
        <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-1141471285902719" data-ad-slot="2221601403"></ins>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </div>
    </div>
</div>
</div>
<div class="footer">
  <div style="margin-left:20%;width:60%;float:left;">
    <span style="float:left;"><img src="https://storage.vertineer.com/Untitled46_20200524203802.png" height="100"></span>
    <span style="float:right;color:#CCCCCC;">
      <ul style="list-style-type: none;float:left;">
        <li><a href="/terms-of-service" style="text-decoration:none;color:#CCCCCC;">Terms Of Service</a></li>
        <li><a href="/privacy/" style="text-decoration:none;color:#CCCCCC;">Privacy</a></li>
        <li><a href="https://support.vertineer.com" style="text-decoration:none;color:#CCCCCC;">Staff</a></li>
      </ul>
      <ul style="list-style-type: none;float:left;">
        <li><a href="https://discord.gg/vertineer" style="text-decoration:none;color:#CCCCCC;">Discord</a></li>
        <li><a href="https://twitter.com/vertineer" style="text-decoration:none;color:#CCCCCC;">Twitter</a></li>
        <li><a href="/" style="text-decoration:none;color:#CCCCCC;">Youtube</a></li>
      </ul>
    </span>
  </div>
</div>

</html>
