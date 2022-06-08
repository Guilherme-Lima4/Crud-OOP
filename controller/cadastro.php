<?php

#chamando o arquivo de conexao com o banco de dados
include_once "../model/banco.php";

#pegando o valor da acao via URL
$acao = $_GET['acao'];

#cpomparando se o valor pego da URL é do tipo GET
if (isset($_GET['id'])) {
    #criando uma variavel para armazenar o valor obtido do GET
    $id = $_GET['id'];
}


switch ($acao) {
    case 'inserir':
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $qtdpag = $_POST['qtdpag'];
        $preco = $_POST['preco'];
        $data = $_POST['data'];
        $flag = $_POST['flag'];

        $sql = "INSERT INTO livros (Autor, Data, Flag, Nome, Preco, Quantidade) VALUES ('$autor', '$data', 
    '$flag', '$nome', '$preco', '$qtdpag')";

        if (!mysqli_query($conn, $sql)) {
            die("Erro ao inserir as informações do formulário na tabela Livros: " . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
        alert('Dados cadastrados com sucesso!')
        window.location.href='cadastro.php?acao=selecionar'</script>";
        }
        break;

    case 'montar':
        $id = $_GET['livro_id'];
        $sql = 'select * FROM Livros WHERE livro_id =' . $id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        // montando formulario
        echo "<form method='post' name='dados' action='cadastro.php?acao=atualizar' onSubmit='return 
    enviardados();'>";
        echo "<table width='588' border='0' align='center' >";

        while ($registro = mysqli_fetch_array($resultado)) {
            echo "    <tr> ";
            echo "      <td width='118'><font size='1' face='Verdana, Arial, Helvetica,
        sans-serif'>Código do livro</font></td> ";
            echo "       <td width='460'>";
            echo "        <input name='id' type='text' class='formbutton' id='id' size='5'
        maxlength='10' value=" . $id . " readonly> ";
            echo "      </td> ";
            echo "    </tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Nome<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:nome;}</style>";
            echo "<textarea name='autor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['nome']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Autor<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:autor;}</style>";
            echo "<textarea name='autor' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['autor']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Qtd. Pag<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>number{resize:qtdpag;}</style>";
            echo "<textarea name='qtdpag' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Quantidade']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Preço<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>number{resize:preco;}</style>";
            echo "<textarea name='preco' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Preco']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Data<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>date{resize:mensagem;}</style>";
            echo "<textarea name='data' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Data']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";
            
            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Flag<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>number{resize:flag;}</style>";
            echo "<textarea name='flag' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['Flag']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo "<tr>";
            echo " <td height='22'></td>";
            echo " <td>";
            echo "<input name='Submit' type='submit'  class='formobjects' value='Atualizar'> ";
            echo " <button type='submit' formaction='crud.php?acao=selecionar'>Selecionar</button>   ";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "  </td>";
            echo "  </tr>";

            echo "</table>";
            echo "</form>   ";
        }
        
        mysqli_close($conn);
        break;

    case 'atualizar':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $qtdpag = $_POST['qtdpag'];
        $preco = $_POST['preco'];
        $data = $_POST['data'];
        $flag = $_POST['flag'];

        $sql = "UPDATE livros SET Nome = '" . $nome . "', Autor = '" . $autor . "', qtdpag = 
        '" . $qtdpag . "', preco = '" . $preco . "', Data = '" . $data . "', Flag = '" . $flag . "' WHERE livro_id = '" . $id . "'";

        if (!mysqli_query($conn, $sql)) {
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!')
            window.location.href='cadastro.php?acao=selecionar'</script>";
        }
        break;

    case 'deletar':
        $sql = "DELETE FROM livros WHERE livro_id = '" . $id . "'";
        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Dados excluidos com sucesso!')
                window.location.href='cadastro.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Location:cadastro.php?acao=selecionar");
        break;
        break;

    case 'selecionar':
        date_default_timezone_Set('America/Sao_Paulo');
        header("Content-type: text/html; charset=utf-8");
        include_once "../model/banco.php";

        echo "<meta charset='UTF-8'>";
        echo "<style>
            table.center {
                margin-top: 180px;
                border-radius: 10px;
                border-style: groove;
                width:70%;
            }
            table {
                border-collapse:collapse;
            }
            th {
                background-color: #87CEEB;
                border: 1px;
                font: 15px Arial, sans-serif;
                border-style: groove;
                text-align: center;
            }
            tr {
                border: 1px;
                border-radius: 10px;
                border-style: groove;
                text-align: center;
                font: 15px Arial, sans-serif;
            }
            td {
                border: 0px;
                border-radius: 10px;
                border-style: groove;
                text-align: center;
                font: 15px Arial, sans-serif;
            }
        
    </style>";
        echo "<center><table class= center border= 0px>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nome</th>";
        echo "<th>Autor</th>";
        echo "<th>Qtd. Paginas</th>";
        echo "<th>Preço</th>";
        echo "<th>Data</th>";
        echo "<th>Flag</th>";
        echo "<th>Ações</th>";
        echo "</th>";

        $sql = "SELECT * FROM livros";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER> ";
        echo "</br>";

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['livro_id'];
            $nome = $registro['Nome'];
            $autor = $registro['Autor'];
            $quantidade = $registro['Quantidade'];
            $preco = $registro['Preco'];
            $data = $registro['Data'];
            $flag = $registro['Flag'];

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $autor . "</td>";
            echo "<td>" . $quantidade . "</td>";
            echo "<td>" . $preco . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($data)) . "</td>";
            echo "<td>" . $flag . "</td>";
            echo "<td><a href='cadastro.php?acao=deletar&id=$id'><img src='deleteee_crud.png' height='50' width='50' alt='Deletar' title='Deletar registro'></
        a><a href='cadastro.php?acao=montar&id=$id'><img src='editt_crud.png' height='50' width='50' alt='Atualizar' title='Atualizar registro'></
        a><a href='../view/index.php'><img src='insertt_crud.png' alt='Inserir' title='Inserir registro'></
        a>";

            echo "</tr>";
        }
        mysqli_close($conn);
        break;

    default:
        header("Location:cadastro.php?acao=selecionar");
        break;
}