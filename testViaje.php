<?php

include_once("viaje.php");


/**
 * muestra el menu principal y RETORNA el valor de la eleccion 
 * @return int $laOpcion
 */

 function menuPrincipal(){
        
    echo "\n"."HOLA BIENVENIDO AL PROGRAMA "."\n";
    echo "1) Modificar datos de pasajeros."."\n";
    echo "2) Modificar datos de viajes."."\n";
    echo "3) mostrar datos de viaje y pasajeros."."\n";
    echo "4) salir."."\n";
    echo "\n"."Ingrese alguna de las siguientes opciones: ";

    $laOpcion=trim(fgets(STDIN));

    /*esta instruccion evalua que el valor ingresado no sea un string y sea solamente un numero de las opciones*/
    while (!is_int($laOpcion) && !($laOpcion >= 1 && $laOpcion <= 4)) {
        echo "Debe ingresar un número entre 1 y 4: ";
        $laOpcion = trim(fgets(STDIN));
    }

    return $laOpcion;

}

/**
 *  muestra el menu de la opcion 2 del programa(modificar datos de pasajero) y retorna el valor de la opcion 
 * @return int $laOpcion2
 */

    function menuOpcion2(){

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

    return $laOpcion2;
    
}



/**
 * muestra el menu de la opcion 3 del programa(modificar datos de viaje) y retorna el valor de la opcion 
 * @return int $laOpcion3
 */
   function menuOpcion3(){

    echo "\n"."1)Codigo del viaje. "."\n";
    echo "2)El destino del viaje."."\n";
    echo "3)La cantidad maxima de pasajeros a bordo. "."\n";
    echo "4)Todo."."\n";
    echo "5)Salir."."\n";
    echo "que dato desea modificar: ";

    $laOpcion3=trim(fgets(STDIN));

    /*esta instruccion evalua que el valor ingresado no sea un string y sea solamente un numero de las opciones*/
    while (!is_int($laOpcion3) && !($laOpcion3 >= 1 && $laOpcion3 <= 5)) {
        echo "Debe ingresar un número entre 1 y 5: ";
        $laOpcion3 = trim(fgets(STDIN));
    }

    return $laOpcion3;
    
}

/**
 *  devolver un numero de opcion elegida solo si este se encuentra dentro de las opciones del menu
 * @param int $numeroMay
 * @return int $nro
 */

 function numeroEntre($numeroMay){/*se ingresa el valor del total de las opciones a elegir*/

    $nro = trim(fgets(STDIN));

    /*instruccion para determinar si el valor ingresado se encuentra entre los numeros disponibles*/
    while (!is_int($nro) && !($nro >= 1 && $nro <= $numeroMay)) {
        echo "Debe ingresar un número entre 1 y ".$numeroMay.": ";
        $nro = trim(fgets(STDIN));
    }
    return $nro;
}


/** 
 * verifica si el dato ingresado a la variable es un string
 * @param string $string
 * @return string $string
 */
function esString(){
        
    $string = trim(fgets(STDIN));/*se ingresa el valor*/

    while(ctype_alpha($string) == false){/*se valida si es una cadena del tipo string con ctype_alpha(devuelve un booleano)*/

        echo "ingrese solo letras, no numeros: ";
        $string = trim(fgets(STDIN));
        
    }
    
    return $string;
}

/**
 * nos devuelve el indice del pasajero al cual le vamos a modificar los datos usando su dni
 * @param int $elDni
 * @param array $datosPasajeros
 * @return int $elIndicePasajero
 */

 function indicePasajero($elDni,$losDatosPasajeros){
 /*int $e*/   
    $e=0;
    while($e<count($losDatosPasajeros)){
        if($losDatosPasajeros[$e]["numero de documento"]==$elDni){
            $elIndicePasajero = $e;
        }
        $e=$e+1;
        
    }
    return $elIndicePasajero;
}

         



/*PROGRAMA VIAJE FELIZ*/
/*muestra un menu de opciones que nos permine agregar, modificar y visualizar los datos tanto de un viaje ingresado o un pasajero*/

