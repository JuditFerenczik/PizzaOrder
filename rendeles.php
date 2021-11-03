
 <?php require_once 'header.php'; ?>
</head>
  <?php require_once './nav.php'; ?>

<?php require_once './connect.php'; ?>

<?php
echo $_SESSION['uname'];
if(isset($_SESSION['uname'])){
   if(isset($_POST["db"])){
    
    $uname= $_SESSION['uname'];
   $db = filter_input(INPUT_POST, "db", FILTER_SANITIZE_NUMBER_INT);
$tazon = filter_input(INPUT_POST, "tazon", FILTER_SANITIZE_NUMBER_INT);
$megjegyzes = filter_input(INPUT_POST, "megjegyzes", FILTER_SANITIZE_STRING);

$sql3 = "INSERT INTO rendeles(razon, uazon, megjegyzes) VALUES(DEFAULT, (SELECT uazon  FROM `user` where loginname = ?), ?);";
$stmt2 = $conn -> prepare($sql3);
$stmt2->bind_param("ss",$uname, $megjegyzes);
$stmt2 -> execute();
$result2 = $stmt2->get_result();
$sql2 ="INSERT INTO tetel(razon,tazon,db,megjegyzes) VALUES((select razon from rendeles ORDER by razon DESC LIMIT 1 ),?,?,?)  ;";
$stmt = $conn -> prepare($sql2);
$stmt->bind_param("iis", $tazon, $db, $megjegyzes);
$stmt -> execute();
$result = $stmt->get_result();

echo  $uname . " " . $tazon .  " " . $db . " " . $megjegyzes; 
}


$sql ="SELECT `tazon` ,`nev`,`ar`,`kep`   FROM `termek`; ";
$result = $conn ->query($sql);



    $data = '<table class="table-striped">
                    <thead>
                        <th class="col-0" ></th>
                        <th class="col-2">Név</th>
                        <th class="col-1">Ár</th>
                        <th class="col-3">Kép</th>
                        <th class="col-2"> Darabszám </th>
                        <th class="col-2"> Megjegyzés</th>
                        <th class="col-2"></th>
                    </thead>
                    <tbody>';
 
    while ( $row = $result->fetch_assoc()){
        $data .=
                '<form method="post"><tr>
                    
                            <td class="col-0"><input type="hidden" name="tazon" value="'. $row['tazon'] .'" /></td>
                            <td class="col-2">'.$row["nev"].'</td>
                            <td class="col-1">' . $row["ar"].'</td>
                            <td class="col-3"> <img src="./images/' . $row["kep"].'" alt="Nincs kép" style="width:100px;"></td>
                            <td class="col-2 "><input class="db" type="number" placeholder="db" name="db"> </td>
                            <td class="col-2 "><input class="megjegyzes" type="text" placeholder="megjegyzés" name="megjegyzes"> </td>
                            <td class="col-2 "> <button type="submit" class="btn btn-primary kosar"  > Kosárhoz adás</button></td>
                        </tr> </form>';
    
        
    }
    $data .= '</tbody>
                    
                </table>
               ';
    echo $data; 
} else {
    echo '<h1> A rendeléshez jelentkezz be! </h1>'; 
}

 ?>   

