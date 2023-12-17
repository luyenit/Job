<?php
// thu vien chung:
// cac ham thao truy van, thuc hien
// cac ham validate, cac ham chung


// =================HAM SQL========================
require_once __DIR__ . "./../../config.php";


function pdo_exe($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
    
    }
    catch(PDOException $e){
        throw $e;
        die();
    }
    finally{
        unset($conn);
    }
}


function pdo_qr($sql){
    $sql_args=array_slice(func_get_args(),1);
    
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        // mang da chieu, cach thuc lay du lieu theo kieu nao
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
        die();
    }
    finally{
        unset($conn);
    }
}


function pdo_qr_one($sql){
    $sql_args=array_slice(func_get_args(),1);
        try{
            $conn=pdo_get_connection();
            $stmt=$conn->prepare($sql);
            $stmt->execute($sql_args);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            // đọc và hiển thị giá trị trong danh sách trả về
            return $row;
            // tuong duong stmt[0];
    }
    catch(PDOException $e){
        throw $e;
        die();
    }
    finally{
        unset($conn);
    }
}


?>