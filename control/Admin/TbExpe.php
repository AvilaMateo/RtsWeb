<?php
     function AdminExp(string $accion, int $id){
        require '../../config/Conn.php';
        if($accion =="filter"){
            $records = $conn->prepare('SELECT * FROM experiencias where idU = "'.$id.'" ');
            $records->execute();
        }else{
            $records = $conn->prepare('SELECT * FROM experiencias');
            $records->execute();
        }
       return $records;
     }
     function deleteExp(int $id){
        require '../../config/Conn.php';
        $records = $conn->prepare('DELETE FROM experiencias WHERE  id = "'.$id.'"');
        $records->execute();
     }
    
?>