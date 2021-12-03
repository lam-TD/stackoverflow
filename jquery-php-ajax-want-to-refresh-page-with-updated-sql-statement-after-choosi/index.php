<?php
if (isset($_POST['SelectedValue'])) {
    $sql = "SELECT * FROM [CampaignModule].[dbo].[RetailCampaign] WHERE CampaignNo <> '' AND CustomerCountryCode like 'DK' ORDER BY ID DESC";
} else {
    $sql = "SELECT * FROM [CampaignModule].[dbo].[RetailCampaign] WHERE CampaignNo <> '' ORDER BY ID DESC";
}

$sqlFilter = "SELECT DISTINCT CustomerCountryCode FROM [CampaignModule].[dbo].[RetailCampaign]";
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$stmt = sqlsrv_query($conn, $sql, $params, $options);
$stmt2 = sqlsrv_query($conn, $sqlColumns, $params, $options);
$stmtFilter = sqlsrv_query($conn, $sqlFilter, $params, $options);

echo '<select name="Filter" id="FilterSelect" class="form-control">
<option>Choose Country Filter</option>';
while ($row = sqlsrv_fetch_array($stmtFilter, SQLSRV_FETCH_NUMERIC)) {
    echo "<option value='$row[0]'>$row[0]</option>";
}
echo '</select>';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script>
    $.ajax({
        url: "../Model/History.php",
        type: "POST",
        data: { 'SelectedValue': value }, // remove the '=' character
        success: function () {
            location.reload();
        }
    });
</script>
</body>
</html>
