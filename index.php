<?php

$menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
?>
 <?php require_once './header.php'; ?>
  </head>
 <?php require_once './nav.php'; ?>
  <div id="kereses"></div>
        <div class="container">
            <?php
            switch ($menu) {
                case 'bejelentkezes':
                    require_once './bejelentkezes.php';
                    break;
                 case 'rendeles':
                    include_once './rendeles.php';
                    break;
                case 'kezdo':
                    include_once './kezdo.php';
                    break;
                case 'korabbirendeles':
                    include_once './korabbirendeles.php';
                    break;
                 case 'szemelyes':
                    include_once './szemelyes.php';
                    break;
                case 'adatmodosit':
                    include_once './adatmodosit.php';
                    break;
                case 'regisztracio':
                    include_once './regisztracio.php';
                    break;
            
                default:
                    include_once './kezdo.php';
                    break;
            }
            ?>
            
 <script>
            function showKereses(){
                var x = document.getElementById("kereso").value;
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("kereses").innerHTML = this.responseText;
                };
                xhttp.open("GET", "kereses.php?keresendo=" + x);
                xhttp.send();
            }
        </script>


<?php require_once './footer.php'; ?>
