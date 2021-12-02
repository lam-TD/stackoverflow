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
</head>

<?php

$table_data = [];
$SelectedValue = '';
if (isset($_GET['SelectedValue'])) {
    $SelectedValue = $_GET['SelectedValue'];

    $sql = "SELECT * FROM [CampaignModule].[dbo].[RetailCampaign] WHERE CampaignNo <> '' AND CustomerCountryCode='" . $_GET["SelectedValue"] . "'";
    $example_data_filter_by_customer_code = [
        [
            'CampaignNo' => 1,
            'CampaignMasterNo' => 'CampaignMasterNo1',
            'CustomerCountryCode' => 'DK',
        ],
        [
            'CampaignNo' => 2,
            'CampaignMasterNo' => 'CampaignMasterNo2',
            'CustomerCountryCode' => 'DK',
        ]
    ];
    $table_data = $example_data_filter_by_customer_code;
} else {
    $sql = "SELECT * FROM [CampaignModule].[dbo].[RetailCampaign] WHERE CampaignNo <> '' ORDER BY ID DESC";
    $example_data_no_filter = [
        [
            'CampaignNo' => 1,
            'CampaignMasterNo' => 'CampaignMasterNo1',
            'CustomerCountryCode' => 'DK',
        ],
        [
            'CampaignNo' => 2,
            'CampaignMasterNo' => 'CampaignMasterNo2',
            'CustomerCountryCode' => 'BE',
        ]
    ];

    $table_data = $example_data_no_filter;
}

// Get data for Dropdown list
// Here I assume that the data is uploaded from the database
//
$select_data = [
    [
        'CustomerCountryCode' => 'DK',
        'CustomerCountryName' => 'DK',
    ],
    [
        'CustomerCountryCode' => 'BE',
        'CustomerCountryName' => 'BE',
    ]
];


?>
<body>
<div class="">
    <form id="myForm">
        <select name="SelectedValue" id="SelectedValue" class="form-control">
            <option value="">Choose Country Filter</option>
            <?php foreach ($select_data as $value): ?>
                <?php if ($SelectedValue == $value['CustomerCountryCode']): ?>
                    <option value="<?= $value['CustomerCountryCode'] ?>"
                            selected><?= $value['CustomerCountryName'] ?></option>';
                <?php else: ?>
                    <option value="<?= $value['CustomerCountryCode'] ?>"><?= $value['CustomerCountryName'] ?></option>';
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </form>


    <table border="1">
        <tr>
            <th>CampaignNo</th>
            <th>CampaignMasterNo</th>
            <th>CustomerCountryCode</th>
        </tr>
        <?php foreach ($table_data as $value): ?>
            <tr>
                <td><?= $value['CampaignNo'] ?></td>
                <td><?= $value['CampaignMasterNo'] ?></td>
                <td><?= $value['CustomerCountryCode'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script>
    $(document).ready(function () {
        $("#SelectedValue").change(function () {
            $('#myForm').submit()
        });
    });
</script>

</body>
</html>
