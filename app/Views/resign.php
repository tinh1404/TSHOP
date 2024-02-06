<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 bg-secondary text-white">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center mt-5">
                    <img src="../public/img/user.png" class="w-25" alt="">
                </div>
                <div class="col-md-12 text-center">
                    <p class="text-uppercase fs-5">Chào mừng tới với TShop</p>
                </div>
            </div>
        </div>
        <form method="POST" action="" class="col-md-6 ">
            <h2 class="text-uppercase">Đăng Ký</h2>
            <div class="col my-3">
                <label for="fullname" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nhập họ tên đầy đủ" value="<?= empty($_POST['fullname']) ? '' : $_POST['fullname'] ?>">
            </div>
            <?php if (isset($_SESSION['fullname'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['fullname'] ?>
                </div>
            <?php endif;
            unset($_SESSION['fullname']) ?>
            <div class="col my-3">
                <label for="email" class="form-label">Nhập email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email của bạn" value="<?= empty($_POST['email']) ? '' : $_POST['email'] ?>">
            </div>
            <?php if (isset($_SESSION['Email'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['Email'] ?>
                </div>
            <?php endif;
            unset($_SESSION['Email']) ?>
            <div class="col my-3">
                <label for="password" class="form-label">Nhập mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" value="<?= empty($_POST['password']) ? '' : $_POST['password'] ?>">
            </div>
            <?php if (isset($_SESSION['password'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['password'] ?>
                </div>
            <?php endif;
            unset($_SESSION['password']) ?>
            <div class="col my-3">
                <label for="ConfirmPass" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="ConfirmPass" id="ConfirmPass" placeholder="Nhập lại mật khẩu" value="<?= empty($_POST['ConfirmPass']) ? '' : $_POST['ConfirmPass'] ?>">
            </div>
            <?php if (isset($_SESSION['ConfirmPass'])) : ?>
                <div class="text-start alert alert-warning" role="alert">
                    <?= $_SESSION['ConfirmPass'] ?>
                </div>
            <?php endif;
            unset($_SESSION['ConfirmPass']) ?>
            <div class="col my-3">
                <button type="submit" class="btn btn-outline-success w-25"> Đăng ký</button>
            </div>
        </form>
    </div>
</div>
