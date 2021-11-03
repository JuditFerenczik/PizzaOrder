
 <?php 
 require_once './header.php'; ?>

  <link rel="stylesheet" href="./login.css">
  <style>
      body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
  </style>
</head>
  <?php require_once './nav.php'; ?>
      
 <?php 
 require_once './connect.php'; 
 if(!isset($_SESSION['uname'])){
    if(isset($_POST)){
    $uname = filter_input(INPUT_POST, "uname", FILTER_SANITIZE_STRING);
    $psw = filter_input(INPUT_POST, "psw", FILTER_SANITIZE_STRING);

    $_SESSION['uname'] = $uname;
    echo $_SESSION['uname'];
    $sql ="SELECT `loginname` ,`password`,`vnev`,`email`,`phone` ,`cim` ,`uazon`   FROM `user` WHERE `loginname` = ? AND  `password` = ?;";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("ss", $uname, $psw);
    $stmt -> execute();
    $result = $stmt->get_result();
    $exists = false;

        if($result != null && $result ->num_rows > 0){

       $exists = true; 
        $data = '<table>
                        <thead>
                            <th>ID</th>
                            <th>Név</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Cím</th>
                            <th>E-mail</th
                            <th>Telefon</th>
                        </thead>
                        <tbody>';
        while ( $row = $result->fetch_assoc()){
            $data .='<tr>
                                <td>'.$row["uazon"].'</td>
                                <td>'.$row["vnev"].'</td>
                                <td>'.$row["loginname"].'</td>
                                <td>'.$row["password"].'</td>
                                <td>'.$row["cim"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["phone"].'</td>

                            </tr>';
        }
        $data .= '</tbody>

                    </table>';
        echo $data;
        echo '<script>window.location.href = "index.php?menu=kezdo";</script>';
        //header("Location:index.php?menu=kezdo");
    } else {
        echo 'Nincs ilyen felhasználó!';    
    }


    }


   ?>

   <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Szeretnék bejelentkezni</button>
   <div id="id01" class="modal">


       <form class="modal-content animate" method="post" ">
       <div class="imgcontainer">
         <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
         <img src="./images/7.jpg" alt="Avatar" class="avatar">
       </div>

       <div class="container">
         <label for="uname"><b>Felhasználónév:</b></label>
         <input type="text" placeholder="Felhasználónév" name="uname" required>

         <label for="psw"><b>Jelszó:</b></label>
         <input type="password" placeholder="Jelszó" name="psw" required>

         <button type="submit">Bejelentkezés</button>
         <label>
           <input type="checkbox" checked="checked" name="remember"> Emlékezz rám!
         </label>
       </div>

       <div class="container" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Mégse</button>
         <span class="psw">Elfelejtetted a jelszavad?</a></span>
       </div>
     </form>
       <div id="felhasz">

       </div>
   </div>

   <?php
   }else{
        $uname= $_SESSION['uname'];
       echo "Már be vagy jelentkezve, ". $uname . ":P <br>";
    echo  'Kijelentkezéshez kattints ide: <a href="logout.php" tite="Logout">Kijelentkezés.';
    
   }
 
?>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

</body>
</html>
