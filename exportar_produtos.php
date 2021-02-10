<?php
 


ob_start();
include_once "config.php";

$conect = null;
$conect = GerenciadorConexao::conectar();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lista de Produtos - Caxambu Afrostyle </title>
	<head>
	<body>
		<?php
        $arquivo = 'produtoscadastrados.xls';
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="11"><center>Produtos Cadastrados - Caxambu Afrostyle</center></tr>';
		$html .= '</tr>';
		$html .= '<tr>';
        $html .= '<td><b>ID do Produto</b></td>';
        $html .= '<td><b>Sexo</b></td>';
		$html .= '<td><b>Tipo do Produto</b></td>';
		$html .= '<td><b>Tamanho Disponivel</b></td>';
		$html .= '<td><b>Peso (em gramas)</b></td>';
        $html .= '<td><b>Quantidade</b></td>';
		$html .= '<td><b>Custo</b></td>';
        $html .= '<td><b>Popularidade</b></td>';
        $html .= '<td><b>Tempo de Producao</b></td>';
        $html .= '<td><b>Descrição Sedutora</b></td>';
        $html .= '<td><b>Arquivos de imagens</b></td>';
		$html .= '</tr>';
		
        $result_msg_vendas="
        Select id_produtos_loja,genero,tipo_produto,tamanho_disponivel,peso,quantidade,custo,popularidade,tempo_producao_dias,descricao_sedutora_produto,arquivo_imagem from view_produtos_loja";
		$resultado_msg_vendas = mysqli_query($conect, $result_msg_vendas);
		while($row_msg_vendas = mysqli_fetch_assoc($resultado_msg_vendas)){
			$html .= '<tr>';
            $html .= '<td>'.$row_msg_vendas["id_produtos_loja"].'</td>';
            $html .= '<td>'.$row_msg_vendas["genero"].'</td>';
			$html .= '<td>'.$row_msg_vendas["tipo_produto"].'</td>';
			
			$html .= '<td>'.$row_msg_vendas["tamanho_disponivel"].'</td>';
			$html .= '<td>'.$row_msg_vendas["peso"].'</td>';
			$html .= '<td>'.$row_msg_vendas["quantidade"].'</td>';
			$html .= '<td>'.$row_msg_vendas["custo"].'</td>';
			$html .= '<td>'.$row_msg_vendas["popularidade"].'</td>';
			$html .= '<td>'.$row_msg_vendas["tempo_producao_dias"].'</td>';
            $html .= '<td>'.$row_msg_vendas["descricao_sedutora_produto"].'</td>';
            $html .= '<td>'.$row_msg_vendas["arquivo_imagem"].'</td>';
			$html .= '</tr>';
			;
		}
// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;
		if($conect)
                mysqli_close($conect);
                ?>
	</body>
</html>