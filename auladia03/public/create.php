<?php
require_once '../config/database.php';
require_once '../classes/usuario.php';

if ($_POST) {
    $db = (new Database())->conectar();
    $usuario = new Usuario($db);
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->criar();
    header("Location: index.php");
}
?>

<form method="post">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Salvar">
</form>