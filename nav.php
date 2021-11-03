<?php   session_start(); ?>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" <?php $menu=='kezdo'?'active':''; ?>" href="index.php?menu=kezdo">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" <?php $menu=='kezdo'?'active':''; ?>" href="index.php?menu=kezdo">PizzásTér <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php $menu=='rendeles'?'active':''; ?>" href="index.php?menu=rendeles">Rendelés</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Személyes oldal
        </a>
        <div class="dropdown-menu"  <?php if(!isset($_SESSION["uname"])){ echo 'style="display:none" '; } ?> aria-labelledby="navbarDropdown">
          <a class="dropdown-item" <?php $menu=='korabbirendeles'?'active':''; ?>" href="index.php?menu=korabbirendeles">Korábbi rendelések</a>
          <a class="dropdown-item" <?php $menu=='szemelyes'?'active':''; ?>" href="index.php?menu=szemelyes">Személyes adatok</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"<?php $menu=='adatmodosit'?'active':''; ?>" href="index.php?menu=adatmodosit">Adatok módosítása</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php $menu=='bejelentkezes'?'active':''; ?>" href="index.php?menu=bejelentkezes"><?php 
        if(isset($_SESSION["uname"])){ echo "Bejelentkezve"; }else{ echo "Bejentkezés";} ?></a>
      </li>
      <li class="nav-item" <?php if(isset($_SESSION["uname"])){ echo 'style="display:none" '; } ?>>
        <a class="nav-link" <?php $menu=='regisztracio'?'active':''; ?>" href="index.php?menu=regisztracio">Regisztráció</a>
      </li>
    </ul>
      <form class="form-inline my-2 my-lg-0" action="./index.php?menu=kezdo" method="post" >
          <input class="form-control mr-sm-2" type="search" placeholder="Keresés"  name="keresendo" id="kereso" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0"  type="submit"  >Keresés</button>
    </form>
  </div>
</nav>
        