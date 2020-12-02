<?php

require __DIR__."/vendor/autoload.php";

use App\Entity\Vagas;

define('TITLE', 'Editar vaga');
define('ACTION', 'Finalizar edição');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$objVaga = Vagas::getVaga($_GET['id']);

if (!$objVaga instanceof Vagas) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST["titulo"], $_POST["descricao"], $_POST["status"])) {
    $objVaga->titulo = $_POST["titulo"];
    $objVaga->descricao = $_POST["descricao"];
    $objVaga->status = $_POST["status"];

    $objVaga->atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formulario.php";
include __DIR__."/includes/footer.php";