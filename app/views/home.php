<?php $this->layout('viewIndex', ['title' => 'Home']); ?>

<h2>HOME</h2>
<br>

<!-- <div x-data="users" x-init="loadUsers()">
    <ul>
        <template x-for="user in data">
            <li x-text="user.name"></li>
        </template>
    </ul>
</div> -->

<form action="/" method="get">

    <input class="box" type="text" name="s" placeholder="Buscar valores">
    <button class="box" type="submit">Buscar</button>

</form>

<ul id="users_home">
    <?php foreach($users as $user): ?>
        <li><?php echo $user->name?> | <a href="/user/<?php echo $user->id?>">Detalhes</a></li>
    <?php endforeach; ?>
</ul>
