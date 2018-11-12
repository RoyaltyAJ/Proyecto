<?php
    include_once "Pais.php";
    
    class España extends Pais 
    {
        public static $impuesto = 0.7;
        public static $precio_por_libra = [10];
        public static $precio_servicio = 150; 
    }