<div class="container-fluid">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h5 class="fs-5">Danh mục</h5>
            <a class="btn btn-primary " href="<?= APPURL ?>admin/category/add"> Add</a>

        </div>

        <div class="table text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh Mục</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $i = 1;
                    foreach ($categoryList as $category) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $category['TenDM'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= APPURL ?>admin/category/edit/<?= $category['MaDM'] ?>"> Edit</a>
                                        <!-- <a class="dropdown-item" href="<?= APPURL ?>admin/category/delete/<?= $category['MaDM'] ?>"> Delete</a> -->
                                        <button class="dropdown-item" type="submit" data-bs-toggle="modal" data-bs-target="#adminDelete">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="adminDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Danh Mục</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn thật sự muốn xóa danh mục này chứ?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= APPURL ?>admin/category/delete/<?= $category['MaDM'] ?>" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>