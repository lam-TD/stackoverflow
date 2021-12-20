<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function () {
            <?php
            $php_array = [
                [
                   "label" => 'label1',
                   "value1" => 'label1',
                   "value2" => 'Option1',
                ],
                [
                    "label" => 'label2',
                    "value1" => 'label2',
                    "value2" => 'Option2',
                ],
                [
                    "label" => 'label3',
                    "value1" => 'label3',
                    "value2" => 'Option3',
                ],
            ];
            $js_array = json_encode($php_array);
            echo "const availableTags = ". $js_array . ";\n";
            ?>
            $("#id_post").autocomplete({
                source: availableTags,
                select: function (event, ui) {
                    $('#textbox1').val(ui.item.value);
                    $('#textbox2').val(ui.item.value2);
                    $('#select1').val(ui.item.value2);
                }
            });
        });
    </script>
</head>
<body>

<table>
    <tr>
        <td>id_post</td>
        <td>:</td>
        <td><input type="text" name="id_post" id="id_post"/></td>
    </tr>
    <tr>
        <td>textbox1</td>
        <td>:</td>
        <td><input type="text" name="textbox1" id="textbox1"/></td>
    </tr>
    <tr>
        <td>textbox2</td>
        <td>:</td>
        <td><input type="text" name="textbox2" id="textbox2"/></td>
    </tr>
    <tr>
        <td>PSA Lama</td>
        <td>:</td>
        <td>
            <select name="select1" id="select1">
                <option value="">-</option>
                <option value="Option1">Option1</option>
                <option value="Option2">Option2</option>
                <option value="Option3">Option3</option>
            </select>
        </td>
    </tr>
    <tr>
</table>

<script>

</script>


</body>
</html>
