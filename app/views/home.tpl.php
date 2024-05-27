<ul>
    <?php foreach ($viewData['pokemonList'] as $pokemons) : ?>
        <li> <a href="<?= $router->generate('pokemon-about',['id'=> $pokemons->getId()])?>"> <?=$pokemons->getName() ?></a></li>
        
    <?php endforeach; ?>
</ul>

