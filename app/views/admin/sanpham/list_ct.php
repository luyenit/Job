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
<section class="content">
    <div class="container-fluid">
        <div class="row">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">

                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <img src="./../../../public/img/<?= $anh_sp ?>" alt="" width="400px" height="300px">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col mx-4" style="width:700px">
                        <address>
                            <strong>Tên sản phẩm</strong><br>
                            <?= $ten_sp ?><br>
                            <br>
                            <strong>Ngày nhập </strong><br>
                            <?= date('d/m/Y', strtotime($ngaynhap_sp)) ?><br>
                            <br>
                            <!-- accepted payments column -->
                                <strong>Mô tả sản phẩm</strong>

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    <?= $mota_sp ?>
                                </p>
                         
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">
                        <strong>Lượt xem</strong><br>
                        <?= $luotxem_sp ?><br>
                        <br>
                        <strong>Trạng thái</strong><br>
                        <?php if ($trangthai_sp == 0) {
                            echo '<span class="badge bg-success">Kinh doanh</span>';
                        } else {
                            echo '<span class="badge bg-danger">Kết thúc</span>';
                        }
                        ?><br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <br>
                <!-- /.row -->

                <div class="row">
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Amount Due 2/22/2014</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$250.30</td>
                                </tr>
                                <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>