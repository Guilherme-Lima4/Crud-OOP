<?php require_once("../model/banco.php");?>

<!DOCTYPE html>

<html lang="pt.br">

    
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro livro</title>
</head>



<body style="background-color:#DCDCDC">



    <form method="post" action="../controller/cadastro.php?acao=inserir" name="dados" onSubmit="return enviardados();">


        <style>
            table.center {
                margin-top: 220px;
            }
        </style>

        <table class="center" width="650" height="300" border="0px" align="center">

            
            

            <tr>
                <td width="118">
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome do livro:</font>
                </td>
                <td width="460">
                    <input name="nome" type="text" class="formbutton" id="nome" size="52" maxlength="150">
                </td>
            </tr>



            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Autor:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="autor" type="text" id="data" class="formbutton">
                    </font>
                </td>
            </tr>



            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Qtd. de páginas:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="qtdpag" type="number" id="qtdpag" size="52" maxlength="150" class="formbutton">
                    </font>
                </td>
            </tr>



            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Preco:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="preco" type="number" id="preco" size="52" maxlength="150" class="formbutton">
                    </font>
                </td>
            </tr>
            
            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="data" type="date" id="data" class="formbutton">
                    </font>
                </td>
            </tr>
            
            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Flag:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="flag" type="number" id="flag" class="formbutton">
                    </font>
                </td>
            </tr>
            
            <tr>
                <td height="85">
                    <p><strong>
                            <font face="Verdana, Arial, Helvetica, sans-serif">
                                <font size="1">
                                </font>
                            </font>
                        </strong></p>
                </td>
            </tr>
            
            <tr>
                <td height="22"></td>
                <td>
                <input name="Reset" type="reset" class="formobjects" value="Limpar campos"> 
                <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
                <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="../controller/cadastro.php?acao=selecionar">Ver Livros
                </button>
                    <!--<input name="Submit" type="submit" class="formobjects" value="Cadastrar">-->
                    <!-- <input name="Reset" type="reset" class="formobjects" value="Limpar campos">
                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="select_variavel_a.php">ler
                    </button>

                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="insert.php">cadastrar
                    </button>
                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="deletar.php">delete
                    </button> -->
                    <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
                </td>
            </tr>
        </table>
    </form>
</body>

        

</html>