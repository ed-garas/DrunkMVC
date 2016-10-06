<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="<?php echo UrlHelper::getUrl('/ajax/send') ?>" method="post">
    <div>
        <label for="name">Vardas</label><br>
        <input id="name" type="text" name="name" placeholder="Tavo Vardas">
    </div>
    <div>
        <input type="submit" value="Siųsti">
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {

        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "<?php echo UrlHelper::getUrl('/ajax/send') ?>",
                dataType: 'json',
                data: $('form').serialize()
            })
                .done(function (msg) {
                    console.log(msg);
                });
        });

    });


</script>


</body>
</html>
