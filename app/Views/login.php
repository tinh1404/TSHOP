<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 bg-secondary text-white">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center mt-5">
                    <img src="<?= APPURL ?>public/img/user.png" class="w-25" alt="">
                </div>
                <div class="col-md-12 text-center">
                    <p class="text-uppercase fs-5">Chào mừng tới với TShop</p>
                </div>
            </div>
        </div>
        <form action="" method="POST" class="col-md-6 ">
            <h2 class="text-uppercase">Đăng nhập</h2>
            <div class="col my-3">
                <label for="email" class="form-label">Tài khoản</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email tài khoản" value="<?= empty($_POST['email']) ? '' : $_POST['email'] ?>">
            </div>
            <?php if (isset($_SESSION['Email'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['Email'] ?>
                </div>
            <?php endif;
            unset($_SESSION['Email']) ?>
            <div class="col my-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" value="<?= empty($_POST['password']) ? '' : $_POST['password'] ?>">
            </div>
            <?php if (isset($_SESSION['password'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['password'] ?>
                </div>
            <?php endif;
            unset($_SESSION['password']) ?>
            <?php if (isset($_SESSION['dangky'])) : ?>
                <div class="text-start alert alert-success" role="alert">
                    <?= $_SESSION['dangky'] ?>
                </div>
            <?php endif;
            unset($_SESSION['dangky']) ?>
            <?php checkNoti() ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                        <label class="form-check-label" for="invalidCheck2">
                            Ghi nhớ
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="<?=APPURL?>user/forgotPassword" class="float-end mx-2">Quên mật khẩu</a>
                    <a href="<?=APPURL?>user/resign" class="float-end">Đăng ký /</a>
                </div>
            </div>
            <div class="col my-3">
                <!-- <a href="#" class="btn btn-outline-success w-25"> Đăng nhập</a> -->
                <button type="submit" class="btn btn-outline-success w-25"> Đăng nhập</button>
            </div>
        </form>
    </div>
</div>

