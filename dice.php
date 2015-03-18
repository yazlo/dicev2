<!DOCTYPE html>
<?php
require 'class.dice.php';
$sidor = 6;
$antal = 2;

if (isset($_GET["sidor"])) {
    $sidor = (int) filter_input(INPUT_GET, 'sidor', FILTER_SANITIZE_SPECIAL_CHARS);
    $antal = (int) filter_input(INPUT_GET, 'antal', FILTER_SANITIZE_SPECIAL_CHARS);
}

$myDice = new Dice();
$diceRolled = $myDice->rollD($antal);


function listDiceRolled($rolls){
    $tmp = "<ol>";
    foreach($rolls as $roll) {
        $tmp .= "<li>".$roll."</li>";
    }
    $tmp .= "</ol>";
    return $tmp;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form>
            <label for="antal">Antal: </label><input type="text" name="antal" id="antal">
            <br>
            <label for="sidor">Sidor: </label><input type="text" name="sidor" id="sidor">
            <br>
            <input type="submit" value="skicka">
        </form>
        <h2>Tärningsslagen</h2>
        <ul>
            <li>Antal sidor på tärningen: <?php echo $diceRolled["sides"] ?></li>
            <li>Antal gånger den slogs: <?php echo $diceRolled["times"] ?></li>
            <li>Summan av tärningsslagen: <?php echo $diceRolled["summa"] ?></li>
            <li>Slag:
                <?php echo listDiceRolled($diceRolled["dice"]); ?>
            </li>
        </ul>
    </body>
</html>
