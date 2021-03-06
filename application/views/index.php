<?php defined('CORE_PATH')or exit('no access');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400" rel="stylesheet">
    <title>DrunkMVC</title>
    <style>
        .hello{
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform:  translate(-50%, -50%);
            -moz-transform:  translate(-50%, -50%);
            -ms-transform:  translate(-50%, -50%);
            -o-transform:  translate(-50%, -50%);
            transform:  translate(-50%, -50%);
            text-align: center;
        }
        .hello p{
            font-family: 'Ubuntu', sans-serif;
            font-size: 40px;
            font-weight: 300;
        }
        .docs {
            position: absolute;
            bottom: 50px;
            right: 50px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            font-weight: 300;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="hello">
<p><?php echo $hello; ?></p>
<img src="<?php echo UrlHelper::getUrl('/asset/img/drunk-icon.png'); ?>">
</div>

<a class="docs" href="<?php echo UrlHelper::getUrl('home/docs'); ?>">Documentations</a>
</body>
</html>