<?php

class Documento
{
    public function __construct(
        private string $nombre,
        private TipoDocumento $tipo,
        private string $fechaDocumento,
        private string $fechaRegistro,
        private string $lugar
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getFechaRegistro(): string 
    {
        return $this->fechaRegistro;
    }

    public function __toString(): string
    {
        return 'Documento: ' . $this->nombre . PHP_EOL . 
                'Fecha registrado: ' . $this->fechaRegistro . PHP_EOL;
    }
} 
