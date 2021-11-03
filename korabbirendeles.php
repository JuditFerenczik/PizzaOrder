

 <?php require_once 'header.php'; ?>
</head>
  <?php require_once './nav.php'; ?>

<?php require_once './connect.php'; ?>

<?php

   $uname= $_SESSION['uname'];
   echo $uname;
$sql = "SELECT nev, db,ar,  db*ar as osszesen ,rendeles.megjegyzes as megjegyzes, idopont  FROM rendeles JOIN tetel on rendeles.razon = tetel.razon JOIN termek on tetel.tazon= termek.tazon WHERE rendeles.uazon= (SELECT uazon  FROM `user` where loginname = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();



$data = '<table class="table-striped">
                    <thead>
                        
                        <th class="col-2">Név</th>
                        <th class="col-2">Ár</th>
                        <th class="col-2">Darab</th>
                        <th class="col-2"> Összesen </th>
                        <th class="col-2"> Megjegyzés</th>
                        <th class="col-2">Időpont</th>
                    </thead>
                    <tbody>';
  
    while ( $row = $result->fetch_assoc()){
        $data .=
               '<tr>
            
                            <td class="col-2">'.$row["nev"].'</td>
                            <td class="col-2">' . $row["ar"].'</td>
                            <td class="col-2">' . $row["db"].'</td>
                                <td class="col-2">' . $row["osszesen"].'</td>
                                    <td class="col-2">' . $row["megjegyzes"].'</td>
                                         <td class="col-2 ">' . $row["idopont"].'</td>
                        </tr> ';
        
        
    }
    $data .= '</tbody>
                    
                </table>
               ';
    echo $data;