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
    <div class="container">
<!--        <a href='#' onclick='removeThisFilter()' class='fg-container--filterSelected-option'>Clicked label 1</a>-->
    </div>

    <div class="container">
        <a href="#" data-text="Category Name 1" onclick="" class="fg-container--filterSelected-option">Category Name 1 x</a>
        <a href="#" data-text="Category Name 2" onclick="" class="fg-container--filterSelected-option">Category Name 2 x</a>
        <a href="#" data-text="Category Name 3" onclick="" class="fg-container--filterSelected-option">Category Name 3 x</a>
    </div>

    <div id="filters">
        <fieldset id="">
            <label class="00001" title="00001" index="0">Category Name 1</label>
            <label class="00002" title="00002" index="1">Category Name 2</label>
            <label class="00003" title="00003" index="2">Category Name 3</label>
            <label class="00004" title="00004" index="3">Category Name 4</label>
        </fieldset>
    </div>

    <script>
        const insertNode = $('.container')
        const filters = $('#filters')

        $('#filters fieldset label').click(function (e) {
            const text = $(this).text();

            // Check if a tag with the content TEXT has been added before or not
            // You can see detail find() function in here: https://api.jquery.com/find/
            // This is my way to check duplicate labels, you can consider another way
            const isAdded = insertNode.find('a[data-text="'+ text +'"]');
            if (isAdded.length === 0) {
                const html = "<a href='#' data-text='"+ text +"' onclick='' class='fg-container--filterSelected-option'>" + text + " x</a>"
                insertNode.append(html)
            }
        })

        // event handle remove tag
        insertNode.delegate('a', 'click', function () {
            $(this).remove();
        })
    </script>
</body>
</html>
