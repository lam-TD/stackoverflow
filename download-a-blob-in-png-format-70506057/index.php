<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
</head>
<body>
<div class="qvt-sheet-container">
    <h1>EXPORT PNG</h1>
    <img src="laftFpl.jpg" style="width: 150px;height: 150px">
</div>

<button id="btn-export-qs">Export PNG</button>

<script>
    var a = document.getElementById("link");

    $("#btn-export-qs").click(function () {
        html2canvas(
            document.querySelector('.qvt-sheet-container'),
            {
                allowTaint: true,
                useCORS: true
            }
        ).then(canvas => {
            download(canvas)
        })
    });

    const download = function (canvas) {
        const link = document.createElement('a');
        link.download = 'filename.png';
        link.href = canvas.toDataURL()
        link.click();
    }

</script>

</body>
</html>
