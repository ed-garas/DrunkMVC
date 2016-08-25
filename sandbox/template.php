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
<?php foreach ($arr as $value){ ?>
    <p><?php echo $value ?></p>
<?php } ?>
<p>
    <?php if ($coo){ ?>
        <strong>hello</strong>
    <?php } else{ ?>
        <em>goodbye</em>
    <?php } ?>
</p>

</body>
</html>