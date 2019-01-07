<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="sobre.css">
    <meta charset="utf-8">
	<meta name="author" content="Daniel Mata, Guilherme Lopes">
	<meta name="keywords" content="eventos, Covilhã, festas, cultura, lazer, aventura, conhecimento, neve, universidade, cidade, pelourinho, arte urbana, festejo, lanifícios">
	<meta name="description" content="Website de promoção dos eventos da Covilhã e para fornecer ao público toda a informação acerca dos eventos da cidade.">
	<meta name="creation_date" content="02/01/2019">
	<meta name="contactNetworkAdress" content="daniel.mata@ubi.pt;guilherme.breia.lopes@ubi.pt">
	<link rel="shortcut icon" href="imagens/eventos.ico">

    <title></title>
  </head>
  <body>
<header>  
<img class="imagemHome" src="imagens/header.png" alt="cidade de noite" >
<img class="logo" src="imagens/logo.png" alt="logotipo" >
<?php
$servername = "sql106.epizy.com";
$username = "epiz_23220210";
$password = "eBxNo7qICN";
$dbname = "epiz_23220210_eventos";


$conn = new mysqli($servername, $username, $password, $dbname);
?>
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
<?php

$select = $_GET['id'];
$sql = "SELECT `id` ,`nome` , `data`, `descricao`, `preco` , `localizacao`, `hora` ,`categoria` ,`imagem` FROM `eventos` WHERE id ='$select'";
$result = $conn->query($sql);
?>

<article class="eventoBox">
<?php
while($row = $result->fetch_assoc()){
   $imagem= $row['imagem'];
   $id= $row['id'];
   $nome =utf8_encode($row['nome']);
   $localizacao =$row['localizacao'];
   $descricao =utf8_encode($row['descricao']);
echo "
  <h1>$nome</h1>
  <h2>{$row['data']} -{$row['hora']}</h2>
  <h3>{$row['preco']}€</h3>
  <h3>{$row['categoria']}</h3>
  <article style='height:500px;float:left;width:60%;overflow:hidden;'>$descricao</article>

  <img src='$imagem' style='margin-left: 700px;right:10px; top: auto;'>
  <iframe src='$localizacao' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
  ";}?>
?>
</article>

  </body>
</html>
