<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/dashboard.css">
    <link rel="stylesheet" href="../static/css/readAll.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
        include("./dashboard.php");
    ?>

    <div id="partRight">
        <header>
            <h1>Uttilisateur(s)</h1>
        </header>
        <div class="ajouter">
        <a class="ajouter" href="./Router.php?action=create"><img src="../static/image/icons8-plus-30.png"  alt=""> Ajouter un nouveau uttilisateur</a>
    </div>



            <section id="boxJobseeker">
            <div class="flex color1">
                <ul class="flex box1">
                    <li class="marginR blanc">Mail</li>
                    <li class="marginR blanc">Ville</li>
                    <li class="marginR blanc">Rayon</li>
                </ul>
                <div class="flex box2">
                    <p class="marginL blanc">Voir detail</p>
                    <p class="marginL blanc">Modifier</p>
                    <p class="marginL blanc">Supprimer</p>
                </div>

        </div>

        <div  class="scroll">
        <?php foreach($users as $user): ?>

            <div class="flex colorline">
                <ul class="flex box1">
                    <li class="minibox"><?= $user["email"];?></li>
                    <li class="minibox"><?= $user["city"];?></li>
                    <li class="minibox"><?= $user["ray"];?></li>
                </ul>
                <div class="flex box2">
                <a class="marginL" href="./Router.php?action=readUser&id_user=<?= $user["id_user"]?>"><img class="icon1" src="../static/image/icons8-vision-24.png" alt=""></a>
                <!-- <a class="marginL" href="./Router.php?action=id_user=<?= $user["id_user"]?>"><img class="icon2" src="../static/image/icons8-stylo-à-bille-30.png" alt=""></a> -->
                <a class="marginL" href="./Router.php?action=delete&id_user=<?= $user["id_user"]?>"><img class="icon3" src="../static/image/icons8-supprimer-24.png" alt=""></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    </div>


</body>
</html>