<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-primary">

    <!-- form start -->
    <form method="POST" action="index.php?act=sanpham&type=addsp" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Danh mục</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_danhmucsp ?? "" ?></label>
          <select class="custom-select rounded-0" id="exampleSelectRounded0" name="danhmuc_sp">
            <option value="">Lựa chọn</option>
            <?php foreach ($list_dm as $listdm) : ?>
              <option value="<?= $listdm['id_dm'] ?>"><?= $listdm['ten_dm'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Tên sản phẩm</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_tensp ?? "" ?></label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="ten_sp">
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Giá</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_giasp ?? "" ?></label>
          <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="gia_sp">
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Ngày nhập</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_ngaynhapsp ?? "" ?></label>
          <input type="date" class="form-control" id="exampleInputEmail1" placeholder="" name="ngaynhap_sp">
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Trạng thái</label>
          <select class="custom-select rounded-0" id="exampleSelectRounded0" name="trangthai_sp">
            <option value="0">Kinh doanh</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputFile" class="form-check-label mb-2">Ảnh sản phẩm</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_anhsp ?? "" ?></label>
          <div class="input-group">
            <input type="file" name="anh_sp" id="anhNhanVien" onchange="hienThiAnh()">
          </div>
          <br>
          <div>
            <img src="" alt="" width="100px" id="anhHienThi">
          </div>
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Mô tả</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_motasp ?? "" ?></label>
          <textarea class="form-control" rows="4" placeholder="" name="mota_sp"></textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="add_sp" value="add_sp">Thêm sản phẩm</button>
      </div>
    </form>
  </div>
  <!-- /.container-fluid -->
  <!-- /.container-fluid -->
  <p><?= $mesage ?? "" ?></p>
</section>
<!-- /.content -->
</div>