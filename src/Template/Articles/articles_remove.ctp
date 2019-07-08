<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tiêu đề</th>
            <th>Ngày đăng</th>
            <th>Trạng thái</th>
            <th>Hiện</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['articlesList'] as $key => $value) { ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['posting_date']->format('d-M-Y') ?></td>
                <td><span class="badge badge-danger">Đã gỡ</span></td>
                <td><a onclick="show(<?= $value['id'] ?>)"><i class="fa fa-eye"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    function show(id) {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'show',
                    ]); ?>';
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            cache: false,
            data: {
                id: id,
            },

            success: function (response) {
                alert("Đã cho phép hiện thị");
                articlesApproved(1);
                articlesPending(1);
                articlesRemove(1);
            },
            error: function (response) {    
                alert("Lỗi...");
            }
        });
    }
</script>