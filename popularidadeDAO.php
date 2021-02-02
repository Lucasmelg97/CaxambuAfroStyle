<?php 
include 'classe-popularidade.php';
include_once "config.php";

class Classe_Popularidade_DAO{

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

     public function inserir($Popularidade){
    
        
        $insert_query =	"INSERT INTO popularidade(id_popularidade,popularidade) 
         VALUES (DEFAULT,
         '".$Popularidade->popularidade."')"; 
         
         /* Primeiro cria a query do MySQL */
         
        
        /* Envia a query para o banco de dados e verifica se funcionou */
        
        echo $insert_query;
        mysqli_query($this->conexao, $insert_query)
        or $_SESSION['msg'] = "Erro de SQL ao inserir atendimento.$insert_query";

        $linhas=mysqli_affected_rows($this->conexao);
        
        if(($linhas>0) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Cadastro inserido com sucesso!$insert_query";
            
        }elseif(($linhas<1) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Nenhum cadastro foi inserido.$insert_query";
        }
        
     }
     public function buscaTodasChamadas(){

        /* Primeiro cria a query do MySQL */
        $id_query = "SELECT * FROM popularidade";

        /* Envia a query para o banco de dados e verifica se funcionou */
        $result = mysqli_query($this->conexao, $id_query)
        or die("Erro ao listar respostas: " . mysql_error() );

         $lista = array();
         while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
           //Cria nova instância da classe Produto
           $retorno = new Genero();
           //Preenche todos os campos do novo objeto
           $retorno->id_popularidade = $row["id_popularidade"];
           $retorno->popularidade = $row["popularidade"];
           //Coloca no array
           $lista[] = $retorno;
       }

       return $lista;


    



}
}
?>
