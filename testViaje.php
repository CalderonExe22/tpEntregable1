<?php

include_once("viaje.php");

/*PROGRAMA VIAJE FELIZ*/
/* int $opcion, int $elCodijo,$laCantMaxPasajeros, $laCantPasajeros, $modificador, $nuevoCodViaje, $nroPersona,$cd,$cmp,$cp
   string $elDestino, $nuevoDestino,  $nuevoNombre, $d
   obj $datosViajes
   array $datosPasajeros*/ 
   
   
/*array de prueba*/
$datosPasajeros[0]=["nombre"=>"marcos",
                    "apellido"=>"fernandez",
                    "numero de documento"=>44455678,];
$datosPasajeros[1]=["nombre"=>"raul",
                    "apellido"=>"alvares",
                    "numero de documento"=>43465698,];
    
                    
/*asigno datos a las variabres de tipo nulo para que se muestren en la opcion 4 si es que el usuario no ingresa ningun dato al programa
y este de error, ya que el objeto $datosViajes es un metodo __construct*/                   
$elCodijo=0;
$elDestino="nulo";
$laCantMaxPasajeros=1;
$laCantPasajeros=1;
$datosViajes = new viajes($elCodijo,$elDestino,$laCantMaxPasajeros,$laCantPasajeros);/*instanciar objeto datos del viaje predeterminados*/

