<?php if ($auth) : ?>
    <div>Привет <?= $userName ?>! <a href="/?logout">Выход</a></div>
<?php else : ?>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
<?php endif; ?>
