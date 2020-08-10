<?php

    session_start();
    include('bdd.php');

    if (isset($_POST['access_tech']) && $_POST['access_tech'] == 'Ok'){
    ?>
        <form action="technique_envoi2.php" method="post">

            <label>Nom de la technique</label><br />
            <input type="text" placeholder="" name="nom_technique" value="" required><br /><br />

            <label>Rang de la Technique</label><br />
            <select id="rang" name="rang">
                <option value="E" name="E">E</option>
                <option value="D" name="D">D</option>
                <option value="C" name="C">C</option>
                <option value="B" name="B">B</option>
                <option value="A" name="A">A</option>
                <option value="S" name="S">S</option>
                <option value="Z" name="Z">Z</option>
            </select><br /><br />

            <label>Premier Axe</label><br />
            <select id="axe1" name="axe1">
                <option value="Æthernano">Æthernano</option>
                <option value="Ether1">Ether1</option>
                <option value="Mêlée">Mêlée</option>
                <option value="Dextérité">Dextérité</option>
                <option value="Résistance Physique">Résistance Physique</option>
                <option value="Ingénierie">Ingénierie</option>
                <option value="Seconde Origine">Seconde Origine</option>
                <option value="Ether2">Ether2</option>
                <option value="Résistance Magique">Résistance Magique</option>
            </select><br />
            <label>Second Axe</label><br />
            <select id="axe2" name="axe2">
                <option value=""></option>
                <option value="Æthernano">Æthernano</option>
                <option value="Ether1">Ether1</option>
                <option value="Mêlée">Mêlée</option>
                <option value="Dextérité">Dextérité</option>
                <option value="Résistance Physique">Résistance Physique</option>
                <option value="Ingénierie">Ingénierie</option>
                <option value="Seconde Origine">Seconde Origine</option>
                <option value="Ether2">Ether2</option>
                <option value="Résistance Magique">Résistance Magique</option>
            </select><br /><br />

            <label>Description de la technique</label><br />
            <input type="text" placeholder="" name="description_technique" value="" required><br /><br /><br />

			<button type="submit" name="submit_tech" value="Ok">Envoyer</button>
		</form>

            <?php

    }

?>