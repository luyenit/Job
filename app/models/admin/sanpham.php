<?php
function add_sp($id_dm, $ten_sp, $mota_sp, $anh_sp, $gia_sp, $ngaynhap_sp, $luotxem_sp, $trangthai_sp)
{
    $sql = "INSERT INTO san_pham(id_dm,ten_sp,mota_sp,anh_sp,gia_sp,ngaynhap_sp,luotxem_sp,trangthai_sp) VALUES ($id_dm,'$ten_sp','$mota_sp','$anh_sp',$gia_sp,'$ngaynhap_sp',$luotxem_sp,$trangthai_sp)";
    pdo_exe($sql);
}


function list_sp($page)
{
    if ($page == "all") {
        $sql = "SELECT * FROM san_pham";
    } else if (isset($page) && !empty($page)) {
        $sql = "SELECT * FROM san_pham WHERE trangthai_sp = 0 LIMIT 4, 9";
    } else {
        $sql = "SELECT * FROM san_pham WHERE trangthai_sp= 0 LIMIT 0, 4";
    }
    return pdo_qr($sql);
}

function select_sp()
{
    $sql = "SELECT ten_dm FROM danh_muc dm JOIN san_pham sp ON dm.id_dm = sp.id_dm ";
    return pdo_qr($sql);
}

function list_sp_id($id_sp)
{
    $sql = "SELECT * FROM san_pham WHERE id_sp=$id_sp";
    return pdo_qr_one($sql);
}
function delete_sp($id_sp)
{
    $sql = "DELETE FROM san_pham WHERE id_sp = $id_sp";
    pdo_exe($sql);
}
function edit_sp($id_sp)
{
    $sql = "SELECT * FROM san_pham WHERE id_sp = $id_sp";
    return pdo_qr_one($sql);
}
// function update_sp($ten_dm, $anh_dm, $trangthai_dm, $id_dm)
// {
//     $sql = "UPDATE danh_muc SET ten_dm = '$ten_dm',anh_dm='$anh_dm',trangthai_dm = $trangthai_dm WHERE id_dm = $id_dm";
//     pdo_exe($sql);
// }
function sp_search($sp_search)
{
    $sql = "SELECT * FROM san_pham WHERE ten_sp LIKE '%$sp_search%'";
    return pdo_qr($sql);
}
