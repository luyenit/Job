<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h2 class="m-0">Danh sách danh mục</h2>
            </div><!-- /.col -->

            <div class="col-sm-4">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" method="post" action="index.php?act=danhmuc&type=listdm">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm...." aria-label="Search" name="dm_search">
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
                    <li class="breadcrumb-item active">Danh sách danh mục</li>
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
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['page'])) { ?>
                                    <?php include "./../../views/admin/danhmuc/list1.php"; ?>
                                <?php } else { ?>
                                    <?php $i = 1;
                                    foreach ($list_dm as $dm) : ?>
                                        <tr>
                                            <td style="width:35px"><?= $i++ ?></td>
                                            <td style="width:60px"><img src="./../../../public/img/<?= $dm['anh_dm'] ?>" alt="" width="70px"></td>
                                            <td><?= $dm['ten_dm'] ?></td>
                                            <td style="width:150px; align-items:center;"><?php if ($dm['trangthai_dm'] == 0) {
                                                                                                echo '<span class="badge bg-success">Kinh doanh</span>';
                                                                                            } else {
                                                                                                echo '<span class="badge bg-danger">Kết thúc</span>';
                                                                                            }
                                                                                            ?>
                                            </td>
                                            <td style="width:100px; text-align :center;">
                                                <a href="index.php?act=danhmuc&type=editdm&id_dm=<?= $dm['id_dm'] ?>"><button type="button" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="url('danhmuc', <?= $dm['id_dm'] ?>)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?><?php } ?>
                            </tbody>
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="index.php?act=danhmuc&type=listdm">1</a></li>
                                <li class="page-item"><a class="page-link" href="index.php?act=danhmuc&type=listdm&page=2">2</a></li>
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