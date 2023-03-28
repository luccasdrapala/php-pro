<h2>HOME</h2>
<br>

<ul>
    <?php foreach($users as $user): ?>
        <li><?php echo $user->name?></li>
    <?php endforeach; ?>
</ul>