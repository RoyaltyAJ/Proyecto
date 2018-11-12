<?php
    include_once "Colombia.php";
    include_once "Japon.php";
    include_once "Argentina.php";
    include_once "Canada.php";
    include_once "España.php";
    include_once "IEmpresa.php";    

    class Empresa implements IEmpresa
    {

        private $Pais;
        private $Total;

        public function setPais($Pais)
        {
                $this->Pais = new $Pais();
        }

        public function calcular($peso)
        {
        	$costo_servicio = $this->Pais::$precio_servicio;

        	if ($this->Pais::$peso_maximo) {

        		if ($peso > $this->Pais::$peso_maximo) {
        			$costo_por_peso = $peso * $this->Pais::$precio_por_libra[1];
        		} else {
        			$costo_por_peso = $peso * $this->Pais::$precio_por_libra[0];
        		}

        	} else {
        		$costo_por_peso = $peso * $this->Pais::$precio_por_libra[0];
        	}

            if ($this->Pais::$impuesto) {
                $costo_impuesto = $this->Pais::$impuesto;
                $costo_impuesto = $costo_impuesto * ($costo_por_peso+$costo_servicio);
            } else {
                $costo_impuesto = 0;
            }
		$this->Total = $costo_impuesto + $costo_servicio + $costo_por_peso;
        }

        public function getTodo($peso) {
                $this->calcular($peso);
        	$todo = array(
                	'total' => $this->Total,
            	);
       		return $todo;
        }
    }
