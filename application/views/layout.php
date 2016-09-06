<!doctype html>
<html lang="en">
<head>
    <?php echo $meta; ?>
</head>
<body>
<?php foreach ($arr as $value) { ?>
    <p><?php echo $value ?></p>
<?php } ?>
<p>
    <?php if ($coo) { ?>
        <strong>hello</strong>
    <?php } else { ?>
        <em>goodbye</em>
    <?php } ?>
</p>

</body>
</html>