<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tiêu đề</th>
            <th>Ngày đăng</th>
            <th>Trạng thái</th>
            <th>Gỡ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['articlesList'] as $key => $value) { ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['posting_date']->format('d-M-Y') ?></td>
                <td><span class="badge badge-warning">Đang chờ</span></td>
                <td><a><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>