<?php 
class Vehiculo{
    static $precio = 10000; 
    protected $asiento;
    protected $ruedas;
    protected $marca;
    protected $color; 
 //   protected $preciototal; 
    static $descuento = 0; 
    protected $climatizador; 
    function Vehiculo(){//Metodo constructor
       // $this->asiento = 'cuero';
        $this->ruedas = 4;
        $this->marca = 'Lamborghini';
    }
    //Metodo estatico que define el valor de la propiedad estatica solo cuando se la llama 
    //Este metodo pertence a la clase y no a ningun objeto. 
    static function poner_descuento(){
        if(date('m-d-y') > '10-22-20'){//Uso de la funcion date para obteber el formato de mes, dia y año
        self::$descuento = 4500; 
        }
    }
    
    function climatizador(){
        self::$precio += 2000;  
    }
    
    function asiento_cuero(){
        return self::$precio += 200; 
    }
    
    function get_precio(){
        self::$precio -= self::$descuento; 
        echo 'El precio del vehiculo es ' . self::$precio; 
    }
    
    function establece_color($color){
        $this->color = $color; 
        echo 'El color del vehiculo es ' . $this->color; 
    }
/*
    function dame_asientos(){
        echo 'El numero de asientos es ' . $this->asiento;
    }
  */  
    function dame_ruedas(){
        echo 'El numero de ruedas es ' . $this->ruedas;
    }
    
    function dame_marca(){
        echo 'La marca del carro es ' . $this->marca;
    }
    function girar(){
        echo 'Esta girando'; 
    }
}

//Al hacer la herencia se transfiere las propiedades y metodos de la superclase. 
class Camion extends Vehiculo{
    
    function Camion(){//Metodo constructor
       /* //Con esto se invoca al constructor de la clase padre. 
        parent::Vehiculo(); 
        */
        $this->asiento = 'Tela';
        $this->ruedas = 8;
        $this->marca = 'VOLVO';
    }
    //Sobreescribir los metodos para tener un metodo de giro   
    function dame_marca(){
        echo 'La marca del camion es  ' . $this->marca; 
    }
    function girar(){
        //Con la instruccion parent se puede invocar lo que haya dentro de la funcion invocada. 
        parent::girar();
        echo '<br>'; 
        echo 'Ya termino de girar'; 
    }
    
}



?>