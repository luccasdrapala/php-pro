<?php $this->layout('viewIndex', ['title' => 'Home']); ?>

<h2>HOME</h2>
<br>

<ul id="users_home">
    <?php foreach($users as $user): ?>
        <li><?php echo $user->name?> | <a href="/user/<?php echo $user->id?>">Detalhes</a></li>
    <?php endforeach; ?>
</ul>

<?php $this->start('scripts') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    axios.defaults.headers = {
        "Content-type":"application/json",
        HTTP_X_REQUESTED_WITH: "XMLHttpRequest",
    }
    async function loadUsers(){
        try {
            const {data} = await axios.get('/users');
            console.log(data)
        } catch (error) {
            console.log(error)
        }

    }
    loadUsers();
</script>

<?php $this->stop() ?>