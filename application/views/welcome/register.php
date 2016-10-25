<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER:)</title>
</head>
<body>

<h1>Register :)</h1>
<ul>
    <li><a href="<?php echo UrlHelper::getUrl('welcome')?>">Home Page</a></li>
    <li><a href="<?php echo UrlHelper::getUrl('login')?>">Login</a></li>
</ul>
<?php if(isset($errors)): ?>
    <p>Neteisingai užpildyta forma :(</p>
<?php endif; ?>
<form action="<?php echo UrlHelper::getUrl('/register') ?>" method="post">
    <div>
        <label for="name">Vardas</label><br>
        <input id="name" type="text" name="name" placeholder="Tavo Vardas">
    </div>
    <div>
        <label for="email">Email</label><br>
        <input id="email" type="text" name="email" placeholder="Tavo Email">
    </div>
    <div>
        <label for="password">Slaptažodis</label><br>
        <input id="password" type="password" name="password" placeholder="Tavo Slaptažodis">
    </div>
    <div>
        <input type="submit" value="Registruotis">
    </div>
</form>
</body>
</html>

