<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-2">

        <div class="actions">
            <div id="header" class="container">
                <div class="btn-group-vertical" role="group" aria-label="...">
                    <?php echo $this->element('menu/side_menu'); ?>
                </div>
            </div>
        </div><!-- /.actions -->

    </div>
    <div id="page-content" class="col-sm-10">
        <div class="jumbotron">
    <?php
    $str = "/img/logo.svg";
            echo $this->Html->tag('embed', " " ,  array('src' => $str , 'width' => '400', 'height' => '400')); 
            ?>         
            <h2>Informations à propos de mon application web</h2>
            <h4>- Nom: Sébastien Favron<br />
                - Titre du Cours: Application internet (420267MO - Automne 2015)<br /></h4>
            <h3>Étapes d'utilisation typiques permettant de vérifier le bon fonctionnement de mon application web:</h3>
            <h3>Manque de temps pour compléter les tests</h3>
            <h3>Auto Complete</h3>
            <h4>Il se situe dans la vue edit et add de Comment au champ association</h4>
            <h3>Manque de temps pour compléter les tests</h3>
            <h2>Base De données</h2>
            <h4>- La base de données original</h4>
            <?php echo $this->Html->image('apartment_rentals_dezign.gif', array('escape' => false, 'width' => '800', 'height' => '500')); ?>
            <a href="http://www.databaseanswers.org/data_models/apartment_rentals/index.htm">Lien vers l'emplacement original</a> 
        </div>
    </div><!-- /#page-content .col-sm-9 -->

</div>
