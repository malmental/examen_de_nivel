<?php
require_once 'Documento.php';
require_once 'TipoDocumento.php';
require_once 'PortalRegistro.php';

$portal = new PortalRegistro('Portal de Registro familiar');
$portal->anadirDocumento(new Documento('fotografia_familiar.png', TipoDocumento::FOTOGRAFIA, new DateTime('1999-12-31') , new DateTime('2000-01-20'), 'fotografia tomada en casa'));
$portal->anadirDocumento(new Documento('video_vacaciones_verano.mpg', TipoDocumento::VIDEO, new DateTime('2001-06-25'), new DateTime('2001-07-15'), 'Playa de albacete'));
$portal->anadirDocumento(new Documento('traduccion_testamento.txt', TipoDocumento::TEXTO, new DateTime('2002-03-21'), new DateTime('2005-02-22'), 'notaria numero 3'));
$portal->anadirDocumento(new Documento('cancion_banda_de_luxo.wav', TipoDocumento::AUDIO, new DateTime('2006-05-25'), new DateTime('2007-01-27'), 'Estudio de grabacion'));

$documentoMasAntiguo = $portal->documentoMasTiempoArchivado();
$resultado = $portal->comprendidosEntreFechas(new DateTime('2001-06-25'), new DateTime('2006-05-28'));

echo 'El Documento más antiguo es: ' . $documentoMasAntiguo . PHP_EOL;
echo 'El/los documentos entre las fechas son: ' . PHP_EOL;
var_dump($resultado);