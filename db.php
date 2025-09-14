<?php




require_once( ROOT .'lips/rb-mysql.php');



try{
        R::setup('mysql:host=' . DB_HOST .';dbname=' . DB_NAME,
        DB_USER, 
        DB_PASS );

        if(!R::testConnection()){
            throw  new Exception("Non e possibile connettersi alla DB ");
        }
}catch(Exception $e){
    die("Errore" . $e->getMessage());
}




