<?php include "handy_method.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-End Projekt 1</title>
    <link rel="stylesheet" href="../style.css">
    <script src="./script.js" defer></script>
</head>

<body>

    <div id="container">
        <!-- Max 800px bred container-->

<?php include "header.php" ?>

        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>

         <?php
            include "uppg1.php";
            include "uppg2.php";
            include "uppg3.php";
            include "uppg4.php";
            include "uppg5.php";
            include "uppg6.php";
            include "uppg8.php";
            include "uppg9.php";
         ?>
            

        </section>

        <footer>
            Made by Sippe, Patrik & Atte<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>