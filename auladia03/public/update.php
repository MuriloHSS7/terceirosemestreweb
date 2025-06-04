<?php
require_once '../config/database.php';
require_once '../classes/usuario.php';

$db = (new Database())->conectar();
$usuario = new Usuario($db);

if ($_POST) {
    $usuario->id = $_POST['id'];
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->atualizar();
    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Nome: <input type="text" name="nome" value="<?= $row['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    <input type="submit" value="Atualizar">
</form>