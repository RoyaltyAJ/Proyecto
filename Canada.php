<?php
    include_once "Pais.php";

    class Canada extends Pais 
    {
        public static $precio_por_libra = [25, 20];
        public static $precio_servicio = 150;
        public static $peso_maximo = 4;
    }