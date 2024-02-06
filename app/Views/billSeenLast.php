<div class="card w-100 mt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Đon hàng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <a href="<?=APPURL?>admin/bill">Quay lại</a>
                <thead class="text-dark fs-4">
                    <h2>Thông tin sản phẩm</h2>
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Ảnh</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên sản phẩm</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Giá</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số Lượng</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($billSeen as $bill) : ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?= $i++ ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 fs-4">#<?= $bill['MaDH'] ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal"><?= $bill['TenSP'] ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 fs-4"><?= number_format($bill['Gia'], 0, ',', ',') ?>đ</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal"><?= $bill['SoLuong'] ?></p>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>