/* int $opcion, int $elCodijo,$laCantMaxPasajeros, $laCantPasajeros, $modificador, $nuevoCodViaje, $nroPersona, $laOpcion,$laOpcion2,$laOpcion3,
$modificadorPers,$numeroDoc,$nuevaCantMaxPasaj,$nuevaCantPasaj.$nuevoDni,$elDniPasajero
string $elDestino, $nuevoDestino,  $nuevoNombre,$nuevoApellido  ,$elApellidoPasajero,$elNOmbrePasajeros
obj $datosViajes
array $datosPasajeros*/ 

$datosPasajeros=[];/*iniciamos el array vacio*/


$datosViajes = new viajes(0,"nulo",0,0,$datosPasajeros);/*asigno datos a las variabres de tipo nulo para que se muestren en la opcion 4 si es que el usuario no ingresa ningun dato al programay este de error, ya que el objeto $datosViajes es un metodo __construct*/
             

echo "\n"."Ingrese el codigo del viaje: ";
$elCodijo = trim(fgets(STDIN));

/*pequeña instruccion para solo ingresar un valor tipo integ*/
while(!is_numeric($elCodijo)){
    echo "ingrese solo numeros: ";
    $elCodijo = trim(fgets(STDIN));
}

echo "\n"."Ingrese el destino del viaje: ";

$elDestino = esString();/*valida que sea un string*/

echo "\n"."Ingrese cantidad maxima de pasajeros a bordo: ";
$laCantMaxPasajeros = trim(fgets(STDIN));

/*instruccion para que el valor solo sea del tipo string y sea mayor a cero*/

while(is_numeric($laCantMaxPasajeros) && $laCantMaxPasajeros <= 0){
    echo "ingrese  un numero mayor a 0: ";
    $laCantMaxPasajeros = trim(fgets(STDIN));
    
}

    /*instruccion para ingresar la cantidad de pasajeros que indique la maxima capacidad anteriormente ingresada*/
    while(count($datosPasajeros) < $laCantMaxPasajeros){
        echo "ingrese nombre del pasajero: ";
        $elNOmbrePasajeros = esString();
    
        echo "ingrese el apellido del pasajero: ";
        $elApellidoPasajero = esString();

        echo "ingresa dni del pasajero: ";
        $elDniPasajero = trim(fgets(STDIN));

        while(!is_numeric($elDniPasajero)){ 
            echo "ingrese solo numeros: ";
            $elDniPasajero= trim(fgets(STDIN)); 
    
        }

        /*se crea el array de los pasajeros*/
        $elIndice = count($datosPasajeros);
        $datosPasajeros[$elIndice]["nombre"] = $elNOmbrePasajeros;
        $datosPasajeros[$elIndice]["apellido"] = $elApellidoPasajero;
        $datosPasajeros[$elIndice]["numero de documento"] = $elDniPasajero;
 
    }

    $laCantPasajeros = count($datosPasajeros); /*indicamos la cantidad de pasajeros con un count*/
    $datosViajes = new viajes($elCodijo,$elDestino,$laCantMaxPasajeros,$laCantPasajeros,$datosPasajeros);/*instanciar objeto datos agregados de un viaje*/
  
  
