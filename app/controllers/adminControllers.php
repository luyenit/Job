
<?php
if (isset($_GET['act']) && !empty($_GET['act'])) {
    switch ($_GET['act']) {
        case 'danhmuc':
            danhmuc();
            break;
        case 'sanpham':
            sanpham();
            break;
        case 'banner':
            banner();
            break;
        case 'km':
            km();
            break;
        case 'binhluan':
            binhluan();
            break;
        case 'khachhang':
            khachhang();
            break;
        case 'nhanvien':
            nhanvien();
            break;
        case 'donhang':
            donhang();
            break;
        case 'shop':
            shop();
            break;
    }
} else {
    require_once __DIR__ . "./../views/admin/trangchu/trangchu.php";
}



// Danh mục
function danhmuc()
{
    function validation_name_dm($ten_dm)
    {
        $ten_dm = trim($ten_dm);
        $ten_dm = htmlspecialchars($ten_dm);
        if (empty($ten_dm)) {
            return "* Tên không được bỏ trống";
        } else {
            $sql = "SELECT ten_dm FROM danh_muc";
            foreach (pdo_qr($sql) as $temp) {
                if ($temp["ten_dm"] == $ten_dm) {
                    return " * Danh mục đã tồn tại";
                }
            }
        }
    }
    if (isset($_GET["type"]) && !empty($_GET["type"])) {

        require_once __DIR__ . "./../models/admin/danhmuc.php";

        switch ($_GET['type']) {
            case 'adddm':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['add_dm']) && !empty($_POST['add_dm'])) {
                        $err_tendm = validation_name_dm($_POST['ten_dm']);
                        if (empty($_FILES['anh_dm']['name']) || $_FILES['anh_dm']['name'] == 0) {
                            $err_anhdm = "* Ảnh không được bỏ trống";
                        }
                        if (!isset($err_tendm) && !isset($err_anhdm)) {
                            $anh_dm = basename($_FILES['anh_dm']['name']);
                            $img = "./../../../public/img/" . basename($_FILES['anh_dm']['name']);
                            move_uploaded_file($_FILES['anh_dm']['tmp_name'], $img);
                            add_dm($_POST['ten_dm'], $anh_dm, $_POST['trangthai_dm']);
                            $mesage = '<div class="alert alert-success" role="alert">
                                        <strong>Thêm thành công!</strong>
                                        </div>';
                        }
                    }
                }
                require_once __DIR__ . "./../views/admin/danhmuc/add.php";
                break;
            case 'deletedm':
                delete_dm($_GET['id_dm']);
                echo "<script>window.location.href='index.php?act=danhmuc&type=listdm'</script>";
                break;
            case 'listdm':
                if (isset($_POST['search']) && !empty($_POST['search'])) {
                    $list_dm = dm_search($_POST['dm_search']);
                } else {
                    $list_dm = list_dm($_GET['page'] ?? "");
                }
                require_once __DIR__ . "./../views/admin/danhmuc/list.php";
                break;
            case 'editdm':
                $edit_dm = edit_dm($_GET['id_dm']);
                extract($edit_dm);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['edit_dm']) && !empty($_POST['edit_dm'])) {
                        $err_tendm = validation_name_dm($_POST['ten_dm_new']);
                        if (!isset($err_tendm)) {
                            if (!empty($_FILES['anh_dm_new']['name'])) {
                                $anh_dm_new = basename($_FILES['anh_dm_new']['name']);
                                $img = "./../../../public/img/" . basename($_FILES['anh_dm_new']['name']);
                                move_uploaded_file($_FILES['anh_dm_new']['tmp_name'], $img);
                                update_dm($_POST['ten_dm_new'], $anh_dm_new, $_POST['trangthai_dm_new'], $_GET['id_dm']);
                                $mesage = '<div class="alert alert-success" role="alert">
                                    <strong>Cập nhật thành công!</strong>
                                    </div>';
                            } else {
                                update_dm($_POST['ten_dm_new'], $anh_dm, $_POST['trangthai_dm_new'], $_GET['id_dm']);
                                $mesage = '<div class="alert alert-success" role="alert">
                                    <strong>Cập nhật thành công!</strong>
                                    </div>';
                            }
                        }
                    }
                }
                require_once __DIR__ . "./../views/admin/danhmuc/edit.php";
                break;
        }
    }
}



