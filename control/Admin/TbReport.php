<?php
     function AdminReport(string $accion, int $id){
        require '../../config/Conn.php';
        if($accion =="filter"){
            $records = $conn->prepare('SELECT * FROM reporte where idU = "'.$id.'" ');
            $records->execute();
        }else{
            $records = $conn->prepare('SELECT * FROM reporte');
            $records->execute();
        }
       return $records;
     }
     function deleteReport(int $id){
        require '../../config/Conn.php';
        $records = $conn->prepare('DELETE FROM reporte WHERE  id = "'.$id.'"');
        $records->execute();
     }
    
?>