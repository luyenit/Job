<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sửa danh mục</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Sửa danh mục</li>
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
    <form method="POST" action="index.php?act=danhmuc&type=editdm&id_dm=<?= $id_dm?>" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label class="form-check-label mb-2 " for="exampleCheck1">Tên danh mục</label> <label class="form-check-label mb-2 text-danger" for="exampleCheck1"><?= $err_tendm ?? "" ?></label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="ten_dm_new" value="<?= $ten_dm ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputFile" class="form-check-label mb-2">Ảnh danh mục</label>
          <div class="input-group">
            <input type="file" name="anh_dm_new" id="anhNhanVien" onchange="hienThiAnh()">
          </div>
          <br>
          <div>
            <img src="./../../../public/img/<?= $anh_dm ?>" alt="" width="100px" id="anhHienThi">
          </div>
        </div>
        <div class="form-group">
          <label class="form-check-label mb-2" for="exampleCheck1">Trạng thái</label>
          <select class="custom-select rounded-0" id="exampleSelectRounded0" name="trangthai_dm_new">
            <option value="<?= $trangthai_dm ?>">Kinh doanh</option>
          </select>
        </div>
        <!-- <img src="./public/img/jean đồng 5.jpg" alt=""> -->

      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="edit_dm" value="edit_dm" >Cập nhật</button>
      </div>
    </form>
  </div>
  <!-- /.container-fluid -->
  <p><?= $mesage ?? "" ?></p>
</section>
<!-- /.content -->
</div>