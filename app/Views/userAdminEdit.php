<div class="container-fluid">
    <div class="my-8 row">
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-6"><a href="<?= APPURL ?>admin/user" class="text-primary" fdprocessedid="pftyal">Quay về </a></div>
                </div>
                <div class=" mb-6">
                    <h4 class="mb-4">Thay đổi thông tin người dùng</h4>
                </div>
                <div>
                    <form method="POST" action="" class="" enctype="multipart/form-data">
                        <div class="align-items-center mb-8 row">
                            <div class="mb-3 mb-md-0 col-md-3">
                                <h5 class="mb-0">Ảnh</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex align-items-center">
                                    <img src="<?= APPURL ?>img/user.png" alt="" class="rounded-circle mx-2" style="width:10%">
                                    <input type="file" class="form-control" name="avatar" value="dsfsd">
                                </div>
                                <?php if (isset($_SESSION['img'])) : ?>
                                    <div class="mx-5 text-danger " role="alert">
                                        <?= $_SESSION['img'] ?>
                                    </div>
                                    <?php endif;
                                unset($_SESSION['img']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label for="fullName" class="col-sm-4 col-form-label form-label">Họ và tên</label>
                            <div class="col-md-8 col-12">
                                <input type="text" class="form-control" placeholder="Điền tên của bạn" id="fullName" name="fullname" value="<?= empty($_POST['fullname']) ? $userId['HoTen'] : $_POST['fullname'] ?>" fdprocessedid="51z174">
                                <?php if (isset($_SESSION['fullname'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['fullname'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['fullname']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label for="email" class="col-sm-4 col-form-label form-label">Email</label>
                            <div class="col-md-8 col-12">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= empty($_POST['email']) ? $userId['Email'] : $_POST['email'] ?>" fdprocessedid="h64qu">
                                <?php if (isset($_SESSION['Email'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['Email'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['Email']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="phone">Số điện thoại</label>
                            <div class="col-md-8 col-12">
                                <input placeholder="Enter Phone" type="text" id="phone" name="phone" value="<?= empty($_POST['phone']) ? $userId['Phone'] : $_POST['phone'] ?>" class="form-control" fdprocessedid="s4s7t8">
                                <?php if (isset($_SESSION['Phone'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['Phone'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['Phone']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="password">Mật khẩu</label>
                            <div class="col-md-8 col-12">
                                <input placeholder="Enter password" type="text" id="password" name="password" value="<?= empty($_POST['password']) ? $userId['MatKhau'] : $_POST['password'] ?>" class="form-control" fdprocessedid="s4s7t8">
                                <?php if (isset($_SESSION['password'])) : ?>
                                    <div class="text-start alert alert-warning" role="alert">
                                        <?= $_SESSION['password'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['password']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="country">Quyền</label>
                            <div class="col-md-8 col-12">
                                <select name="Quyen" class="form-control form-select" id="country" fdprocessedid="bccq5f">
                                    <option value="user" class="text-muted"><?= $userId['Quyen'] ?></option>
                                    <option value="admin" class="text-muted">admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="addressLine">Địa chỉ </label>
                            <div class="col-md-8 col-12"><input placeholder="Nhập địa chỉ của bạn" name="address" value="<?=empty($_POST['address']) ? $userId['DiaChi'] : $_POST['address']  ?>" type="text" id="addressLine" class="form-control" fdprocessedid="9h9onh"></div>
                        </div>
                        <div class="mt-3 col-md-8 col-12 offset-md-4"><button type="submit" class="btn btn-primary" fdprocessedid="upfno">Save Changes</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>