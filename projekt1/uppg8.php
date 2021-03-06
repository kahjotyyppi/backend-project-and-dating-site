<article>
    <h2>Besöksräknare - Uppg 8</h2>
<?php

// Modifierad kod som är tagen från https://www.php.net/manual/en/function.fwrite.php
$filename = 'besok.txt';
$remote_user = $_SERVER["REMOTE_USER"];
$ip = $_SERVER['REMOTE_ADDR'];
$somecontent = $ip . " - " . $remote_user . " - " . date("d.m.Y H:i:s") . "\n";
$filecontent = file_get_contents($filename);

if (is_writable($filename)) {

    // a+ = Skriv och läs, pointern i slutet av filen
    if (!$fp = fopen($filename, 'a+')) {
        echo "Cannot open file ($filename)";
        exit;
    }

    // Kollar om det är ett unikt användarnamn och ip
    if (strpos($filecontent, $ip) === false && strpos($filecontent, $remote_user) === false) {

        // Skriver i filen
        if (fwrite($fp, $somecontent) === false) {
            echo "Cannot write to file ($filename)";
            exit;
        }
    }

    fclose($fp);

} else {
    echo "The file $filename is not writable";
}

    // Öppnar filen pånytt för att räkna raderna efter möijlig ny text i filen.
    $fp = fopen($filename, 'a+');
    // Räknar hur många lines filen har
    $count = 0;
    while ($line = fgetss($fp)) {$count++;};
    echo "<b>Unika besök: " . $count . "</b><br>";
    fclose($fp);

    // Måste söka ny file content ifall nytt text skriven i filen
    $filecontent = file_get_contents($filename);
?>

<!--Visar textfilens innehåll i en textarea-->
<br><textarea id='visits'  rows="10" cols="55" disabled><?php print($filecontent);?></textarea>

</article>
<div class="separator"></div>