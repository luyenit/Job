<?php
function add_dm($ten_dm, $anh_dm, $trangthai_dm)
{
    $sql = "INSERT INTO danh_muc(ten_dm,anh_dm,trangthai_dm) VALUES ('$ten_dm','$anh_dm','$trangthai_dm')";
    pdo_exe($sql);
}

function list_dm($page)
{
    if ($page == "all") {
        $sql = "SELECT * FROM danh_muc";
    }
    else if (isset($page) && !empty($page)) {
        $sql = "SELECT * FROM danh_muc WHERE trangthai_dm = 0 LIMIT 4, 9";
    } else {
        $sql = "SELECT * FROM danh_muc WHERE trangthai_dm = 0 LIMIT 0, 4";
    }
    return pdo_qr($sql);
}

function delete_dm($id_dm)
{
    $sql = "DELETE FROM danh_muc WHERE id_dm = $id_dm";
    pdo_exe($sql);
}
function edit_dm($id_dm)
{
    $sql = "SELECT * FROM danh_muc WHERE id_dm = $id_dm";
    return pdo_qr_one($sql);
}
function update_dm($ten_dm, $anh_dm, $trangthai_dm, $id_dm)
{
    $sql = "UPDATE danh_muc SET ten_dm = '$ten_dm',anh_dm='$anh_dm',trangthai_dm = $trangthai_dm WHERE id_dm = $id_dm";
    pdo_exe($sql);
}
function dm_search($dm_search)
{
    $sql = "SELECT * FROM danh_muc WHERE ten_dm LIKE '%$dm_search%'";
    return pdo_qr($sql);
}
