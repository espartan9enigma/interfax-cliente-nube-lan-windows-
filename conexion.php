<?php
    try{
        $conexion = new PDO ('mysql:host=localhost; dbname=prueba','root','',array(PDO::ATTR_PERSISTENT => true));
        

    }catch(Exception $error){
        echo ("Error: ".$error->GetMessage()."<br>");
    }finally{
        $base=null;
    }