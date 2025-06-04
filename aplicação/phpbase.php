<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

//conexão com o banco rapazeada

$conn = new mysqli("localhost", "root", "", "teste_seguro");

//vulnerabilidade a sql injection

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";
$result = $conn->query($sql);

if($result->num_rows > 0 ) {
    echo 'login bem sucedido';
} else {
    echo 'usuario ou senha invalida!!!!!!!'
}

?>