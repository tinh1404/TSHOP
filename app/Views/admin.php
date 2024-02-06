<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Sales Overview</h5>
            </div>
            <div>
              <select class="form-select">
                <option value="1">March 2023</option>
                <option value="2">April 2023</option>
                <option value="3">May 2023</option>
                <option value="4">June 2023</option>
              </select>
            </div>
          </div>
          <div id="chart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="fw-semibold mb-3">$36,358</h4>
                  <div class="d-flex align-items-center mb-3">
                    <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                      <i class="ti ti-arrow-up-left text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                    <p class="fs-3 mb-0">last year</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="me-4">
                      <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                      <span class="fs-2">2023</span>
                    </div>
                    <div>
                      <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                      <span class="fs-2">2023</span>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-center">
                    <div id="breakup"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Tình trạng đơn hàng</h5>
          </div>
          <ul class="timeline-widget mb-0 position-relative mb-n5">
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Trong giỏ hàng: <?=$StatusGH[0]['CountStatus']?></div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Chờ xác nhận đơn hàng: <?=$StatusAccept[0]['CountStatus']?></div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Đang chuẩn bị đơn hàng: <?=$StatusStart[0]['CountStatus']?></div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Đơn hàng đơn giao: <?=$CountGo[0]['CountStatus']?></div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Đơn hàng đã hủy:<?=$CountCancel[0]['CountStatus']?></div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Đơn hàng giao thành công: <?=$CountSuccess[0]['CountStatus']?></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Đon hàng</h5>
          <div class="table-responsive">
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
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
