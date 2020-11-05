<?php
error_reporting(0);
function AdminUsers(string $accion, int $id)
{
    require '../../config/Conn.php';
    require '../../config/v_session.php';
    if ($accion == "filter") {
        $records = $conn->prepare('SELECT * FROM usuario where id = "' . $id . '" ');
        $records->execute();
    } else {
        $records = $conn->prepare('SELECT * FROM usuario where id != "' . $user['id'] . '" ');
        $records->execute();
    }
    return $records;
}

function deleteUser(int $id)
{
    require '../../config/Conn.php';
    $records = $conn->prepare('DELETE FROM usuario WHERE  id = "' . $id . '"');
    $records->execute();
}
