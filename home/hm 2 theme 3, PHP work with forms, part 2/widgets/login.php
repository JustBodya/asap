

<?php if ($auth) : ?>
    Привет <?= $userName ?>! <a href="/?logout">Выход</a>
<?php endif; ?> <br>
<form action="" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="pass" placeholder="Пароль">
    <input type="submit" value="Войти">
</form>
