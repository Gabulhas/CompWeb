<?php
$servername = "sql106.epizy.com";
$username = "epiz_23220210";
$password = "eBxNo7qICN";
$dbname = "epiz_23220210_eventos";
$select = $_POST['categoriaSel'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo ''.$select;
$sql = "SELECT `id`, `nome`, `data`, `preco`, `loacalizacao` FROM `eventos` WHERE categoria ='$select'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "EMP ID :{$row['id']}  <br> ".
         "EMP NAME : {$row['nome']} <br> ".
         "EMP DATA : {$row['data']} <br> ".
         "EMP DATA : {$row['preco']} <br> ".
         "EMP DATA : {$row['loacalizacao']} <br> ".

         "--------------------------------<br>";
}
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
