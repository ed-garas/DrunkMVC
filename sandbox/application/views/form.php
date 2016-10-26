<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="<?php echo UrlHelper::getUrl('/form/send') ?>" method="post">
    <div>
        <label for="name">Vardas</label><br>
        <input id="name" type="text" name="name" placeholder="Tavo Vardas">
    </div>
    <div>
        <label for="date">Gimimo data</label><br>
        <input id="date" type="text" name="date" placeholder="Pvz:2016-01-31">
    </div>
    <div>
        <label for="age">Amžius</label><br>
        <input id="age" type="text" name="age" placeholder="Amžius">
    </div>
    <div>
        <label for="email">El. paštas</label><br>
        <input id="email" type="text" name="email" placeholder="El. paštas">
    </div>
    <div>
        <label for="gender">Lytis</label><br>
        <label><input id="gender" type="radio" name="gender" value="male"> Vyras</label>
        <label><input type="radio" name="gender" value="female"> Moteris</label>
    </div>
    <div>
        <label for="job">Specialybė</label><br>
        <select id="job" name="job">
            <option value="-1" selected="selected">Pasirinkite...</option>
            <option>Programuotojai</option>
            <option>Mokytojai</option>
            <option value="prastutės">Prastutės miergos iš kaimo</option>
        </select>
    </div>
    <div>
        <label for="message">Žinutė</label><br>
        <textarea id="message" name="message" placeholder="Parašyk man!!!"></textarea>
    </div>
    <div>
        <label><input type="checkbox" name="accept" value="1"> Sutinku su visomis jusu salygomis</label>
    </div>
    <div>
        <input type="submit" value="Siųsti">
    </div>
</form>
</body>
</html>
