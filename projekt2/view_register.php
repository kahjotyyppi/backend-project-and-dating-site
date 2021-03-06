<article>
<br>
<h1>Användarinformation:</h1>
<form action="login.php" method="post">
        Användarnamn: <input type="text" name="username"> <br>
        Lösenord: <input type="text" name="password"><br>
        E-post: <input type="email" name="email"><br>
        <h1>Info till din profil:</h1>
        Ditt hela namn: <input type="text" name="fullname"><br>
        Hemstad: <input type="text" name="city"><br>
        Årlig inkomst: <input type="number" name="salary"><br>
        <label for="preference">Jag söker efter:</label>
        <select id="preference" name="preference">
            <option value="1">Män</option>
            <option value="2">Kvinnor</option>
            <option value="3">Män och Kvinnor</option>
            <option value="4">Vad som helst!</option>
            <option value="5">Vill inte specifiera</option>
        </select><br>
        <br>
        Berätta om dig själv:
        <br>
        <textarea name="aboutme" cols="40" rows="6"></textarea><br>
        <input type="hidden" name="page" value="register">
        <input type="submit" name="skicka" value="Registrera dig">
        </form>
        <br>
Har du redan ett konto <a href="login.php?page=login"> Logga in här </a>
<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['email']))
{
$username = test_input($_REQUEST["username"]);
$email = test_input($_REQUEST["email"]);
$password = test_input($_REQUEST["password"]);
$password = hash("sha256", $password);
$fullname = test_input($_REQUEST["fullname"]);
$city = test_input($_REQUEST["city"]);
$salary = test_input($_REQUEST["salary"]);
$aboutme = test_input($_REQUEST["aboutme"]);
$preference = $_REQUEST["preference"];

$sql = "SELECT * FROM `annonser` WHERE `username` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username]);

if(!$stmt->fetchObject()) 
{
$sql = "INSERT INTO annonser(id, username, fullname, password, email, city, aboutme, salary, preference, likes, dislikes) VALUES (NULL,?,?,?,?,?,?,?,?,?,?);";
$stmt = $conn->prepare($sql);
    if ($stmt->execute([$username, $fullname, $password, $email, $city, $aboutme, $salary, $preference, 0, 0])) 
    {  
    print("Du har registrerats!");
    }
}
else 
{
    print ("Användarnamnet är redan taget! Välj ett annat användarnamn.");
}
}
?>
</article>