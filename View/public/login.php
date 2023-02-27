<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(isset($erreurs)):?>
    <?php var_dump($erreurs)?>
    <form action="./Router.php?action=login" method="post">
<?php else:?>
    <form action="../../Controller/Router.php?action=login" method="post">
<?php endif?>
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="login">
    </form>
</body>
</html>