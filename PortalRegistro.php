<?php

class PortalRegistro
{
    public function __construct(
        private string $nombrePortal, 
        private array $documentos = []
    ) {}

    public function anadirDocumento(Documento $documento): void
    {
        $this->documentos[] = $documento;
    }

    public function getNombre(): string
    {
        return $this->nombrePortal;
    }

    public function documentoMasTiempoArchivado(): string
    {
        $resultado = $this->documentos[0];

        foreach ($this->documentos as $documento) {
            if ($documento->getFechaRegistro() < $resultado->getFechaRegistro()) {
                $resultado = $documento;
            }
        }
        return $resultado->getNombre();
    }

    public function comprendidosEntreFechas(DateTime $fechaInicio, DateTime $fechaFin): array
    {
        $documentosEntreFechas = [];

        foreach ($this->documentos as $documento) {
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