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

     /* Função para atualizar os dados de um dos produtos já cadastrados */
     public function atualizar($Atendimentocliente){
         
         /* Primeiro cria a query do MySQL */
         if ($Atendimentocliente->FoiNaoConformidade=="1"){
        
         $update_query =	"UPDATE atendimentocliente 
         SET atendeu = '".$Atendimentocliente->atendeu."',
         
         motivoPlano = '".$Atendimentocliente->motivoPlano."' ,
         notaAtendimento = '".$Atendimentocliente->notaAtendimento."',
          
          debitoAutomatico = '".$Atendimentocliente->debitoAutomatico."', 
          debitoOfertado = '".$Atendimentocliente->debitoOfertado."', 
          observacao = '".$Atendimentocliente->observacao."', 
          dataChamada = '".$Atendimentocliente->dataChamada."',
         idVendaServico = '".$Atendimentocliente->idVendaServico."',
         notaAtendimento = '".$Atendimentocliente->notaAtendimento."',
         FoiNaoConformidade = '".$Atendimentocliente->FoiNaoConformidade."'

         WHERE idChamada = ".$Atendimentocliente->idChamada;
        }

        else{
            $update_query =	"UPDATE atendimentocliente 
            SET atendeu = '".$Atendimentocliente->atendeu."',
             
            motivoPlano = '".$Atendimentocliente->motivoPlano."' ,
            notaAtendimento = '".$Atendimentocliente->notaAtendimento."',
        
            debitoAutomatico = '".$Atendimentocliente->debitoAutomatico."', 
            debitoOfertado = '".$Atendimentocliente->debitoOfertado."',
            observacao = '".$Atendimentocliente->observacao."', 
            idVendaServico = '".$Atendimentocliente->idVendaServico."',
            notaAtendimento = '".$Atendimentocliente->notaAtendimento."',
           FoiNaoConformidade = '".$Atendimentocliente->FoiNaoConformidade."'

            WHERE idChamada = ".$Atendimentocliente->idChamada;}

         /* Envia a query para o banco de dados e verifica se funcionou */
        mysqli_query($this->conexao, $update_query)
        or $_SESSION['msg'] = "Erro de SQL ao atualizar atendimento.$update_query";
         
        $linhas=mysqli_affected_rows($this->conexao);
        if(($linhas>0) && (!isset($_SESSION['msg']))){
            enviaemail();
            $_SESSION['msg'] = "Atendimento atualizado com sucesso!$update_query";
            
        }elseif(($linhas<1) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Nenhum registro foi atualizado.$update_query";
        }
        
                    
                    
     }

     /* Função para excluir uma entrada de atendimento do banco de dados */
     public function excluir($id){

         /* Primeiro cria a query do MySQL */
         $delete_query = "DELETE FROM atendimentocliente WHERE idChamada = " . $id;

         /* Envia a query para o banco de dados e verifica se funcionou */
        mysqli_query($this->conexao, $delete_query)
        or $_SESSION['msg'] = "Erro de SQL ao excluir atendimento.";

        $linhas=mysqli_affected_rows($this->conexao);
        if(($linhas>0) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Atendimento excluído com sucesso!";
            
        }elseif(($linhas<1) && (!isset($_SESSION['msg']))){
            $_SESSION['msg'] = "Nenhum registro foi excluído.";
        }

     }


     /*  public function buscaPorId($id)*/
     public function buscaPorId($id){
        
         /* Primeiro cria a query do MySQL */
         $id_query = "SELECT * FROM atendimentocliente WHERE idChamada = ".$id;

         /* Envia a query para o banco de dados e verifica se funcionou */
         $result = mysqli_query($this->conexao, $id_query)
         or die("Erro ao listar produtos por ID: " . mysql_error() );

         /* Cria variável de retorno e inicializa com NULL */
         $retorno = null;

         /* Se encontrou algo, pega todos os campos do resultado obtido */
         if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
             //Cria nova instância da classe produto
               $retorno = new Atendimentocliente();
             //Preenche todos os campos do novo objeto
              $retorno->idChamada = $row["idChamada"]; 
               $retorno->atendeu = $row["atendeu"];
              $retorno->refProduto = $row["refProduto"];
              $retorno->motivoPlano = $row["motivoPlano"];
              $retorno->dataVencimento = $row["dataVencimento"];
              $retorno->debitoAutomatico = $row["debitoAutomatico"];
              $retorno->debitoOfertado= $row["debitoOfertado"];
              $retorno->observacao = $row["observacao"];
              $retorno->dataChamada = $row["dataChamada"];
              $retorno->idVendaServico= $row["idVendaServico"];
              $retorno->notaAtendimento = $row["notaAtendimento"];
              $retorno->FoiNaoConformidade= $row["FoiNaoConformidade"];
            
             

             
         }
         
         return $retorno;

     }
     public function buscaultimoid()
     {
         /* Primeiro cria a query do MySQL, fazendo select buscando a última chamada registrada */
         $id_query = "SELECT idChamada, observacao FROM atendimentocliente order by idChamada desc limit 1";
        //
         /* Envia a query para o banco de dados e verifica se funcionou */
         $result = mysqli_query($this->conexao, $id_query)
         or die("Erro ao listar produtos por ID: " . mysql_error() );

         /* Cria variável de retorno e inicializa com NULL */
         $retorno = null;

         /* Se encontrou algo, pega todos os campos do resultado obtido */
         if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
             //Cria nova instância da classe produto
               $retorno = new Atendimentocliente();
             //Preenche todos os campos do novo objeto
        
              
              $retorno->idChamada = $row["idChamada"];
              $retorno->observacao = $row["observacao"];
             
             
         }
         
         return $retorno;
     }



}
?>
