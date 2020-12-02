<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Vagas;

$vagas = Vagas::getVagas();

// echo "<pre>";
//     print_r($vagas);
// echo "</pre>";
// exit;

include __DIR__."/includes/header.php";
include __DIR__."/includes/listagem.php";
include __DIR__."/includes/footer.php";
