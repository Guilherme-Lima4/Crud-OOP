<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<script language="javascript" type="text/javascript">
   function formatarMoeda() {
      var elemento = document.getElementById('preco');
      var valor = preco.value;

      valor = valor + '';
      valor = parseInt(valor.replace(/[\D]+/g, ''));
      valor = valor + '';
      valor = valor.replace(/([0-9]{2})$/g, ",$1");

      if (valor.length > 6) {
         valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
      }
      elemento.value = valor;
   }

   function validar(formulario) {
      var quantidade = form.quantidade.value;
      var preco = form.preco.value;
      for (i = 0; i <= formulario.length - 2; i++) {
         if ((formulario[i].value == "")) {
            alert("Preencha o campo " + formulario[i].name);
            formulario[i].focus();
            return false;
         }
      }

      if (quantidade <= 0) {
         alert('A quantidade de páginas não pode ser igual ou inferior
            a 0 ');
            form.quantidade.focus();
            return false;
         }
         if (preco <= 0) {
            alert('O preço do livro não pode ser igual ou infeiror a 0');
            form.preco.focus();
            return false;
         }
         formulario.submit();
      }
</script>

<body>
   <?php include("menu.php") ?>
   <div class="row">
   <form method="post" action="../controller/controllerCadastro.php" name="dados" onSubmit="return enviardados();">


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
                <input name="quantidade" type="number" id="quantidade" size="52" maxlength="150" class="formbutton">
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
        </td>
    </tr>
</table>
</form>
   </div>

</body>

</html>