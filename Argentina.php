<?php
    include_once "Pais.php";
    
    class Argentina extends Pais 
    {
        public static $impuesto = 0.7;
        public static $precio_por_libra = [350, 100];
        public static $precio_servicio = 1500;
        public static $peso_maximo = 6;
    }