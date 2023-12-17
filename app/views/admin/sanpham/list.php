<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h2 class="m-0">Danh sách sản phẩm</h2>
            </div><!-- /.col -->

            <div class="col-sm-4">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" method="post" action="index.php?act=sanpham&type=listsp">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm...." aria-label="Search" name="sp_search">
                            <button class="btn btn-primary" name="search" value="search">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover ">
                            <thead class="table-dark bg-dark">
                                <tr>
                                    <th>Stt</th>
                                    <th>Ảnh </th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Giá gốc</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['page'])) { ?>
                                    <?php include "./../../views/admin/sanpham/list1.php"; ?>
                                <?php } else { ?>
                                    <?php $i = 1;
                                    foreach ($list_sp as $sp) : ?>
                                        <tr>
                                            <td style="width:35px"><?= $i++ ?></td>
                                            <td style="width:60px"><img src="./../../../public/img/<?= $sp['anh_sp'] ?>" alt="" width="70px"></td>
                                            <td><?= $sp['ten_sp'] ?></td>
                                            <td>
                                                <?php
                                                foreach ($list_sp_select as $list_sp) {
                                                   echo $list_sp['ten_dm'];
                                                };
                                                ?>
                                            </td>
                                            <td><?= number_format($sp['gia_sp'], 0, ",", ".") ?></td>
                                            <td style="width:150px; align-items:center;"><?php if ($sp['trangthai_sp'] == 0) {
                                                                                                echo '<span class="badge bg-success">Kinh doanh</span>';
                                                                                            } else {
                                                                                                echo '<span class="badge bg-danger">Kết thúc</span>';
                                                                                            }
                                                                                            ?>
                                            </td>
                                            <td style="width:200px; text-align :center;">
                                                <a href="index.php?act=sanpham&type=editsp&id_sp=<?= $sp['id_sp'] ?>"><button type="button" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                                                <a href="index.php?act=sanpham&type=deletesp&id_sp=<?= $sp['id_sp'] ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                                <a href="index.php?act=sanpham&type=listsp&id_sp=<?= $sp['id_sp'] ?>"><button type="button" class="btn btn-primary btn-sm"><ion-icon name="add-outline"></ion-icon>Chi tiết</button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?><?php } ?>
                            </tbody>
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="index.php?act=sanpham&type=listsp">1</a></li>
                                <li class="page-item"><a class="page-link" href="index.php?act=sanpham&type=listsp&page=2">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>