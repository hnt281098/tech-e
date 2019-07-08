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
                <td><span class="badge badge-success">Đã duyệt</span></td>
                <td><a onclick="remove(<?= $value['id'] ?>)"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    function remove(id) {
        var url = '<?= $this->Url->build([
                        'controller' => 'articles',
                        'action' => 'remove',
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
                alert("Đã gỡ");
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