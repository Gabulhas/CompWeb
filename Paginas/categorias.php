<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="categorias.css">
    <meta charset="utf-8">
    <style media="screen">
    .centerTable { margin: 0px auto; }
      li.navbar a.navbar {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      li.navbar a.navbar:hover {
        color:white;

      }
    </style>
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
    <a href="#">Procurar Por Data</a>
    <a href="#">Todos</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">INFORMAÇÔES
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="sobre.html">Sobre</a>
    <a href="contactos.html">Contatos</a>
    <a href="#">Todos</a>
  </div>
</div>
<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</header>
<?php
$servername = "sql106.epizy.com";
$username = "epiz_23220210";
$password = "eBxNo7qICN";
$dbname = "epiz_23220210_eventos";


$conn = new mysqli($servername, $username, $password, $dbname);
?>
<div class="dropdown">
<label for="categoriaSel"> Selecione uma categoria para procurar por eventos:</label><br>
<form method="post">
<select class="dropbtn" name="categoriaSel">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
  <option value="Artes">Artes</option>
  <option value="Musica">Musica</option>
  <option value="Noite">Noite</option>
  <option value="Cultura">Cultura</option>
  <option value="Desporto">Desporto</option>
  <option value="Exposicao">Exposicao</option>
</select>
<input type="submit" value="Pesquisar"/>
</form>
  </div>
</div>
<?php
$select = $_POST['categoriaSel'];
$sql = "SELECT `id` ,`nome` , `data`, `descricao`, `preco` , `localizacao`, `hora` ,`categoria` ,`imagem` FROM `eventos` WHERE categoria ='$select'";
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
        <td>{$row['nome']}</td>
        <td>{$row['data']}</td>
        <td>{$row['preco']}€</td>
        <td>{$row['hora']}</td>
        <td><img src='$imagem'height='100' width='100'></td>
        <td><a href='http://covilha-eventos.cf/evento.php?id=$id'>MAIS</a></td>
        </tr>";
}
?>
</table>

  </body>
<footer>
<p> A construção do website tem como propósito de reunir os eventos da cidade da Covilhã e localidades vizinhas de forma a proporcionar informação clara e de fácil acesso, para assim servir o público. </p>
</footer>
</html>
