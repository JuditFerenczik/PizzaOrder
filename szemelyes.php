
 <?php require_once 'header.php'; ?>
</head>
  <?php require_once './nav.php'; ?>

<?php require_once './connect.php'; ?>

<?php
  
   $uname= $_SESSION['uname'];
   
$sql = "SELECT vnev, phone,email,password,cim  FROM user  WHERE loginname = ?;";  
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();



$data = '<table class="table-striped">
                    <thead>
                        
                        <th class="col-2">Név</th>
                        <th class="col-2">Telefonszám</th>
                        <th class="col-2">E-mail</th>
                        <th class="col-2"> Jelszó </th>
                        <th class="col-2"> Cím</th>
                       
                    </thead>
                    <tbody>';
  
    while ( $row = $result->fetch_assoc()){
        $data .=
               '<tr>
            
                            <td class="col-2">'.$row["vnev"].'</td>
                            <td class="col-2">' . $row["phone"].'</td>
                            <td class="col-2">' . $row["email"].'</td>
                                <td class="col-2">' . $row["password"].'</td>
                                    <td class="col-2">' . $row["cim"].'</td>
                                        
                        </tr> ';
        
        
    }
    $data .= '</tbody>
                    
                </table>
               ';
    echo $data;