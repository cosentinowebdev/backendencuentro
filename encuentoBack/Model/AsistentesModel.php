<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class AsistentesModel extends Database
{
    public function getAsistentes($limit)
    {
        return $this->select("SELECT * FROM asistentes ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
    public function setAsistente($results)
    {
        // echo $proyector;
        // return $this->insert("INSERT INTO encuentro.asistentes (nombre, apellido, telefono, correo, pais, provincia, localidad, proyector, primeraVez, primerDia, bloque1PrimerDia, bloque2PrimerDia, segundoDia, bloque1segundoDia, bloque2segundoDia) VALUES ('".$results['nombre']."', '".$results['apellido']."', '".$results['telefono']."', '".$results['correo']."', '".$results['pais']."', '".$results['provincia']."', '".$results['localidad']."','".$results['proyector']."', '".$results['primeraVez']."', '".$results['primerDia']."', '".$results['bloque1PrimerDia']."', '".$results['bloque2PrimerDia']."', '".$results['segundoDia']."', '".$results['bloque1segundoDia']."', '".$results['bloque2segundoDia']."')",[]);
        return $this->insert("INSERT INTO encuentro.asistentes (nombre, apellido, telefono, correo, pais, provincia, localidad, proyector, primeraVez, primerDia, bloque1PrimerDia, bloque2PrimerDia, segundoDia, bloque1segundoDia, bloque2segundoDia) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?,?)",['ssssssssssssss',$results['nombre'],$results['apellido'],$results['telefono'],$results['correo'],$results['pais'],$results['provincia'],$results['localidad'],$results['proyector'],$results['primeraVez'],$results['primerDia'],$results['bloque1PrimerDia'],$results['bloque2PrimerDia'],$results['segundoDia'],$results['bloque1segundoDia'],$results['bloque2segundoDia']]);
        // return $this->insert("INSERT INTO encuentro.asistentes (nombre, apellido, telefono, correo, pais, provincia, localidad, proyector, primeraVez, primerDia, bloque1PrimerDia, bloque2PrimerDia, segundoDia, bloque1segundoDia, bloque2segundoDia) VALUES ('".
        // $results['nombre'].
        // "', '".
        // $results['apellido'].
        // "', '".
        // $results['telefono'].
        // "','".
        // $results['correo'].
        //  "','". 
        //  $results['pais'].
        //  "','". 
        //  $results['provincia'].
        //  "','". 
        //  $results['localidad'].
        //  "','" .
        //  $results['proyector'].
        //  "','" . 
        //  $results['primeraVez'].
        //  "','". 
        //  $results['bloque1PrimerDia'] .
        //  "','" .
        //  $results['bloque2PrimerDia'].
        //  "','" .
        //  $results['segundoDia'].
        //  "','" .
        //  $results['bloque1segundoDia'].
        //  "','" .
        //  $results['bloque2segundoDia'].
        //  "','". 
        //  $results['primerDia'].
        //  "');",[]);
    
    }
}