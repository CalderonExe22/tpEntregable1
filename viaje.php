<?php

/*a empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar 
el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos 
de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente
 a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y 
presente un menú que permita cargar la información del viaje, modificar y ver sus datos.*/


class viajes{
    /*int $codigoViaje,$cantMaxPasajeros,$cantPasajeros
      array $infoPasajeros
      string $destino,*/

    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $cantPasajeros;
    private $infoPasajeros;
    

    /* asignigno un metodo construct para tomar los datos del viaje y asignarlos a las variables*/
    public function __construct($codViaje,$dest,$maxPasaj,$cantDePasajeros,$laInfoPasajeros){
        /* int $codViaje,$dest,$maxPasaj,$cantDePasajeros
           string $dest*/

        $this->codigoViaje = $codViaje;
        $this->destino = $dest;
        $this->cantMaxPasajeros = $maxPasaj;
        $this->cantPasajeros = $cantDePasajeros;
        $this->infoPasajeros = $laInfoPasajeros;
        
    }
    /*-----------------------------------------------------------------------------------------*/

    /*metodo para modificar la el codigo del viaje(utilizando el metodo set)*/
    public function setCodViaje($cambCodViaje){
        /*int $cambCodViaje*/
        $this->codigoViaje = $cambCodViaje;
    }

    /*metodo para modificar el destino del viaje(utilizando el metodo set)*/
    public function setDestino($cambDestViaje){
       /* string $cambDestViaje*/
        $this->destino = $cambDestViaje;

    }

    /*motodo para modificar la cantidad maxima de pasajeros(utilizando el metodo set)*/
    public function setCantidadMaxPasajeros($cambCantMaxPasaj){
       /*int $cambCantMaxPasaj*/
        $this->cantMaxPasajeros = $cambCantMaxPasaj; 

    }

    /*metodo para modificar la cantidad de pasajeros (utilizando el metodo set)*/
    public function setCantPasajeros($cambCantPasajeros){
        /*$cambCantPasajeros*/
        $this->cantPasajeros = $cambCantPasajeros;
    }
    
    /*retorna el valor de cada atributo con la instruccion get*/
    public function getCodViaje(){
        return $this->codigoViaje;
    }

    public function getDestino(){
        return $this->destino;
    }

    public function getCantidadMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }

    public function getCantPasajeros(){
        return $this->cantPasajeros;
    }


    /*------------------------------------------------------*/

    public function setNombrePasajero($nuevoNombre,$indice){
        /*string $nuevoNombre int $indice*/

        $this->infoPasajeros[$indice]["nombre"] = $nuevoNombre ;
    }

    public function setApellidoNuevo($nuevoApellido,$indice){
        /*string $nuevoApellido int $indice*/
        $this->infoPasajeros[$indice]["apellido"] = $nuevoApellido;
        
    }

    public function setCambNroDni($nuevoDni,$indice){
        /*int $nuevoDni int $indice*/
        $this->infoPasajeros[$indice]["numero de documento"] = $nuevoDni;
    }

    public function masPasajero($nomb,$apell,$dni,$ind){
        
        $this->infoPasajeros[$ind]["nombre"] =$nomb;
        $this->infoPasajeros[$ind]["apellido"] =$apell;
        $this->infoPasajeros[$ind]["numero de documento"] = $dni;
    }
    /*funcion get para devolver el array modificado*/
    public function getInfoPasajeron(){
        return $this->infoPasajeros;
    }

    
    public function __toString(){
        /*string $mostrarPasajeros*/
        $mostrarPasajeros = "";

        for ($i=0; $i < count($this->getInfoPasajeron()); $i++) {
             $mostrarPasajeros = $mostrarPasajeros."\n"."nombre: ".$this->getInfoPasajeron()[$i]["nombre"]."\n".
            "Apellido: ".$this->getInfoPasajeron()[$i]["apellido"]."\n".
             "numero de documento: ".$this->getInfoPasajeron()[$i]["numero de documento"]."\n";
        }
        return     
            "\n"."El codigo de viaje es: ".$this->getCodViaje()."\n".
            "\n"."El destino del viaje fue: ".$this->getDestino()."\n".
            "\n"."La cantidad maxima de pasajeros fue de: ". $this->getCantidadMaxPasajeros()."\n".
            "\n"."La cantidad de pasajeros que viajaron fue de: ". $this->getCantPasajeros()."\n".
            $mostrarPasajeros;
          
    }

}



