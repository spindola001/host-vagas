<?php

require __DIR__."/vendor/autoload.php";

use App\Entity\Vagas;

define('TITLE', 'Cadastrar vaga');
define('ACTION', 'Cadastrar');

$objVaga = new Vagas ();

if (isset($_POST["titulo"], $_POST["descricao"], $_POST["status"])) {
    $objVaga->titulo = $_POST["titulo"];
    $objVaga->descricao = $_POST["descricao"];
    $objVaga->status = $_POST["status"];

    $objVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formulario.php";
include __DIR__."/includes/footer.php";