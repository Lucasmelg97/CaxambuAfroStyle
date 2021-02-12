<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">


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

    <link href="./main.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Consulta de Produtos - Caxambu</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Controle Financeiro GMT">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./main.css" rel="stylesheet">
    <!--TABELA DESPESAS-->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dataTable/style.css">
    <script src="dataTable/OpenDataTable.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".OpenDataTable").OpenDataTable({
            url: "dataTable/simple_php_datasource.php",
        });
    });
    </script>
    <!--TABELA DESPESAS-->

<body>


 <?php 
    
   
    if((!isset($_SESSION['usuario']))||(!isset($_SESSION['senha']))){
        header('location:Login_v3/login.php');
        exit();
    }
    else{
    echo '<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">



       

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
            <div class="card card-4">

                <div class="card-heading"></div>
                <div class="card-body">
                    <table class="OpenDataTable">
                        <thead>
                            <tr>

                                <th data-colsearch="yes">ID</th>
                                <th data-colsearch="yes">Gênero</th>
                                <th data-colsearch="yes">Tipo de Produto</th>
                                <th data-colsearch="yes">Tamanho</th>
                                <th data-colsearch="yes">Peso(g)</th>
                                <th data-colsearch="yes">Quantidade</th>
                                <th data-colsearch="yes">Custo(R$)</th>
                                <th data-colsearch="yes">Popularidade</th>
                                <th data-colsearch="yes">Tempo de Produção</th>
                                <th data-colsearch="yes">Descrição</th>
                                <th data-colsearch="yes">Imagem</th>

                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <center><a href="exportar_produtos.php"><button class="btn btn--pill btn--brown" name="buscar"
                            id="buscar">Extrair</button></a>
                    <a href="index.php"><button class="btn btn--pill btn--brown" name="inserir"
                            id="inserir">Voltar</button></a></center>
                </div>
                
            
        </div>
        <div class="imagem">
                    <center><a href="https://guetomarketing.mystrikingly.com"><img src="images/gueto.png" height="90"
                        width="220"></a></center>
            </div>
            <center><a href="Login_v3/login.php"><button class="btn btn--pill btn--black" name="sair"
                            id="sair">Sair</button></a></center>
    </div>';}?>
</body>


</head>

</html>
<!-- end document-->