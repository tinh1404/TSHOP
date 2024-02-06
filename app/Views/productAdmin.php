
<div class="container-fluid">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h5 class="fs-5">Sản Phẩm</h5>
            <a class="btn btn-primary " href="<?= APPURL ?>admin/product/add"> Add</a>

        </div>

        <div class="table text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $i = 1;
                    foreach ($getProducts as $product) : ?>
                        <tr class="text-center align-middle">
                            <td><?= $i++ ?></td>
                            <td> <img src="<?= $product['Anh'] ?>" class="card-img-top" alt="..." style="width:50%"></td>
                            <td><?= $product['TenSP'] ?></td>
                            <td><?= number_format($product['Gia'],0,',',',') ?></td>
                            <td><?= $product['SoLuongSP'] ?></td>
                            <td><?= $product['TenDM'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= APPURL ?>admin/product/edit/<?= $product['MaSP'] ?>"> Edit</a>
                                        <a class="dropdown-item" href="<?= APPURL ?>admin/product/delete/<?= $product['MaSP'] ?>"> Delete</a>
                                        <!-- <a class="dropdown-item" href="<?=APPURL?>admin/user/delete/<?= $user['MaTK'] ?>"  data-bs-toggle="modal" data-bs-target="#adminEdit" > Delete</a> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal
<div class="modal fade" id="adminEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài khoản</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn thật sự muốn xóa tài khoản này chứ?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= APPURL ?>admin/product/delete/<?= $user[''] ?>" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
    <?php print_r($_GET)?>
</div> -->

