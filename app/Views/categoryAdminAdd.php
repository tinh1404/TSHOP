<div class="container-fluid">
    <div class="my-8 row">
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-6"><a href="<?= APPURL ?>admin/category" class="text-primary" fdprocessedid="pftyal">Quay về </a></div>
                </div>
                <div class=" mb-6">
                    <h4 class="mb-4">Thêm danh mục</h4>
                </div>
                <div>
                    <form method="POST" action="" class="">
                        <div class="mb-4 row"><label for="category" class="col-sm-4 col-form-label form-label">Tên danh mục</label>
                            <div class="col-md-8 col-12">
                                <input type="text" class="form-control" placeholder="Điền tên danh mục" id="category" name="category" value="<?= empty($_POST['category']) ? '' : $_POST['category'] ?>" fdprocessedid="51z174">
                                <?php if (isset($_SESSION['TenDM'])) : ?>
                                    <div class="mt-3 alert alert-warning" role="alert">
                                        <?= $_SESSION['TenDM'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['TenDM']) ?>
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