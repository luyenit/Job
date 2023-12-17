<?php $i = 5;
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
<?php endforeach ?>