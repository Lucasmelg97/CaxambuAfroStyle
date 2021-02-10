<?php 
include 'classe-imagens.php';
include_once "config.php";

class Classe_Imagens_DAO{

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
    /* public function inserir($Genero)*/

     public function inserir($Imagens){
        $stg=implode(',', $Imagens->nome);
        
        $insert_query =	"INSERT INTO imagens(id_imagens,nome) 
         VALUES (DEFAULT,
         '".$stg."')"; 
         
         /* Primeiro cria a query do MySQL */
         
        
        /* Envia a query para o banco de dados e verifica se funcionou */
        
        /*echo $insert_query;*/
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
