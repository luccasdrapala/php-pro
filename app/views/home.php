<h2>HOME</h2>
<br>

<ul id="users_home">
    <?php foreach($users as $user): ?>
        <li><?php echo $user->name?> | <a href="/user/<?php echo $user->id?>">Detalhes</a></li>
    <?php endforeach; ?>
</ul>