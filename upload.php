<?php
session_start();
/* 
$diretorio = "images/";

if(!is_dir($diretorio)){ 
	echo "Pasta $diretorio nao existe";
}else{
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
			echo "Upload realizado com sucesso<br>"; 
		}else{
			echo "Erro ao realizar upload";
		}
		
	}
} */
$utf8=header("Content-Type:text/html; charset=utf-8");
$con=new msqli('localhost','root','','caxambu');
$con->set_charset("utf8");

//arquivos permitidos 
$arquivos_permitidos = ['jpg','jpeg','png'];

//capturar dados do form
$nomes=$arquivos['name'];

for($i=0; $i<count($nomes); $i++):
	$extensao=explode('.',$nomes[$i]);
	$extensao=end($extensao);
	//veirficacao da igualdade da extensão
	if(in_array($extensao,$arquivos_permitidos)){
		$query = $con->query("insert into imagens(id_imagens,nome) values(default, '$nomes[$i]')");

		if(mysqli_affected_rows($con)>0){
			$_SESSION['sucesso']='Arquivos enviados com sucesso!';
			$destino=header("Location:../");}
		else{
			$_SESSION['erro']='Existem arquivos que não foram enviados';
			$destino=header("Location:../");}
		}

endfor;


?>