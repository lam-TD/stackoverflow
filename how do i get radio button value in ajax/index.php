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
<body>
<form name="myForm">
    <label>
        <input type="radio" name="continent" value="Africa" checked>
        Africa
    </label>
    <br/>
    <label>
        <input type="radio" name="continent" value="Australia/Oceania">
        Australia/Oceania
    </label>
    <br/>
    <label>
        <input type="radio" name="continent" value="Europe">
        Europe.
    </label>
    <br/>
    <button id="submit">Search</button>
</form>
<div id="outarea"></div>

<script>
    const myForm = $('form[name="myForm"]');
    myForm.submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form
        // Get value of selected radio
        let dataFormRadio = $('input[name="continent"]:checked').val();
        $.ajax({
            method: "GET",
            url: "/your-url.php",
            data: {continent: dataFormRadio}
        })
            .done(function (res) {
                console.log('request successful')
            })
            .fail(function (res) {
                console.log('request failed')
            });
    });
</script>
</body>
</html>