do{
    
    $opcion = menuPrincipal();/*muestra el menu principal*/
     
    
    switch($opcion){
        
        case 1:

            $modificadorPers =  menuOpcion2();/*muestra el menu de la opcion 2 y retorna el valor de la opcion elegida*/
            
            
            switch($modificadorPers){
                case 1:

                    echo "\n"."Ingrese el numero de documento de la persona a modificar: ";
                    $numeroDoc = trim(fgets(STDIN));
                    while(!is_numeric($numeroDoc)){
                        echo "ingrese solo numeros: ";
                        $numeroDoc = trim(fgets(STDIN));
                    }

                    $nroPersona = indicePasajero($numeroDoc,$datosViajes->getInfoPasajeron());/*retorna el indice de la persona con el dni ingresado*/

                    echo "\n"."ingrese el nuevo nombre de la persona: ";
                   
                    $nuevoNombre = esString();

                    $datosViajes->setNombrePasajero($nuevoNombre,$nroPersona); /* se ingresan los datos modificados al array de los datos de los pasajeros con la instruccion set*/
                    
                    break;

                break;   
                case 2:

                    echo "\n"."Ingrese el numero de documento de la persona a modificar: ";
                    $numeroDoc = trim(fgets(STDIN));
                    while(!is_numeric($numeroDoc)){
                        echo "ingrese solo numeros: ";
                        $numeroDoc = trim(fgets(STDIN));
                    }
                    $nroPersona = indicePasajero($numeroDoc,$datosViajes->getInfoPasajeron());/*retorna el indice de la persona con el dni ingresado*/
                    
                    echo "\n"."ingrese el nuevo apellido de la persona: ";
                    
                    $nuevoApellido = esString();

                    $datosViajes->setApellidoNuevo($nuevoApellido,$nroPersona);
                    
                    break;

                case 3:
                    
                    echo "\n"."Ingrese el numero de documento de la persona a modificar: ";
                    $numeroDoc = trim(fgets(STDIN));
                    while(!is_numeric($numeroDoc)){
                        echo "ingrese solo numeros: ";
                        $numeroDoc = trim(fgets(STDIN));
                    }
                    $nroPersona = indicePasajero($numeroDoc,$datosViajes->getInfoPasajeron());/*retorna el indice de la persona con el dni ingresado*/

                    echo "\n"."ingrese el nuevo numero de documento de la persona: ";
                    $nuevoDni = trim(fgets(STDIN));
                    while(!is_numeric($nuevoDni)){
                        echo "ingrese solo numeros: ";
                        $nuevoDni = trim(fgets(STDIN));
                    }

                    $datosViajes->setCambNroDni($nuevoDni,$nroPersona);
                    
                    break;

                case 4:
                    
                    echo "\n"."Ingrese el numero de documento de la persona a modificar: ";
                    $numeroDoc = trim(fgets(STDIN));
                    while(!is_numeric($numeroDoc)){
                        echo "ingrese solo numeros: ";
                        $numeroDoc = trim(fgets(STDIN));
                    }
                    $nroPersona = indicePasajero($numeroDoc,$datosViajes->getInfoPasajeron());/*retorna el indice de la persona con el dni ingresado*/

                    echo "\n"."ingrese el nuevo nombre de la persona: ";
                   
                    $nuevoNombre = esString();

                    echo "\n"."ingrese el nuevo apellido de la persona: ";
                    
                    $nuevoApellido = esString();

                    echo "\n"."ingrese el nuevo numero de documento de la persona: ";
                    $nuevoDni = trim(fgets(STDIN));

                    while(!is_numeric($nuevoDni)){
                        echo "ingrese solo numeros: ";
                        $nuevoDni = trim(fgets(STDIN));
                    }

                    /*se agregan los datos modificados a traves de un set*/
                    $datosViajes->setNombrePasajero($nuevoNombre,$nroPersona);
                    $datosViajes->setApellidoNuevo($nuevoApellido,$nroPersona) ;
                    $datosViajes->setCambNroDni($nuevoDni,$nroPersona );
                    $datosViajes->setInfoPasajeros($datosPasajeros);

                    
                    break;
            }
            break;
        case 2:

            $modificador =  menuOpcion3();

            switch($modificador){
                case 1:

                    echo "\n"."Ingrese el nuevo codigo de viaje: ";
                    $nuevoCodViaje = trim(fgets(STDIN));
                    while(!is_numeric($nuevoCodViaje)){
                        echo "ingrese solo numeros: ";
                        $nuevoCodViaje = trim(fgets(STDIN));
                    }
                    $datosViajes->setCodViaje($nuevoCodViaje);
                    break;

                case 2:

                    echo "\n"."Ingrese el nuevo destino del viaje: ";
                    
                    $nuevoDestino = esString();
                    $datosViajes->setDestino($nuevoDestino);
                    
                    break;
                
                case 3:
                    echo "\n"."Ingrese una nueva cantidad maxima de pasajeros: ";
                    $nuevaCantMaxPasaj = trim(fgets(STDIN));
                    while(is_numeric($nuevaCantMaxPasaj) && $nuevaCantMaxPasaj <= 0){
                        echo "ingrese  un numero mayor a 0: ";
                        $nuevaCantMaxPasaj = trim(fgets(STDIN));
                        
                    }
                    $datosViajes->setCantidadMaxPasajeros($nuevaCantMaxPasaj);
                    
                    while(count($datosViajes->getInfoPasajeron()) < $datosViajes->getCantidadMaxPasajeros()){
                        echo "ingrese nombre del pasajero: ";
                        $elNOmbrePasajeros = esString();
                    
                        echo "ingrese el apellido del pasajero: ";
                        $elApellidoPasajero = esString();
                
                        echo "ingresa dni del pasajero: ";
                        $elDniPasajero = trim(fgets(STDIN));
                
                        while(!is_numeric($elDniPasajero)){ 
                            echo "ingrese solo numeros: ";
                            $elDniPasajero= trim(fgets(STDIN)); 
                    
                        }
                
                        /*ingresamos mas datos al array con el metodo set*/
                        $elIndice = count( $datosViajes->getInfoPasajeron());
                        $datosViajes->masPasajero($elNOmbrePasajeros, $elApellidoPasajero,$elDniPasajero,$elIndice);
                        $datosViajes->setCantPasajeros(count($datosViajes->getInfoPasajeron()));
                      
                    }
                    break;

                case 4:
                    echo "\n"."Ingrese el nuevo codigo de viaje: ";
                    $nuevoCodViaje = trim(fgets(STDIN));
                    while(!is_numeric($nuevoCodViaje)){
                        echo "ingrese solo numeros: ";
                        $nuevoCodViaje = trim(fgets(STDIN));
                    }
                    $datosViajes->setCodViaje($nuevoCodViaje);

                    echo "\n"."Ingrese el nuevo destino del viaje: ";
                    
                    $nuevoDestino = esString();
                    $datosViajes->setDestino($nuevoDestino);
                    

                    echo "\n"."Ingrese una nueva cantidad maxima de pasajeros: ";
                    $nuevaCantMaxPasaj = trim(fgets(STDIN));
                    while(is_numeric($nuevaCantMaxPasaj) && $nuevaCantMaxPasaj <= 0){
                        echo "ingrese  un numero mayor a 0: ";
                        $nuevaCantMaxPasaj = trim(fgets(STDIN));
                        
                    }
                    $datosViajes->setCantidadMaxPasajeros($nuevaCantMaxPasaj);
                    
                    while(count($datosViajes->getInfoPasajeron()) < $nuevaCantMaxPasaj){
                        echo "ingrese nombre del pasajero: ";
                        $elNOmbrePasajeros = esString();
                    
                        echo "ingrese el apellido del pasajero: ";
                        $elApellidoPasajero = esString();
                
                        echo "ingresa dni del pasajero: ";
                        $elDniPasajero = trim(fgets(STDIN));
                
                        while(!is_numeric($elDniPasajero)){ 
                            echo "ingrese solo numeros: ";
                            $elDniPasajero= trim(fgets(STDIN)); 
                    
                        }
                
                        /*ingresamos mas datos al array con el metodo set*/
                        $elIndice = count( $datosViajes->getInfoPasajeron());
                        $datosViajes->masPasajero($elNOmbrePasajeros, $elApellidoPasajero,$elDniPasajero,$elIndice);
                        $datosViajes->setCantPasajeros($elIndice);
                 
                    }
                    
                    break;
                break;
            }
            
            break;
        case 3: 

                echo $datosViajes;/*metodo __toString*/

            break;
    }


}while($opcion != 4);



