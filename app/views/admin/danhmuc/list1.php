<?php $i = 5;
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
<?php endforeach ?>