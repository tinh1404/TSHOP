<div class="container">
  <div class="d-flex flex-column ">
    <img src="<?= empty($_SESSION['user']['Anh'] ) ? APPURL.'public/img/user.png' : APPURL.'public/upload/avatar/'.$_SESSION['user']['Anh'] ?>" class="rounded-circle d-block w-25 mx-auto mb-4" alt="...">
    <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
      <div class="col-md-6">
        <label for="avatar" class="form-label">Ảnh</label>
        <input type="file" class="form-control" aria-label="file example" name="avatar" value="dsfsd">
        <?php if (isset($_SESSION['img'])) : ?>
          <div class="text-danger mt-2" role="alert">
            <?= $_SESSION['img'] ?>
          </div>
        <?php endif;
        unset($_SESSION['img']) ?>
      </div>
      <div class="col-md-6">
        <label for="fullname" class="form-label">Họ và Tên</label>
        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nhập họ tên đầy đủ" value="<?= empty($_POST['fullname']) ? $_SESSION['user']['HoTen'] : $_POST['fullname'] ?>">
        <?php if (isset($_SESSION['fullname'])) : ?>
          <div class="text-danger mt-2" role="alert">
            <?= $_SESSION['fullname'] ?>
          </div>
        <?php endif;
        unset($_SESSION['fullname']) ?>
      </div>
      <div class="col-md-12">
        <label for="phone" class="form-label">Số Điện Thoại</label>
        <input type="number" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" value="<?= empty($_POST['phone']) ? $_SESSION['user']['Phone'] : $_POST['phone'] ?>" >
        <?php if (isset($_SESSION['Phone'])) : ?>
          <div class="text-danger mt-2" role="alert">
            <?= $_SESSION['Phone'] ?>
          </div>
        <?php endif;
        unset($_SESSION['Phone']) ?>
      </div>
      <div class="col-12">
        <label for="address" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ của bạn" name="address" value="<?= empty($_POST['address']) ?  $_SESSION['user']['DiaChi'] : $_POST['address'] ?>">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-outline-success">Thay đổi</button>
      </div>
    </form>
  </div>

</div>

