<ul id="menu_list">
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Create</a></li>
</ul>

<div class="status_login">
    <?php if (logged()):  ?>
        Olá, <?php echo user()->name; ?> | <a href="/logout">Sair</a>
    <?php else: ?>
        Bem vindo, visitante !
    <?php endif; ?>
</div>