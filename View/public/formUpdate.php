<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./Router.php?action=formUpdate" method="post">
    <input type="hidden" name="id_user" id="id_user" value="<?= $user["id_user"]; ?>">
    <div class="divForm">
            <label for="email">email</label>
            <input type="email" name="email" id="email" value="<?= $user["email"]; ?>" required>
        </div>

        <div class="divForm">
            <label for="password">password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="divForm">
            <label for="phone">phone</label>
            <input type="tel" name="phone" id="phone" value="<?= $user["phone"]; ?>">
        </div>

        <div class="divForm">
            <label for="cv">cv</label>
            <input type="file" name="cv" id="cv" value="<?= $user["cv"]; ?>">
        </div>

        <div class="divForm">
            <label for="city">city</label>
            <input type="text" name="city" id="city" value="<?= $user["city"]; ?>" required>
        </div>

        <div class="divForm">
            <label for="ray">ray</label>
            <select name="ray" id="ray"  value="<?= $user["ray"]; ?>" required>
                <option value="5km">5km</option>
                <option value="10km">10km</option>
                <option value="15km">15km</option>
                <option value="20km">20km</option>
                <option value="25km">25km</option>
            </select>
                
        </div>

        <label for="rgpd"> Je suis d'accord avec les CGV</label>
        <input type="checkbox" name="rgpd" id="rgpd" required>

        <div class="divForm">
            <input type="submit" name="submit" value="Envoyer">
        </div>
    </form>
</body>
</html>