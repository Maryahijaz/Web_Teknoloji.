<?php include('index.html');
session_start();
$Username= "";
$password="";
$errors = array();
$_SESSION['success']= "";
$sql = "SELECT * FROM `user`;";
$db=mysqli_connect('demo.phpmyadmin.net','G201210573','g201210573','website tasatir');

if(isset($_POST['Login'])){
 $Username= mysqli_real_escape_string($db,$_POST['Username']);
 $password= mysqli_real_escape_string($db,$_POST['Password']);

 if(empty($Username)){array_push($errors, "Username is requiered");}
 if(empty($password)){array_push($errors, "Password is requiered");}

if(count($errors) == 0){
    $password=md5($password);
    $query= "insert into user(Username,Password)Values('$Username','$password')";
    mysqli_query($db,$query);
if(mysqli_num_rows($result)== 1){
    $_SESSION['Username'] = $Username;
    $_SESSION['success'] =" Login Successfull";
    header('location : page.html');}else{
        array_push($errors,"Your Lohin have An Error");
    }
}
}
?>
