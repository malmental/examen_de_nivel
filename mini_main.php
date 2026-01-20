<?php
require_once 'Documento.php';
require_once 'TipoDocumento.php';
require_once 'PortalRegistro.php';

$documento1 = new Documento('fotografia_familiar.png', TipoDocumento::FOTOGRAFIA, '1999-12-31', '2000-01-20', 'fotografia tomada en casa');
$documento2 = new Documento('video_vacaciones_verano.mpg', TipoDocumento::VIDEO, '2001-06-25', '2001-07-15', 'Playa de albacete');
$documento3 = new Documento('traduccion_testamento.txt', TipoDocumento::TEXTO, '2002-03-21', '2005-02-22', 'notaria numero 3');
$documento4 = new Documento('cancion_banda_de_luxo.wav', TipoDocumento::AUDIO, '2006-05-25', '2007-01-27', 'Estudio de grabacion');

$documentos = [$documento1, $documento2, $documento3, $documento4];

$portal = new PortalRegistro('Portal de Registro familiar');
echo 'Portal: ' . $portal->__toString() . PHP_EOL;

// ---------------------------------------
// Documeto que lleva más tiempo archivado
// ---------------------------------------
$documentoMasAntiguo = $portal->documentoMasTiempoArchivado($documentos);
echo 'El Documento que llevas mas tiempo archivado es: ' . $documentoMasAntiguo . PHP_EOL;

// ----------------------------------------------------------------
// Metodo que devuelve Documentos comprendidos entre una fecha dada
// ----------------------------------------------------------------
$fechaInicio = '2001-06-24';
$fechaFin = '2006-05-28';
$resultado = $portal->comparacionDeFechas($documentos, $fechaInicio, $fechaFin);

echo 'Documentos encontrados entre: ' . $fechaInicio . ' y ' .  $fechaFin  . PHP_EOL;
foreach ($resultado as $documento) {
    echo $documento->getNombre() . $documento->getFechaRegistro() . PHP_EOL;
}