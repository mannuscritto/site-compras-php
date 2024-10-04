<?php

require_once '../../dompdf/autoload.inc.php';
require_once '../../config/db.php';
require_once 'pedidosController.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('chroot', realpath(''));
$options->set('isRemoteEnabled', true);
//$options->set('debugPng', true);
//$options->set('debugKeepTemp', true);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

ob_start();

// Inclua o arquivo PHP que gera o HTML dinamicamente
// Certifique-se de que esse arquivo está retornando o HTML corretamente
$pInfo = pedido_read($_GET['id']);
include 'order-pdf.php';

// Capture a saída do buffer e armazene na variável $html
$html = ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>