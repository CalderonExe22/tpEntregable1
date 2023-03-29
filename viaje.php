<?php

/*a empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar 
el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos 
de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente
 a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y 
presente un menú que permita cargar la información del viaje, modificar y ver sus datos.*/


class viajes{

    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $cantPasajeros;
    private $infoPasajeros;

    /* asignigno un metodo construct para tomar los datos del viaje y asignarlos a las variables*/
    public function __construct($codViaje,$dest,$maxPasaj,$cantDePasajeros,){
        
        $this->codigoViaje = $codViaje;
        $this->destino = $dest;
        $this->cantMaxPasajeros = $maxPasaj;
        $this->cantPasajeros = $cantDePasajeros;

    }
    /*-----------------------------------------------------------------------------------------*/

    /*metodo para modificar la el codigo del viaje(utilizando el metodo set)*/
    public function setCodViaje($cambCodViaje){
        
        $this->codigoViaje = $cambCodViaje;
    }

    /*metodo para modificar el destino del viaje(utilizando el metodo set)*/
    public function setDestino($cambDestViaje){
       
        $this->destino = $cambDestViaje;

    }

    /*motodo para modificar la cantidad maxima de pasajeros(utilizando el metodo set)*/
    public function setCantidadMaxPasajeros($cambCantMaxPasaj){
       
        $this->cantMaxPasajeros = $cambCantMaxPasaj; 

    }

    /*metodo para modificar la cantidad de pasajeros (utilizando el metodo set)*/
    public function setCantPasajeros($cambCantPasajeros){

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

    /*modificamos el arreglo usando el metodo set*/
    public function setInfoPasajeros($laInfoPasajeros){
        $this->infoPasajeros = $laInfoPasajeros;
    }

    public function setNombrePasajero($nuevoNombre,$indice){

        $this->infoPasajeros[$indice]["nombre"] = $nuevoNombre ;
    }

    public function setApellidoNuevo($nuevoApellido,$indice){

        $this->infoPasajeros[$indice]["apellido"] = $nuevoApellido;
        
    }

    public function setCambNroDni($nuevoDni,$indice){

        $this->infoPasajeros[$indice]["numero de documento"] = $nuevoDni;
    }

    public function getInfoPasajeron(){
        return $this->infoPasajeros;
    }

    public function __toString(){
        
        return ("\n"."El codigo de viaje es: ".$this->getCodViaje()."\n".
                "\n"."El destino del viaje fue: ".$this->getDestino()."\n".
                "\n"."La cantidad maxima de pasajeros fue de: ". $this->getCantidadMaxPasajeros()."\n".
                "\n"."La cantidad de pasajeros que viajaron fue de: ". $this->getCantPasajeros()."\n");
            
    }

}

/* cree una clase adicional para los menus del programa testViaje.php, donde cada metodo es un menu del programa principal.
retorna el numero de la opcion elegida de los menus
*/

class opciones{

    private $opcion;
    private $opcion2;
    private $opcion3;

    /*muestra el menu principal y asigna el valor de la eleccion al atributo $opcion*/ 
    public function setmenuPrincipal(){
        
        echo "\n"."HOLA BIENVENIDO AL PROGRAMA "."\n";
        echo "1) Cargar informacion del viaje."."\n";
        echo "2) Modificar datos de pasajeros."."\n";
        echo "3) Modificar datos de viajes."."\n";
        echo "4) mostrar datos de viaje."."\n";
        echo "5) salir."."\n";
        echo "\n"."Ingrese alguna de las siguientes opciones: ";

        $laOpcion=trim(fgets(STDIN));

        /*esta instruccion evalua que el valor ingresado no sea un string y sea solamente un numero de las opciones*/
        while (!is_int($laOpcion) && !($laOpcion >= 1 && $laOpcion <= 5)) {
            echo "Debe ingresar un número entre 1 y 5: ";
            $laOpcion = trim(fgets(STDIN));
        }

        $this->opcion = $laOpcion;

    }

    /*muestra el menu de la opcion 2 del programa(modificar datos de pasajero) y asigna el valor de la opcion al atributo $opcion2*/
    public function setmenuOpcion2(){

        echo "\n"."1)modificar el nombre de la persona. "."\n";
        echo "2)modificar el apellido de una persona. "."\n";
        echo "3)modificar el numero de documento de una persona. "."\n";
        echo "4)modificar todos los datos."."\n";
        echo "5)salir."."\n";
        echo "\n"."ingrese el numero de su eleccion: ";

        $laOpcion2 = trim(fgets(STDIN));
        
        /*esta instruccion evalua que el valor ingresado no sea un string y sea solamente un numero de las opciones*/
        while (!is_int($laOpcion2) && !($laOpcion2 >= 1 && $laOpcion2 <= 5)) {
            echo "Debe ingresar un número entre 1 y 5: ";
            $laOpcion2 = trim(fgets(STDIN));
        }

        $this->opcion2 = $laOpcion2;
        
    }

    /*muestra el menu de la opcion 3 del programa(modificar datos de viaje) y asigna el valor de la opcion al atributo $opcion3*/
    public function setmenuOpcion3(){

        echo "\n"."1)Codigo del viaje. "."\n";
        echo "2)El destino del viaje."."\n";
        echo "3)La cantidad maxima de pasajeros a bordo. "."\n";
        echo "4)La cantidad de pasajeros. "."\n";
        echo "5)Todo."."\n";
        echo "6)Salir."."\n";
        echo "que dato desea modificar: ";

        $laOpcion3=trim(fgets(STDIN));

        /*esta instruccion evalua que el valor ingresado no sea un string y sea solamente un numero de las opciones*/
        while (!is_int($laOpcion3) && !($laOpcion3 >= 1 && $laOpcion3 <= 6)) {
            echo "Debe ingresar un número entre 1 y 6: ";
            $laOpcion3 = trim(fgets(STDIN));
        }

        $this->opcion3 = $laOpcion3;
        
    }

    /* cada get retorna el valor del atributo con la opcion elegida de los menus*/
    public function geteleccionMenu(){
        return $this->opcion;
    }

    public function geteleccionMenuOpcion2(){
        return $this->opcion2;
    }

    public function geteleccionMenuOpcion3(){
        return $this->opcion3;
    }

}



class numero_entre{

    private $opcionNumero;

    public function setnumeroEntre($numeroMay){

        $nro = trim(fgets(STDIN));

        while (!is_int($nro) && !($nro >= 1 && $nro <= $numeroMay)) {
            echo "Debe ingresar un número entre 1 y ".$numeroMay.": ";
            $nro = trim(fgets(STDIN));
        }
        $this->opcionNumero = $nro;
    }

    public function getOpcionPasajero(){
        return $this->opcionNumero;
    }
}

class soloString{

    private $esString;

    public function esString(){
        
        $string = trim(fgets(STDIN));

        while(ctype_alpha($string) == false){

            echo "ingrese solo letras, no numeros: ";
            $string = trim(fgets(STDIN));
            
        }
        
        $this->esString = $string;
    }

    public function getString(){
        return $this->esString;
    }
}