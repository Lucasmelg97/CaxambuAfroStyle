<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <table class="OpenDataTable">
        <thead>
            <tr>

                <th data-colsearch="yes">ID</th>
                <th data-colsearch="yes">Gênero</th>
                <th data-colsearch="yes">Tipo de Produto</th>
                <th data-colsearch="yes">Tamanho Disponível</th>
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
</body>


</head>

</html>
<!-- end document-->