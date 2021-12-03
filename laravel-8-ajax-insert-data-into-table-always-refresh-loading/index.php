<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></link>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</head>
<body>

<table id="table" class="table display" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Extn.</th>
        <th>Start date</th>
        <th>Salary</th>
    </tr>
    </thead>
</table>

<form id="modal-form" action="ajax.php" method="post" class="form-horizontal">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Tambah Kategori</h5>
        </div>

        <div class="modal-body">

            <div class="form-group">
                <label for="NamaKategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" id="NamaKategori"
                       placeholder="Masukan Nama Kategori" required autofocus>
                <span class="help-block with-errors"></span>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>
                Simpan
            </button>
            <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                        class="fa fa-arrow-circle-left"></i> Batal
            </button>
        </div>

    </div>
</form>


<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: 'data.txt',
            },
        });

        $('#modal-form').on('submit', function (e) {
            if (!e.preventDefault()) {
                $.ajax({
                    url: $('#modal-form').attr('action'),
                    type: 'post',
                    data: {data : $('#modal-form').serialize()}
                })
                    .done((respone) => {
                        console.log(respone)
                        // $('#modal-form').modal('hide');
                        table.ajax.reload();

                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();
    }
</script>


</body>
</html>
