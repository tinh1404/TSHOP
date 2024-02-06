<div class="card w-100 mt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Đon hàng</h5>
        <div class="table-responsive">
            <h2>Đơn hàng</h2>
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mã đơn hàng</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên người đặt</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Trạng thái</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Giá</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Duyệt</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($billProducts as $bill) : ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?= $i++ ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">#<?= $bill['MaDH'] ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal"><?= $bill['HoTen'] ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <?php switch ($bill['TrangThai']) {
                                        case 'cho-xac-nhan':
                                            echo '<div class="badge bg-primary rounded-3 fw-semibold">Chờ xác nhận</div>';
                                            break;
                                        case 'chuan-bi-hang':
                                            echo '<div class="badge bg-secondary rounded-3 fw-semibold">Đang chuẩn bị</div>';
                                            break;
                                        case 'dang-giao-hang':
                                            echo '<div class="badge bg-info rounded-3 fw-semibold">Đang giao hàng</div>';
                                            break;
                                        case 'giao-thanh-cong':
                                            echo '<div class="badge bg-success rounded-3 fw-semibold">Giao thành công</div>';
                                            break;
                                        case 'huy-don':
                                            echo '<div class="badge bg-danger rounded-3 fw-semibold">Hủy đơn</div>';
                                            break;
                                    }

                                    ?>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 fs-4"><?= number_format($bill['TongTien'], 0, ',', ',') ?>đ</h6>
                            </td>
                            <td class="border-bottom-0">
                                <?php if ($bill['TrangThai'] == 'huy-don' || $bill['TrangThai'] == 'giao-thanh-cong') : ?>
                                    <a href="<?= APPURL ?>admin/bill/seen/<?= $bill['MaDH'] ?>/huy-don">
                                        <span class=" badge text-bg-warning">Xem Đơn</span>
                                    </a>
                                <?php elseif ($bill['TrangThai'] == 'cho-xac-nhan') : ?>
                                    <a href="<?= APPURL ?>admin/bill/approve/<?= $bill['MaDH'] ?>/cho-xac-nhan">
                                        <span class="badge text-bg-secondary">Duyệt Đơn</span>
                                    </a>

                                <?php elseif ($bill['TrangThai'] == 'chuan-bi-hang') : ?>
                                    <a href="<?= APPURL ?>admin/bill/approve/<?= $bill['MaDH'] ?>/chuan-bi-hang">
                                        <span class="badge text-bg-info">Giao hàng</span>
                                    </a>
                                <?php elseif ($bill['TrangThai'] == 'dang-giao-hang') : ?>
                                    <a href="<?= APPURL ?>admin/bill/approve/<?= $bill['MaDH'] ?>/giao-thanh-cong">
                                        <span class="badge text-bg-success">Thành công</span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>