// Sản phẩm
function sanpham()
{
    function validation_name_sp($ten_sp)
    {
        $ten_sp = trim($ten_sp);
        $ten_sp = htmlspecialchars($ten_sp);
        if (empty($ten_sp)) {
            return "* Tên không được bỏ trống";
        } else {
            $sql = "SELECT ten_sp FROM san_pham";
            foreach (pdo_qr($sql) as $temp) {
                if ($temp["ten_sp"] == $ten_sp) {
                    return " * Sản phẩm đã tồn tại";
                }
            }
        }
    }
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        require_once __DIR__ . "./../models/admin/sanpham.php";
        require_once __DIR__ . "./../models/admin/danhmuc.php";
        switch ($_GET['type']) {
            case 'addsp':
                $list_dm = list_dm("all");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['add_sp']) && !empty($_POST['add_sp'])) {

                        $err_tensp = validation_name_sp($_POST['ten_sp']);

                        if (empty($_POST['danhmuc_sp']) || !isset($_POST['danhmuc_sp'])) {
                            $err_danhmucsp =  "* Vui lòng chọn danh mục";
                        }


                        if (empty($_POST['gia_sp'])) {
                            $err_giasp = "* Giá không được bỏ trống";
                        }

                        if (empty($_FILES['anh_sp']['name']) || $_FILES['anh_sp']['name'] == 0) {
                            $err_anhsp = "* Ảnh không được bỏ trống";
                        }

                        if (empty($_POST['ngaynhap_sp'])) {
                            $err_ngaynhapsp =  "* Chưa chọn ngày nhập sản phẩm";
                        }

                        if (empty($_POST['mota_sp'])) {
                            $err_motasp =  "* Mô tả không  được bỏ trống";
                        }

                        if (!isset($err_danhmucsp) && !isset($err_tensp) && !isset($err_giasp) && !isset($err_anhsp) && !isset($err_ngaynhapsp) && !isset($err_motasp)) {
                            $img = "./../../../public/img/" . basename($_FILES['anh_sp']['name']);
                            move_uploaded_file($_FILES['anh_sp']['tmp_name'], $img);
                            $anh_sp = basename($_FILES['anh_sp']['name']);
                            add_sp($_POST['danhmuc_sp'], $_POST['ten_sp'], $_POST['mota_sp'], $anh_sp, $_POST['gia_sp'], $_POST['ngaynhap_sp'], 0, $_POST['trangthai_sp']);
                            $mesage = '<div class="alert alert-success" role="alert">
                                        <strong>Thêm thành công!</strong>
                                        </div>';
                        }
                    }
                }
                require_once __DIR__ .  "./../views/admin/sanpham/add.php";
                break;
            case 'listsp':
                foreach (list_sp('all') as $key) {
                    $list_sp_select = select_sp();
                };
                
                if (isset($_POST['search']) && !empty($_POST['search'])) {
                    $list_sp = sp_search($_POST['sp_search']);
                } else {
                    $list_sp = list_sp($_GET['page'] ?? "");
                }

                if (isset($_GET['id_sp'])) {
                    $list_sp_id =  list_sp_id($_GET['id_sp']);
                    extract($list_sp_id);
                    require_once __DIR__ .  "./../views/admin/sanpham/list_ct.php";
                } else {
                    require_once __DIR__ .  "./../views/admin/sanpham/list.php";
                }
                break;
            case 'deletesp':
                delete_sp($_GET['id_sp']);
                echo "<script>window.location.href='index.php?act=sanpham&type=listsp'</script>";
                break;
            case 'editsp':
                $edit_sp = edit_sp($_GET['id_sp']);
                extract($edit_sp);
                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     if (isset($_POST['edit_dm']) && !empty($_POST['edit_dm'])) {
                //         $err_tendm = validation_name_dm($_POST['ten_dm_new']);
                //         if (!isset($err_tendm)) {
                //             if (!empty($_FILES['anh_dm_new']['name'])) {
                //                 $anh_dm_new = basename($_FILES['anh_dm_new']['name']);
                //                 $img = "./../../../public/img/" . basename($_FILES['anh_dm_new']['name']);
                //                 move_uploaded_file($_FILES['anh_dm_new']['tmp_name'], $img);
                //                 update_dm($_POST['ten_dm_new'], $anh_dm_new, $_POST['trangthai_dm_new'], $_GET['id_dm']);
                //                 $mesage = '<div class="alert alert-success" role="alert">
                //                     <strong>Cập nhật thành công!</strong>
                //                     </div>';
                //             } else {
                //                 update_dm($_POST['ten_dm_new'], $anh_dm, $_POST['trangthai_dm_new'], $_GET['id_dm']);
                //                 $mesage = '<div class="alert alert-success" role="alert">
                //                     <strong>Cập nhật thành công!</strong>
                //                     </div>';
                //             }
                //         }
                //     }
                // }
                require_once __DIR__ . "./../views/admin/sanpham/edit.php";
                break;
        }
    }
}


// Banner
function banner()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'addbanner':
                include "app/views/admin/banner/add.php";
                break;
            case 'listbanner':
                include "app/views/admin/banner/list.php";
                break;
        }
    }
}


// khuyến mãi
function km()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'addkm':
                include "app/views/admin/khuyenmai/add.php";
                break;
            case 'listkm':
                include "app/views/admin/khuyenmai/list.php";
                break;
        }
    }
}

// bình luận
function binhluan()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'listbl':
                include "app/views/admin/binhluan/list.php";
                break;
        }
    }
}



// Tài khoản khách hàng
function khachhang()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'addkh':
                include "app/views/admin/khachhang/add.php";
                break;
            case 'listkh':
                include "app/views/admin/khachhang/list.php";
                break;
        }
    }
}

// Tài khoản nhân viên
function nhanvien()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'addnv':
                include "app/views/admin/nhanvien/add.php";
                break;
            case 'listnv':
                include "app/views/admin/nhanvien/list.php";
                break;
        }
    }
}


// Đơn hàng
function donhang()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'listdh':
                include "app/views/admin/donhang/list.php";
                break;
        }
    }
}



// Shop
function shop()
{
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        switch ($_GET['type']) {
            case 'addshop':
                include "app/views/admin/shop/add.php";
                break;
            case 'listshop':
                include "app/views/admin/shop/list.php";
                break;
        }
    }
}
