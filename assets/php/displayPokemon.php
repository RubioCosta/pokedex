<?php
    require_once('./assets/config/PokemonDao.php');
    
    $pokemonDao = new PokemonDao();

    $pokemonList = $pokemonDao->pokemonList();

?>

<div class="containerMain">
    <section class="containerDisplay">
        <?php foreach ($pokemonList as $pokemon):?>
        <div class="areaCard" style="background-color: <?php echo $pokemon->getColor(); ?>;">
            <div class="photoName">
                <img src="<?php echo $pokemon->getUrlImage(); ?>" class="imagePokemon">
                <h4><?php echo $pokemon->getName(); ?></h4>
            </div>
            <div class="typePokemon">
                <?php for($i=1; $i <= $pokemon->getCountTypes(); $i++): ?>
                    <div class="type"><?php echo $pokemon->getTypes($i); ?></div>
                <?php endfor; ?>
            </div>
        </div>
        <?php endforeach ?>
    </section>
    <div class="buttonPage">
            <?php if (isset($_SESSION['page']) > 1): ?>
            <div class="before">Anterior</div>
            <?php endif; ?>
            <div class="after">Próximo</div>
    </div>
</div>