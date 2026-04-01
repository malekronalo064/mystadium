<div id="topHead">
    <a href="/index.php"><img src="/public/img/logo.png" alt="MyStadium" /></a>
    <h1>My Stadium</h1>

    </div>

<?php if (function_exists('get_flash')) {
  $f = get_flash();
  if ($f) {
    $cls = $f['type'] === 'success' ? 'flash-success' : 'flash-error';
    echo '<div class="flash '.htmlspecialchars($cls).'">'.htmlspecialchars($f['message']).'</div>';
  }
}

  ?>

    <!-- barre menu -->
<div class="menu">
    <a href="/views/connexion.php" class="active">Login</a>


    <!-- Navigation links -->
    <div id="myLinks">
      <a href="/views/tournois.php">Tournois</a>
      <a href="/views/store.php">Store</a>
      <a href="/views/about.php">About</a>
    </div>


    <!-- Bar icon-->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>


  <script>
    function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
  </script>