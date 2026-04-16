<?php
$conn = new mysqli("db","root","kazuma","newkazu");

if ($conn->connect_errno){
    echo "Erro:" . $conn->connect_error;
}

echo"connect";
?>