<div class="container">
    <h1>Theo dõi đơn hàng</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Mã đơn hàng</td>
                <td>Ngày đặt</td>
                <td>Số lượng sản phẩm</td>
                <td>Tổng tiền</td>
                <td>Trang thái</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bills as $bill) : ?>
                <tr>
                    <td>#<?= $bill['MaDH'] ?></td>
                    <td><?= $bill['NgayDat'] ?></td>
                    <td><?= $bill['SoLuongSP'] ?></td>
                    <td><?= number_format($bill['TongTien'], 0, ',', ',') ?>đ</td>
                    <td>
                        <?php switch ($bill['TrangThai']) {
                            case 'cho-xac-nhan':
                                echo '<div class="badge text-bg-warning">Chờ xác nhận</div>';
                                break;
                            case 'chuan-bi-hang':
                                echo '<div class="badge text-bg-info">Đang chuẩn bị</div>';
                                break;
                            case 'dang-giao-hang':
                                echo '<div class="badge text-bg-primary">Đang giao hàng</div>';
                                break;
                            case 'giao-thanh-cong':
                                echo '<div class="badge text-bg-success">Giao thành công</div>';
                                break;
                            case 'huy-don':
                                echo '<div class="badge text-bg-danger">Hủy đơn</div>';
                                break;
                        }

                        ?>
                    </td>
                    <td>
                        <?php if ($bill['TrangThai'] == 'cho-xac-nhan') : ?>
                            <a href="<?= APPURL ?>order/infoBill/cancel/<?= $bill['MaDH'] ?>" class="btn btn-outline-danger btn-sm">Hủy đơn</a>
                        <?php elseif ($bill['TrangThai'] == 'giao-thanh-cong') : ?>
                            <a href="#" class="btn btn-outline-success btn-sm">Xem</a>
                        <?php else : ?>
                            <a href="#" class="btn btn-outline-info btn-sm">Liên hệ shop</a>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>