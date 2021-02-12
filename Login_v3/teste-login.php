<?php 
session_start();
include('config.php');
if((empty($_POST['usuario']))||(empty($_POST['senha']))){
    header('location:login.php');
    exit();
}
$usuario=$_POST['usuario'];
$senha= $_POST['senha'];



$query="select id_usuario,usuario from login where usuario='{$usuario}' and senha='{$senha}'";
$result=mysqli_query((mysqli_connect("localhost", "root","","caxambu")),$query);
$row=mysqli_num_rows($result);
echo $query; 
echo $row; 


if($row==1){
 
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
header('location:../index.php');

}
else if($row==0) 
{  
    unset( $_SESSION['usuario']);
    unset($_SESSION['senha']); 
    header('location: login.php');
    
} 
exit;?>