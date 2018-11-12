<?php
    include_once "Pais.php";

    class Colombia extends Pais
    {
        public static $impuesto = 0.12;
        public static $precio_por_libra = [750, 500];
        public static $precio_servicio = 2000;
        public static $peso_maximo = 2;
    }