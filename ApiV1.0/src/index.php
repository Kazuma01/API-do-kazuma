<?php
// $conn = new mysqli("db","root","root","meu_banco");
// $sql = "INSERT INTO produtos(Name,Preco) VALUES ('placa de video', 2000.00)";

// if ($conn->query($sql) == true){
//     echo "Dados salvo";
// }else{
//     echo "ERRO:". $conn->error;
// }
// // 
// $result = $conn->query("SELECT * FROM produtos");

// while ($row = $result->fetch_assoc()){
//     echo $row["Name"] . "-" . $row["Preco"] . "<br>";
// }

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$conn = new mysqli("db","root","root","meu_banco");

if ($conn->connect_error){
    echo json_encode(["mensagem" => "Erro: ". $conn->connect_error]);
}else{
    echo json_encode(["mensagem" => "Api conectada porra:  " . 2 . 4]);   
}
?>  