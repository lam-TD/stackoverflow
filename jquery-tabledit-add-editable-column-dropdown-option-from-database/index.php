<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <title>Hello, world!</title>
</head>
<body>
<h1>Hello, world!</h1>


<table id="example2" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="jquery.tabledit.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->


<script>
    $(document).ready(function () {
        function initTableEdit() {
            $.post('select-data.php')
                .done(function (res) {
                    let data = [[1, 'First Name'], [2, 'Last Name'], [3, 'Username', JSON.stringify(res)]]
                    creatTableEdit(data)
                })
        }

        function creatTableEdit(data) {
            $('#example2').Tabledit({
                editButton: true,
                removeButton: false,
                columns: {
                    identifier: [0, 'id'],
                    editable: data
                }
            });
        }

        initTableEdit()

    })
</script>

</body>
</html>
