<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Caxambu Afrostyle - Registro de Produto</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!--CSS Bootstrap !-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--CSS Personalizada !-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--Fonte para ícones !-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
        integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">


</head>

<body>
    <?php 
  if(isset($_POST['cadastrar'])){
  inserecadastro();
  echo "<script type= 'text/javascript'>alert('Cadastrando..');</script> ";}


  function inserecadastro(){

   

    
    require_once 'cadastro-caxambuDAO.php';
    $obj_insereCadastro = new Classe_Cadastro_Caxambu_DAO();
    $obj_insereCadastro->genero = $_POST['genero'];       

    $obj_insereCadastro->tipo_produto = $_POST['tipodeprdouto'];
    /* $obj_insereCadastro->imagem = $_POST['arquivo']; */
  
    $obj_insereCadastro->tamanho_disponivel = 3;
    $obj_insereCadastro->peso = $_POST['peso'];
    $obj_insereCadastro->quantidade = $_POST['quantidade'];
    
    $obj_insereCadastro->custo = $_POST['custo'];
     
    $obj_insereCadastro->grau_popularidade = 1;
    
    $obj_insereCadastro->tempo_producao_dias =  $_POST['dias'];
    $obj_insereCadastro->descricao_sedutora_produto =  $_POST['descricao'];
    
    $obj_insereCadastro->inserir($obj_insereCadastro);

    
    
}

?>

    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">

        <div class="wrapper wrapper--w780">
            <style type="text/css">
            .imagem {
                margin: 0 auto;
                padding-top: auto;
                /* margem vertical definida como 0 e horizontal automática */
                width: 200px;
            }
            </style>
            <div class="imagem">
                <img src="images/Screenshot_3-removebg-preview (1).png" height="90" width="220">
            </div>
            <div class="card card-3">

                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro de Produto</h2>
                    <form method="POST">

                        <div class="form-group" required class="form-control">
                            <div class="input-group">

                                <div class="rs-select2 js-select-simple select--no-search">
                                    <?php 
                                     require_once 'generoDAO.php';
                                     $obj_resposta = new Classe_Genero_DAO();
                                     $lista_resposta = $obj_resposta->buscaTodasChamadas();
                                    ?>
                                    <select name="genero">
                                        <option disabled="disabled" selected="selected">Gênero</option>
                                        <?php
                                                                            foreach ($lista_resposta as $indice => $each) {
                                                                               
                                                                                echo "<option id=".$each->id_genero." value=".$each->id_genero.">".$each->genero."</option>";
                                                                            }
                                                                        ?>

                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>

                            </div>


                            <div class="input-group">
                                <div class="form-group" required class="form-control">
                                    <input class="input--style-3" type="text" placeholder="Tipo de Produto"
                                        name="tipodeprdouto" required class="form-control">
                                </div>
                            </div>


                            <div class="form-group" required class="form-control">
                                <label class="input--style-3">Selecione a imagem do produto:</label>
                                <form enctype="multipart/form-data" method="POST" action="upload.php" required
                                    class="form-control">
                                    <input class="input--style-3" type="file" name="arquivo"
                                        accept="image/png, image/jpeg, image/jpg" multiple="multiple" /><br><br>

                                </form>






                            </div>


                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search" required
                                    class="form-control">


                                    <label class="input--style-3">Tamanhos Disponíveis:</label>

                                    <p class="input--style-3">
                                        <input type="checkbox" name="PP" value="on" /> PP<br />
                                        <input type="checkbox" name="P" value="on" />  P<br />
                                        <input type="checkbox" name="M" value="on" /> M<br />
                                        <input type="checkbox" name="G" value="on" /> G<br />
                                        <input type="checkbox" name="XG" value="on" /> XG <br />
                                        <input type="checkbox" name="XGG" value="on"/> XGG
                                      
                                    </p>



                                </div>
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="number" min="0" placeholder="Peso(em gramas)"
                                    name="peso" required class="form-control">
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="number" min="0" placeholder="Quantidade de peças"
                                    name="quantidade" required class="form-control">
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="number" step="0.01" min="0"
                                    placeholder="Custo de produção unitário" name="custo" required class="form-control">
                            </div>
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search" required
                                    class="form-control">
                                    <?php 
                                     require_once 'popularidadeDAO.php';
                                     $obj_resposta = new Classe_Popularidade_DAO();
                                     $lista_resposta = $obj_resposta->buscaTodasChamadas();
                                    ?>

                                    <select name="popularidade">
                                        <option disabled="disabled" selected="selected">Grau de Popularidade da peça
                                            (intuição)
                                        </option>
                                        <?php
                                                                            foreach ($lista_resposta as $indice => $each) {
                                                                               
                                                                                echo "<option id=".$each->id_popularidade." value=".$each->id_popularidade.">".$each->popularidade."</option>";
                                                                            }
                                                                        ?>


                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="input--style-3">Tempo de Produção em DIAS (em caso de
                                    indisponibilidade
                                    imediata)</label>
                                <input class="input--style-3" type="number" min="1" name="dias" required
                                    class="form-control">
                            </div>

                            <label class="input--style-3">Descrição SEDUTORA do produto</label><textarea type="text"
                                class="col-md-12" class="input--style-3" name="descricao" required
                                class="form-control"></textarea>


                            <div class="p-t-10">
                                <a href=#><button class="btn btn--pill btn--brown" name="cadastrar"
                                        id="cadastrar">Cadastrar</button></a>

                                        <a href=#><button class="btn btn--pill btn--brown" name="cadastrar"
                                        id="cadastrar">Exportar</button></a>
                                       

                            </div>

                        </div>
                    </form>


                </div>


            </div>
            <style type="text/css">
            .imagem {
                margin: 0 auto;
                padding-top: auto;
                /* margem vertical definida como 0 e horizontal automática */
                width: 200px;
            }
            </style>
            <div class="imagem">
                <img src="images/Screenshot_3-removebg-preview (1).png" height="90" width="220">
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script type="text/javascript" src="js/jquery-min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->