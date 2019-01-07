<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="categorias.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<header>

  <img class="imagemHome" src="imagens/header3.jpg" alt="" width="1550" >
  <img class="logo" src="imagens/logo.png" alt="" >
  <div class="topnav" id="myTopnav">
  <a href="inicio.html">INICIO</a>
  <div class="dropdown">
  <button class="dropbtn">EVENTOS
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="categorias.php">Categorias</a>
    <a href="data.php">Procurar Por Data</a>
    <a href="todos.php">Todos</a>
  </div>
  </div>
  <div class="dropdown">
  <button class="dropbtn">INFORMAÇÔES
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="sobre.html">Sobre</a>
    <a href="contactos.html">Contatos</a>
  </div>
  </div>

  </div>
</header>
<?php
$servername = "sql106.epizy.com";
$username = "epiz_23220210";
$password = "eBxNo7qICN";
$dbname = "epiz_23220210_eventos";


$conn = new mysqli($servername, $username, $password, $dbname);
?>
<div class="drp">
<label for="categoriaSel"> Selecione uma categoria para procurar por eventos:</label><br>
<form method="post">
<input type="text" name="dia" value="DIA"><br>
<select class="drn" name="mes">drp</button>
  <div id="mydrp" class="drp-content">
 <option value="">MÊS</option>
  <option value="01">Janeiro</option>
  <option value="02">Fevereiro</option>
  <option value="03">Março</option>
  <option value="04">Abril</option>
  <option value="05">Maio</option>
  <option value="06">Junho</option>
  <option value="07">Julho</option>
  <option value="08">Agosto</option>
  <option value="09">Setembro</option>
  <option value="10">Outubro</option>
  <option value="11">Novembro</option>
  <option value="12">Dezembro</option>
</select>
<select class="drn" name="ano">drp</button>
  <div id="mydrp" class="drp-content">
  <option value="">ANO</option>
   <option value="2018">2018</option
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
</select>

<input type="submit" value="Pesquisar"/>
</form>
  </div>
</div>
<?php
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$select = $dia . "/" . $mes . "/" . $ano;
$sql = "SELECT `id` ,`nome` , `data`, `descricao`, `preco` , `localizacao`, `hora` ,`categoria` ,`imagem` FROM `eventos` WHERE data ='$select'";
$result = $conn->query($sql);
?>
<table class="centerTable"  style="width:100%; border: 2px solid black; vertical-align: bottom;">
  <tr>
    <th align="left">NOME</th>
    <th align="left">DATA</th>
    <th align="left">PRECO</th>
    <th align="left">HORA</th>
    <th align="left">FOTO</th>
    <th align="left">MAIS</th>

  </tr>
<?php
while($row = $result->fetch_assoc()){
   $imagem= $row['imagem'];
   $id= $row['id'];
    echo"
        <tr>
        <td><a href='evento.php?id=$id' STYLE="TEXT-DECORATION: NONE">{$row['nome']}</a></td>
        <td>{$row['data']}</td>
        <td>{$row['preco']}€</td>
        <td>{$row['hora']}</td>
        <td><img src='$imagem'height='100' width='100'></td>
        <td><a href='evento.php?id=$id'>MAIS</a></td>
        </tr>";
}
?>
</table>

  </body>
<footer>
<p> A construção do website tem como propósito de reunir os eventos da cidade da Covilhã e localidades vizinhas de forma a proporcionar informação clara e de fácil acesso, para assim servir o público. </p>
</footer>
</html>
