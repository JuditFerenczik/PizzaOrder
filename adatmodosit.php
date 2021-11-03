 <?php require_once './header.php'; ?>
<style>
    
    body {
	color: #fff;
	background: #19aa8d;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	font-size: 15px;
}
.form-control, .form-control:focus, .input-group-text {
	border-color: #e1e1e1;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
        
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}


</style>

</head>
  <?php require_once './nav.php'; ?>

<?php require_once './connect.php'; 
 
   $uname= $_SESSION['uname'];
   echo $uname;
if(isset($_POST['password']) or !empty($_POST['loginname']) or !empty($_POST['vnev'])  or !empty($_POST['phone']) or !empty($_POST['email']) or !empty($_POST['cim'])){
  
    $vnev = filter_input(INPUT_POST, 'vnev', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $cím = filter_input(INPUT_POST, 'cím', FILTER_SANITIZE_STRING);
    
    $sql = "Update user set  vnev= ?, password = ?,phone=?, email=?,cim=?  WHERE loginname = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisss", $vnev, $password,$phone,$email,$cím,$uname);
$stmt->execute();
    echo   $vnev . $password .$phone .$email . $cím;
 
$result = $stmt->get_result();
}
 
$sql2 ="SELECT vnev, password, phone, email, cim FROM user WHERE loginname = ?; ";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $uname);
$stmt2->execute();
$result2 = $stmt2->get_result();


while ( $row = $result2->fetch_assoc()){
    $data = '
<div class="signup-form">
    <form  method="post">
		<h2>Adatok módosítása</h2>
		
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="loginname" placeholder="Azonosító" disabled>
			</div>
        </div>
                   <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="vnev" placeholder="Teljes név" value="'. $row['vnev'] .'">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email-cím" value="'. $row['email'] .'">
			</div>
        </div>
                <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-address-book-o"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="cím" placeholder="Cím" value="'. $row['cim'] .'">
			</div>
        </div>
                
                 <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-phone-square"></i>
					</span>                    
				</div>
				<input type="number" class="form-control" name="phone" placeholder="Telefonszám" value="'. $row['phone'] .'">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Jelszó" value="'. $row['password'] .'">
			</div>
        </div>
		
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Módosít</button>
        </div>
    </form>

</div>';
    
}  
echo $data;
            ?>
