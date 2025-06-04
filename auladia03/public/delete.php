<?php
require_once '../config/database.php';
require_once '../classes/usuario.php';

$db = (new Database())->conectar();
$usuario = new Usuario($db);
$usuario->id = $_GET['id'];
$usuario->deletar();
header("Location: index.php");