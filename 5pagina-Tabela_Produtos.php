<?php 
    include "conexaoDB.php";

    $sql = "SELECT * FROM produtos ORDER BY ID_Produto";
   
    $produtos = $mysqli->query($sql) or die("Erro na busca dos Produtos"); 
?>

<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="utf-8"/>
    <title>CRUD_Prime Delivery</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style-Database_Cliente.css">
    <style>
        p {
            font-family: Arial, sans-serif;
            background-image: url(background-02.png);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            color: white;
            text-align: center;
            font-size: 30px;
        }


    </style>
</head>
<body>
    <div class="topo">
        <h1>Produtos Adicionados</h1>
        <a href="4pagina-Cadastro_Produtos.html" class="novoC">Adicionar novo Produto</a>
        <a href="5pagina-Tabela_Produtos_Cadastrados.php"><i class='bx bx-left-arrow-circle'></i>Voltar</a><br><br>
    </div>
    <?php
       if ($produtos->num_rows == 0) echo "<p>Não existem Produtos cadastrados</p>";
       else{
     ?>   

               <table border="1">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th width="200">Nome Do Produto</th>
                            <th>Preço Do Produto</th>
                            <th>Descricão Do Produto</th>
                            <th>Imagem Do Produto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($dados = $produtos->fetch_assoc()) {
                        ?>  
                            <tr>
                                <td><?php echo $dados['ID_Produto'];?></td>
                                <td><?php echo $dados['Nome_Produto'];?></td>
                                <td><?php echo $dados['Preco_Produto'];?></td>
                                <td><?php echo $dados['Descricao_Produto'];?></td>
                                <td><?php echo $dados['Imagem_Path'];?></td>
                                <td>
                                <a href="7pagina-Editar_Produto.php?ID_Produto=<?php echo $dados['ID_Produto'];?>"><i class='bx bx-edit'></i></a>
                                <a href="6pagina-Excluir_Produto.php?ID_Produto=<?php echo $dados['ID_Produto'];?>"><i class='bx bx-trash'></i></a>
                     
                                </td>
                            </tr>
                          <?php
                           }
                          ?>   
                    </tbody>
                    </table>    

     <?php
       }
       $mysqli->close();
    ?>
    
</body>
</html>