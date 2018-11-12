<?php
    include_once "Pais.php";

    class Japon extends Pais 
    {
        public static $impuesto = 0.11;
        public static $precio_por_libra = [25, 10];
        public static $precio_servicio = 200;
        public static $peso_maximo = 2;
    }