do{
    
    $esString = new soloString();/*instanciar objeto de solo ingresar un string*/

    $numeroEntre = new numero_entre();/*instanciar objeto de numero entre*/

    $losMenus = new opciones();/*instanciar objeto de  opciones */

    $losMenus->setmenuPrincipal();/*muestra el menu principal*/
    
    $opcion = $losMenus->geteleccionMenu();/*retorna el valor de la opcion elegida*/

    
    
    switch($opcion){
        case 1:

            echo "\n"."Ingrese el codigo del viaje: ";
            $elCodijo = trim(fgets(STDIN));

            /*pequeña instruccion para solo ingresar un valor tipo integ*/
            while(!is_numeric($elCodijo)){
                echo "ingrese solo numeros: ";
                $elCodijo = trim(fgets(STDIN));
            }

            echo "\n"."Ingrese el destino del viaje: ";
            $esString->esString();/*se ingresa el valor*/
            $elDestino = $esString->getString();/*retorna el valor solo si es string*/

            echo "\n"."Ingrese cantidad maxima de pasajeros a bordo: ";
            $laCantMaxPasajeros = trim(fgets(STDIN));
            
            /*instruccion para que el valor solo sea del tipo string y sea mayor a cero*/
            while(is_numeric($laCantMaxPasajeros) && $laCantMaxPasajeros <= 0){
                echo "ingrese  un numero mayor a 0: ";
                $laCantMaxPasajeros = trim(fgets(STDIN));
                
            }

            echo "\n"."Ingrese el numero de pasajeros a bordo: ";
            $numeroEntre->setnumeroEntre($laCantMaxPasajeros);/*se ingresa el valor*/
            $laCantPasajeros = $numeroEntre->getnumeroEntre();/*retorna solo si el valor es un numero mayor a 0 pero que tambien no sobrepase la cantidad maxima de pasajeros*/

            $datosViajes = new viajes($elCodijo,$elDestino,$laCantMaxPasajeros,$laCantPasajeros);/*instanciar objeto datos agregados de un viaje*/
            

            break;
        case 2:

            $losMenus->setmenuOpcion2();/*muestra el menu de la opcion 2*/

            $modificadorPers = $losMenus->geteleccionMenuOpcion2();/*retorna el valor de la opcion elegida*/

            $datosViajes->setInfoPasajeros($datosPasajeros);/*agregamos los datos de los pasajeros a nuestra class atraves de un set*/
           
            switch($modificadorPers){
                case 1:

                    /*atraves de un for, muestro los datos del pasajero y el usuario elige el numero del pasajero al cual quiera cambiar sus datos*/
                    for($e=0;$e<count($datosPasajeros);$e++){
                        echo "\n".$e+1 .") Nombre: ".$datosPasajeros[$e]["nombre"]."\n"."   Apellido: ".$datosPasajeros[$e]["apellido"]."\n". "   Dni: ".$datosPasajeros[$e]["numero de documento"]."\n";
                    }
                    echo "\n"."Ingrese el numero de los datos de la persona a modificar: ";
                    $numeroEntre->setnumeroEntre(count($datosPasajeros));/*con la instruccion count cuenta la cantidad de pasajeros y asigna como numero mayor a la instruccion de la clase numero_entre*/
                    $nroPersona = $numeroEntre->getnumeroEntre();/*retorna el valor de la opcion elegida*/

                    echo "\n"."ingrese el nuevo nombre de la persona: ";
                    $esString->esString();
                    $nuevoNombre = $esString->getString();

                    $datosViajes->setNombrePasajero($nuevoNombre,$nroPersona - 1); /* se ingresan los datos modificados al array de los datos de los pasajeros con la instruccion set*/
                    print_r($datosViajes->getInfoPasajeron());/*se muestra el array con los datos modificados*/
                    break;

                break;   
                case 2:
                    for($e=0;$e<count($datosPasajeros);$e++){
                        echo "\n".$e+1 .") Nombre: ".$datosPasajeros[$e]["nombre"]."\n"."   Apellido: ".$datosPasajeros[$e]["apellido"]."\n". "   Dni: ".$datosPasajeros[$e]["numero de documento"]."\n";
                    }
                    echo "\n"."Ingrese el numero de los datos de la persona a modificar: ";
                    $numeroEntre->setnumeroEntre(count($datosPasajeros));
                    $nroPersona = $numeroEntre->getnumeroEntre();
                    
                    echo "\n"."ingrese el nuevo apellido de la persona: ";
                    $esString->esString();
                    $nuevoApellido = $esString->getString();

                    $datosViajes->setApellidoNuevo($nuevoApellido,$nroPersona - 1);
                    print_r($datosViajes->getInfoPasajeron());
                    break;

                case 3:
                    for($e=0;$e<count($datosPasajeros);$e++){
                        echo "\n".$e+1 .") Nombre: ".$datosPasajeros[$e]["nombre"]."\n"."   Apellido: ".$datosPasajeros[$e]["apellido"]. "\n"."   Dni: ".$datosPasajeros[$e]["numero de documento"]."\n";
                    }
                    echo "\n"."Ingrese el numero de los datos de la persona a modificar: ";
                    $numeroEntre->setnumeroEntre(count($datosPasajeros));
                    $nroPersona = $numeroEntre->getnumeroEntre();

                    echo "\n"."ingrese el nuevo numero de documento de la persona: ";
                    $nuevoDni = trim(fgets(STDIN));
                    while(!is_numeric($nuevoDni)){
                        echo "ingrese solo numeros: ";
                        $nuevoDni = trim(fgets(STDIN));
                    }

                    $datosViajes->setCambNroDni($nuevoDni,$nroPersona - 1);
                    print_r($datosViajes->getInfoPasajeron());
                    break;

                case 4:
                    for($e=0;$e<count($datosPasajeros);$e++){
                        echo "\n".$e+1 .") Nombre: ".$datosPasajeros[$e]["nombre"]."\n"."   Apellido: ".$datosPasajeros[$e]["apellido"]."\n". "   Dni: ".$datosPasajeros[$e]["numero de documento"]."\n";
                    }
                    echo "\n"."Ingrese el numero de los datos de la persona a modificar: ";
                    $numeroEntre->setnumeroEntre(count($datosPasajeros));
                    $nroPersona = $numeroEntre->getnumeroEntre();

                    echo "\n"."ingrese el nuevo nombre de la persona: ";
                    $esString->esString();
                    $nuevoNombre = $esString->getString();

                    echo "\n"."ingrese el nuevo apellido de la persona: ";
                    $esString->esString();
                    $nuevoApellido = $esString->getString();

                    echo "\n"."ingrese el nuevo numero de documento de la persona: ";
                    $nuevoDni = trim(fgets(STDIN));

                    while(!is_numeric($nuevoDni)){
                        echo "ingrese solo numeros: ";
                        $nuevoDni = trim(fgets(STDIN));
                    }

                    $datosViajes->setNombrePasajero($nuevoNombre,$nroPersona - 1);
                    $datosViajes->setApellidoNuevo($nuevoApellido,$nroPersona- 1) ;
                    $datosViajes->setCambNroDni($nuevoDni,$nroPersona - 1);

                    print_r($datosViajes->getInfoPasajeron());
                    break;
            }
            break;
        case 3:

            $losMenus->setmenuOpcion3();

            $modificador = $losMenus->geteleccionMenuOpcion3();

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
                    
                    $esString->esString();
                    $nuevoDestino = $esString->getString();
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
                    break;

                case 4:
                    echo "\n"."ingrese una nueva cantidad de pasajeros: ";
                    $numeroEntre->setnumeroEntre($datosViajes->getCantidadMaxPasajeros());
                    $nuevaCantPasaj = $numeroEntre->getnumeroEntre();
                    $datosViajes->setCantPasajeros($nuevaCantPasaj);
                    break;
                
                case 5:
                    echo "\n"."Ingrese el nuevo codigo de viaje: ";
                    $nuevoCodViaje = trim(fgets(STDIN));
                    while(!is_numeric($nuevoCodViaje)){
                        echo "ingrese solo numeros: ";
                        $nuevoCodViaje = trim(fgets(STDIN));
                    }

                    echo "\n"."Ingrese el nuevo destino del viaje: ";
                    $esString->esString();
                    $nuevoDestino = $esString->getString();

                    echo "\n"."Ingrese una nueva cantidad maxima de pasajeros: ";
                    $nuevaCantMaxPasaj = trim(fgets(STDIN));
                    while(is_numeric($nuevaCantMaxPasaj) && $nuevaCantMaxPasaj <= 0){
                        echo "ingrese  un numero mayor a 0: ";
                        $nuevaCantMaxPasaj = trim(fgets(STDIN));
                        
                    }
                    echo "\n"."ingrese una nueva cantidad de pasajeros: ";
                    $numeroEntre->setnumeroEntre($nuevaCantMaxPasaj);
                    $nuevaCantPasaj = $numeroEntre->getnumeroEntre();

                    $datosViajes->setCodViaje($nuevoCodViaje);
                    $datosViajes->setDestino($nuevoDestino);
                    $datosViajes->setCantidadMaxPasajeros($nuevaCantMaxPasaj);
                    $datosViajes->setCantPasajeros($nuevaCantPasaj);
                    break;
            }
            
            break;
        case 4: 

                echo $datosViajes;/*metodo __toString*/
            
            break;
    }


}while($opcion != 5);