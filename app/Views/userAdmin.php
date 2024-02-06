<div class="container-fluid">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h5 class="fs-5">Tài Khoản</h5>
            <a class="btn btn-primary " href="<?= APPURL ?>admin/user/add"> Add</a>

        </div>

        <div class="table text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Quyền</th>
                        <th>Số điện thoại</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $i = 1;
                    foreach ($userAll as $user) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $user['Email'] ?></td>
                            <td><?= $user['MatKhau'] ?></td>
                            <td><?= $user['HoTen'] ?></td>
                            <td><?= $user['DiaChi'] ?></td>
                            <td><?= $user['Quyen'] ?></td>
                            <td><?= $user['Phone'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= APPURL ?>admin/user/edit/<?= $user['MaTK'] ?>"> Edit</a>
                                        <a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#adminEdit" > Delete</a>
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


<!-- Modal -->
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
                <a href="<?= APPURL ?>admin/user/delete/<?= $user['MaTK'] ?>" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>