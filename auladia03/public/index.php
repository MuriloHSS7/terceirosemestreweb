<?php
require_once '../config/database.php';
require_once '../classes/usuario.php';

$db = (new Database())->conectar();
$usuario = new Usuario($db);
$stmt = $usuario->listar();

echo "<h1>Usuários</h1><a href='create.php'>Novo Usuário</a><ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<li>{$row['nome']} ({$row['email']})
<a href='update.php?id={$row['id']}'>Editar</a> 
<a href='delete.php?id={$row['id']}'>Excluir</a></li>";
}
echo "</ul>";