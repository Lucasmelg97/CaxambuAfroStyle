<?php 
include('config.php');
if((empty($_POST['usuario']))||(empty($_POST['senha']))){
    header('Location:index.php');
    exit();
}
$usuario=$_POST['usuario'];
$senha= $_POST['senha'];

$query="select id_usuario,usuario from login where usuario='{$usuario}' and senha='{$senha}'";
$result=mysqli_query((mysqli_connect("localhost", "root","","caxambu")),$query);
$row=mysqli_num_rows($result);
echo $query; 
//echo $result; 
if($row==1)
header('Location:../index.php');  

else
{  
    header('Location:login.php');

}
exit;