<?php

class PortalRegistro
{
    public function __construct(
        private string $nombrePortal, 
        private array $portal = []
    ) {}

    public function getNombre(): string
    {
        return $this->nombrePortal;
    }

    public function documentoMasTiempoArchivado(array $documentos): string
    {
        $resultado = $documentos[0];
        foreach ($documentos as $documento) {
            if ($documento->getFechaRegistro() < $resultado->getFechaRegistro()) {
                $resultado = $documento;
            }
        }
        return $resultado->getNombre();
    }

    public function comparacionDeFechas(array $documentos, string $fechaInicio, string $fechaFin): array
    {
        $documentosEntreFechas = [];
        foreach ($documentos as $documento) {
            $fechaDocumento = $documento->getFechaRegistro();
            if ($fechaDocumento >= $fechaInicio && $fechaDocumento <= $fechaFin) {
                $documentosEntreFechas[] = $documento;
            }
        }
        return $documentosEntreFechas;
    }

    public function __toString(): string
    {
        return 'Portal de registro de Archivos: ' . $this->getNombre() . PHP_EOL;
    }
}