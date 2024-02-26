<?php ob_start() ?>

<nav class="navbar navbar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="navbar-brand nav-item dropdown"><a href="./addCharacter">Ajouter un personnage</a></li>
    </ul>
</nav>

<?php $navbar = ob_get_clean() ?>