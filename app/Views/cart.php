<div class="container mt-5">

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Giỏ hàng</strong>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:100px;">Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tongSP = 0;
                        $tongTien = 0;
                        $tienShip = 18000;
                        foreach ($cart as $product) : ?>
                            <tr class="align-middle">
                                <td>
                                    <a href="<?= APPURL ?>product/detail/<?= $product['MaSP'] ?>">
                                        <img class="w-100" src="<?= $product['Anh'] ?>" alt="">
                                    </a>
                                </td>
                                <td><?= $product['TenSP'] ?></td>
                                <td><?= number_format($product['Gia'], 0, ',', ',') ?>đ</td>

                                <td>
                                    <a class="btn btn-outline-primary <?= ($product['SoLuong'] <= 1) ? 'disabled' : '' ?>" href="<?= isset($product['MaDH']) ? APPURL . 'product/cartItem/' . $product['MaDH'] . '/' . $product['MaSP'] . '/less' : APPURL . 'product/cart/less/' . $product['MaSP'] ?>">-</a>
                                    <?= $product['SoLuong'] ?>
                                    <a class="btn btn-outline-primary <?= ($product['SoLuong'] >= $product['TonKho'] ? 'disabled' : '') ?>" href="<?= isset($product['MaDH']) ? APPURL . 'product/cartItem/' . $product['MaDH'] . '/' . $product['MaSP'] . '/more' : APPURL . 'product/cart/more/' . $product['MaSP'] ?>">+</a>
                                </td>
                                <td><?= number_format($product['SoLuong'] * $product['Gia'], 0, ',', ',') ?>đ</td>
                                <td>
                                    <a href="<?= isset($product['MaDH']) ? APPURL . 'product/cartItem/' . $product['MaDH'] . '/' . $product['MaSP'] . '/delete' :  APPURL . 'product/cart/delete/' . $product['MaSP'] ?>" type="button" class="btn btn-outline-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php
                            $tongSP += $product['SoLuong'];
                            $tongTien += $product['SoLuong'] * $product['Gia'];
                        endforeach; ?>
                    </tbody>
                </table>
                <div class="card-footer">
                    Tổng: <?= $tongSP ?> sản phẩm
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Hóa đơn</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-6">Tạm tính:</div>
                        <div class="col-6 text-end">
                            <strong><?= number_format($tongTien, 0, ',', ',') ?>đ</strong>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">Phí giao hàng:</div>
                        <div class="col-6 text-end">
                            <strong><?= number_format($tienShip, 0, ',', ',') ?>đ</strong>
                        </div>
                        <?php
                        $GiaGiam = 0;
                        if (isset($voucher['TiLeGiam'])) {
                            $GiaGiam = min(
                                ($tongTien + $tienShip) * $voucher['TiLeGiam'] / 100,
                                $voucher['GiamToiDa']
                            );
                            
                        }
                        if (isset($voucher['GiamGia'])) {
                            if($voucher['GiamGia'] < $GiaGiam) {
                                $GiaGiam = $voucher['GiamGia'];
                            }
                        }
                        // if($product['Gia'] <$GiaGiam) {
                        //     $_SESSION['voucher1']='Voucher không hợp lệ';
                        //     $GiaGiam = 0;
                        // }
                        ?>
                        <div class="col-6">Mã giảm giá:</div>
                        <div class="col-6 text-end">
                            <strong>-<?= isset($_SESSION['voucher'])?number_format($GiaGiam, 0, ',', ','):'' ?>đ</strong>

                        </div>
                        <div class="col-12 text-end">
                            <form action="<?= APPURL ?>order/addVoucher" method="POST">
                                <div class="input-group">
                                    <input type="text" name="voucher" class="form-control" value="<?= isset($_SESSION['voucher']) ? $_SESSION['voucher'] : '' ?>">
                                    <input type="hidden" name="MaDH" value="<?= isset($product['MaDH']) ? $product['MaDH'] : '' ?>">
                                    <button class="btn btn-primary" type="submit">Áp dụng</button>
                                </div>
                                <?php if (isset($_SESSION['voucher1'])) : ?>
                                    <div class="text-warning mt-2" role="alert">
                                        <?= $_SESSION['voucher1'] ?>
                                    </div>
                                <?php endif;
                                unset($_SESSION['voucher1']) ?>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-uppercase">
                            <strong>Tổng Tiền</strong>
                        </div>
                        <div class="col-6 text-end">
                            <strong><?= number_format($tongTien + $tienShip - $GiaGiam, 0, ',', ',') ?>đ</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-outline-danger mt-4 w-100 d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Đặt Hàng
            </button>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['user'])) : ?>
    <!-- Modal -->
    <?php if ((isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) || count($cart)>0) : ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= APPURL ?>order/addOrder" method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin giao hàng</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="HoTen" class="form-label">Họ Tên</label>
                                <input type="text" class="form-control" id="HoTen" name="fullname" placeholder="Nhập họ và tên" value="<?= isset($_SESSION['user']['HoTen']) ? $_SESSION['user']['HoTen'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="DienThoai" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="DienThoai" name="phone" placeholder="Nhập số điện thoại" value="<?= isset($_SESSION['user']['Phone']) ? $_SESSION['user']['Phone'] : '' ?>">
                            </div>
                        </div>
                        <input type="hidden" name="MaDH" value="<?= $product['MaDH'] ?>">
                        <input type="hidden" name="soluong" value="<?= $tongSP ?>">
                        <input type="hidden" name="tongtien" value="<?= $tongTien + $tienShip - $GiaGiam ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-outline-success">Xác nhận & đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Giỏ hàng đang không có sản phẩm để thanh toán!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php else : ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn phải đăng nhập mới đặt hàng dc</p>
                </div>
                <div class="modal-footer">
                    <a href="<?= APPURL ?>user/login" class="btn btn-primary">Đăng nhập</a>
                    <a href="<?= APPURL ?>user/resign" class="btn btn-secondary">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

</div>