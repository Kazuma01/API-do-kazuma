<?php
$conn = new mysqli("db","root","root","meu_banco");
$sql = "INSERT INTO produtos(Name,Preco) VALUES ('placa de video', 2000.00)";

if ($conn->query($sql) == true){
    echo "Dados salvo";
}else{
    echo "ERRO:". $conn->error;
}
// 
$result = $conn->query("SELECT * FROM produtos");

while ($row = $result->fetch_assoc()){
    echo $row["Name"] . "-" . $row["Preco"] . "<br>";
}
?>  