<div class="container-fluid">
    <div class="my-8 row">
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-6"><a href="<?= APPURL ?>admin/user" class="text-primary" fdprocessedid="pftyal">Quay về </a></div>
                </div>
                <div class=" mb-6">
                    <h4 class="mb-4">Thay đổi sản phẩm</h4>
                </div>
                <div>
                    <form method="POST" action="" class="" enctype="multipart/form-data">
                        <div class="align-items-center mb-8 row">
                            <div class="mb-3 mb-md-0 col-md-4">
                                <h5 class="mb-0">Ảnh sản phẩm</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <input type="file" class="form-control" name="avatar" src="sdfsd" value="dsfsd">
                                </div>
                                <?php if (isset($_SESSION['img'])) : ?>
                                    <div class="mx-5 text-danger " role="alert">
                                        <?= $_SESSION['img'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['img']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label for="TenSP" class="col-sm-4 col-form-label form-label">Tên sản phẩm</label>
                            <div class="col-md-8 col-12">
                                <input type="text" class="form-control" placeholder="Điền tên của bạn" id="TenSP" name="TenSP" value="<?= empty($_POST['TenSP']) ? $product['TenSP'] : $_POST['TenSP'] ?>" fdprocessedid="51z174">
                                <?php if (isset($_SESSION['fullname'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['fullname'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['fullname']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label for="Gia" class="col-sm-4 col-form-label form-label">Giá sản phẩm</label>
                            <div class="col-md-8 col-12">
                                <input type="number" class="form-control" placeholder="Gia" id="Gia" name="Gia" value="<?= empty($_POST['Gia']) ? $product['Gia'] : $_POST['Gia'] ?>" fdprocessedid="h64qu">
                                <?php if (isset($_SESSION['Email'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['Email'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['Email']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="SoLuongSP">Số lượng sản phẩm</label>
                            <div class="col-md-8 col-12">
                                <input placeholder="Enter SoLuongSP" type="number" id="SoLuongSP" name="SoLuongSP" value="<?= empty($_POST['SoLuongSP']) ? $product['SoLuongSP'] : $_POST['SoLuongSP'] ?>" class="form-control" fdprocessedid="s4s7t8">
                                <?php if (isset($_SESSION['Phone'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['Phone'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['Phone']) ?>
                            </div>
                        </div>
                        <div class="mb-4 row"><label class="col-sm-4 form-label" for="country">Loại sản phẩm</label>
                            <div class="col-md-8 col-12">
                                <select name="Quyen" class="form-control form-select" id="country" fdprocessedid="bccq5f">
                                    <?php foreach ($danhmuc as $loai) : ?>
                                        <option value="<?=$loai['TenDM']?>" class="text-muted"><?=$loai['TenDM']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
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