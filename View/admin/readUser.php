<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <ul>
            <li><?= $user["email"]?></li>
            <li><?= $user["phone"]?></li>
            <li><?= $user["cv"]?></li>
            <li><?= $user["city"]?></li>
            <li><?= $user["ray"]?></li>
            <li><?= $user["admin"]?></li>
        </ul>
        <a href="./Router.php?action=update&id_user=<?= $user["id_user"]?>">Modif</a>
        <a href="./Router.php?action=delete&id_user=<?=$user["id_user"]?>">Supprimer</a>
</body>
</html>