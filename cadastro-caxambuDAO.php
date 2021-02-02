<?php 
include 'classe-cadastro-caxambu.php';
include_once "config.php";

class Classe_Cadastro_Caxambu_DAO{

/* Variável privada que armazena o identificador da conexão com o banco */
private $conexao = null;

    /* Construtor da classe: estabelece conexão com o banco */
    /* Utiliza o método estático da classe GerenciadorConexao */
    public function __construct(){
        /* Recebe o identificador da conexão e armazena */
        $this->conexao = GerenciadorConexao::conectar();
    }

    /* Destrutor da classe: finaliza conexão com o banco */
    public function __destruct(){
        /* Verifica se a conexão havia sido estabelecida anteriormente */
        if($this->conexao)
            mysqli_close($this->conexao);
    }

/* -----------------------------------------------------------------------------
* Aqui começa a implementação do CRUD
*
* C = Create 		-> 		Insere novas linhas na tabela
* R = Retrieve 	-> 		Busca entradas na tabela
* U = Update 		-> 		Atualiza linhas da tabela
* D = delete 		->		Deleta linhas da tabela
-----------------------------------------------------------------------------*/
            

     /*Função para inserir nova chamada na tabela produto do banco de dados*/
    /* public function inserir($Atendimentocliente)*/

     public function inserir($Cadastrocaxambu){
    
        
        $insert_query =	"INSERT INTO produtos_loja(id_produtos_loja,genero 
          tipo_produto, imagens, 
          tamanho_disponivel, peso, quantidade,custo,grau_popularidade,tempo_producao_dias, descricao_sedutora_produto) 
         VALUES (DEFAULT,
         '".$Cadastrocaxambu->genero."',
         '".$Cadastrocaxambu->tipo_produto."',
         '".$Cadastrocaxambu->imagens."',
         '".$Cadastrocaxambu->tamanho_disponivel."',
         '".$Cadastrocaxambu->peso."',
         '".$Cadastrocaxambu->quantidade."',
         '".$Cadastrocaxambu->custo."',
         '".$Cadastrocaxambu->grau_popularidade."',
         '".$Cadastrocaxambu->tempo_producao_dias."',
         '".$Cadastrocaxambu->descricao_sedutora_produto."'
         )"; 
         
         /* Primeiro cria a query do MySQL */
         
        
        /* Envia a query para o banco de dados e verifica se funcionou */
        
        mysqli_query($this->conexao, $insert_query)
        or $_SESSION['msg'] = "Erro de SQL ao inserir atendimento.$insert_query";

        $linhas=mysqli_affected_rows($this->conexao);
        
        if(($linhas>0) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Cadastro inserido com sucesso!$insert_query";
            
        }elseif(($linhas<1) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Nenhum cadastro foi inserido.$insert_query";
        }
        
     }





}
?>
