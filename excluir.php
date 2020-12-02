<?php

require __DIR__."/vendor/autoload.php";

use App\Entity\Vagas;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$objVaga = Vagas::getVaga($_GET['id']);

if (!$objVaga instanceof Vagas) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST["excluir"])) {
    
    $objVaga->excluir();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/confirmar-exclusao.php";
include __DIR__."/includes/footer.php";