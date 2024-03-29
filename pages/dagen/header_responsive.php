<?php
//maak de verbinding
require '../config.php';
session_start();
$bericht = "";

// haal de naam uit de URL
$Naam = $_GET['Naam'];

if (isset($_POST['pasaanSubmit'])) {

    $gebruikerID = $_POST['gebruikerID'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $email = $_POST['email'];

    $query = "UPDATE Accounts SET Gebruikersnaam = '{$gebruikersnaam}', ";
    $query .= " Wachtwoord = md5('{$wachtwoord}'), Email = '{$email}'";
    $query .= " WHERE GebruikerID = {$gebruikerID}";

    $result = mysqli_query($mysqli, $query);


    if ($result) {
        header("Location:../profiel.php?Naam=" . $gebruikersnaam);
    }

}
?>

<aside class="instellingen">
    <h4><i class="fas fa-cog"></i></h4>
    <div class="tekst">

        <form action="" id="instelling" method="post">
            <?php
            // Query aan gemaakt //
            $query = "SELECT * FROM `Accounts` WHERE Gebruikersnaam = '{$Naam}'";
            // De query uitgevoerd en het resultaat opgevangen //
            $result = mysqli_query($mysqli, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($item = mysqli_fetch_assoc($result)) {

                    ?>
                    <input hidden type="text" name="gebruikerID"
                           value="<?= $item['GebruikerID'] ?>">
                    <p><strong>Gebruikersnaam: </strong><input class="input" type="text"
                                                               name="gebruikersnaam"
                                                               value="<?= $item['Gebruikersnaam'] ?>"
                                                               disabled></p>
                    <p><strong>Wachtwoord:</strong><input class="input" type="password"
                                                          name="wachtwoord" placeholder="******"
                                                          disabled></p>
                    <p><strong>E-mail: </strong><input class="input" type="email" name="email"
                                                       value="<?= $item['Email'] ?>" disabled></p>
                    <?php
                }
            }
            ?>
            <label id="pasaan" for="button"><i class="fas fa-sliders-h"></i></label>
            <input type="button" name="edit" id="button" onclick="enableInput()" hidden>
            <p id="bevestiging">
                <label for="check"><i class="fas fa-check-circle"></i></label>
                <input type="submit" id="check" name="pasaanSubmit" hidden>
            </p>
        </form>
    </div>
</aside>

<header class="header">
    <div class="logo">
        <a href="../../index.php?Naam=<?= $Naam ?>"><img src="../../media/logo.png" alt="Post It!-logo" class="logo-img"></a>
    </div>

    <nav class="nav-md">
        <ul class="menu-nav">
            <li class="menu-nav__item">
                <a href="../../index.php?Naam=<?= $Naam ?>" class="menu-nav__link" id="home">Home</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=1" class="menu-nav__link" id="ma">Maandag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=2" class="menu-nav__link" id="di">Dinsdag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=3" class="menu-nav__link" id="wo">Woensdag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=4" class="menu-nav__link" id="do">Donderdag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=5" class="menu-nav__link" id="vrij">Vrijdag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=6" class="menu-nav__link" id="zat">Zaterdag</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=7" class="menu-nav__link" id="zon">Zondag</a>
            </li>
            <li class="menu-nav__item">
                <a href="../loguit.php?Naam=<?= $Naam ?>" class="menu-nav__link" id="loguit">Log uit</a>
            </li>
        </ul>
    </nav>

    <nav class="nav-sm">
        <ul class="menu-nav">
            <li class="menu-nav__item">
                <a href="../../index.php?Naam=<?= $Naam ?>" class="menu-nav__link" id="home">Home</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=1" class="menu-nav__link" id="ma">Ma</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=2" class="menu-nav__link" id="di">Di</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=3" class="menu-nav__link" id="wo">Wo</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=4" class="menu-nav__link" id="do">Do</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=5" class="menu-nav__link" id="vrij">Vr</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=6" class="menu-nav__link" id="zat">Za</a>
            </li>
            <li class="menu-nav__item">
                <a href="dag.php?Naam=<?= $Naam ?>&Dag=7" class="menu-nav__link" id="zon">Zo</a>
            </li>
            <li class="menu-nav__item">
                <a href="../loguit.php?Naam=<?= $Naam ?>" class="menu-nav__link" id="loguit">Log uit</a>
            </li>
        </ul>
    </nav>
</header>