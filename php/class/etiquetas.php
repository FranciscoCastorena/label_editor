<?php

class etiquetas
{
    private $enlace;

    /* Metodos */

    /* conexión a la api */
    function __construct()
    {
        $this->enlace =  new mysqli("70.32.23.102", "pgmappsc_julio", "o{4]R*;^&MN-", "pgmappsc_ecommerce_etiquetas");
    }


    

    #Función para correr Qrys
    public function runSql($sql)
    {
        $this->enlace->query($sql);
        $this->enlace->close();
    }

     #Función para correr Qrys selecte
     public function runSql_select($sql)
     {
         $resultado = $this->enlace->query($sql);
         $this->enlace->close();

         return $resultado->num_rows;
     }

   
}
