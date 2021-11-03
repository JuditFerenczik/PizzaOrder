
<div class="block p-2 alert alert-warning">
    
    <h1 >Üdvözlünk a honlapunkon,
        <?php
    if(isset($_SESSION['uname'])){
        echo $_SESSION['uname'] . "!";
    }else{
    echo 'rendeléshez jelentkezz be! :)';}
    ?></h1>
</div>
<?php require_once './connect.php'; ?>
<?php

if(isset($_POST['keresendo'])){
   $keresendo = filter_input(INPUT_POST, 'keresendo', FILTER_SANITIZE_STRING);
$sql = "SELECT nev, ar,  kep   FROM termek where nev like '%$keresendo%';";   

$result = $conn ->query($sql);


$data = '<table class="table-striped">
                    <thead>
                         <th class="col-3"> </th>
                        <th class="col-2">Név</th>
                        <th class="col-2">Ár</th>
                        <th class="col-2">Kép</th>
                       
                        <th class="col-3"> </th>
                       
                    </thead>
                    <tbody>';
  
    while ( $row = $result->fetch_assoc()){
        $data .=
               '<tr>
             <td class="col-2"></td>
                            <td class="col-2">'.$row["nev"].'</td>
                            <td class="col-2">' . $row["ar"].'</td>
                        <td class="col-3"> <img src="./images/' . $row["kep"].'" alt="Nincs kép" style="width:100px;"></td>
 <td class="col-3"></td>
</tr> ';
        
        
    }
    $data .= '</tbody>
                    
                </table>
               ';
    echo $data; 
}

?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators" id="indicators">
      <script>
      let tmp = '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
       for(let i = 1; i< 10; i++){
           
           tmp += ` <li data-target="#carouselExampleIndicators" data-slide-to="${1}"></li>`;
       }
       
       document.getElementById('indicators').innerHTML = tmp;
      </script>
    
  
  </ol>
    <div class="carousel-inner" id="kepek">
      <script>
          let text = ' <div class="carousel-item active">';
          text += '<img class="d-block w-100" src="./images/0.jpg" alt="First slide">   </div>';
      
      for(let i = 1; i< 10; i++){
      
    text += '<div class="carousel-item">';
     text +=` <img class="d-block w-100" src="./images/${i}.jpg" alt="slides"> </div>`
    document.getElementById('kepek').innerHTML = text;
    }
    
    </script>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
