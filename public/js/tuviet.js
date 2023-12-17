// Dung js hien thi anh
function hienThiAnh() {
    // Lấy phần tử input file và thẻ img
    var inputAnhNhanVien = document.getElementById('anhNhanVien');
    var anhHienThi = document.getElementById('anhHienThi');

    // Kiểm tra xem có tệp đã chọn hay chưa
    if (inputAnhNhanVien.files && inputAnhNhanVien.files[0]) {
        var reader = new FileReader();

        // Đọc và hiển thị ảnh
        reader.onload = function (e) {
            anhHienThi.src = e.target.result;
        };

        reader.readAsDataURL(inputAnhNhanVien.files[0]);
    }
}
function url(act, id_dm) {
    if (confirm("Có đồng ý xóa không ?")) {
        window.location.href = `index.php?act=${act}&type=deletedm&id_dm=${id_dm}`
    }
}