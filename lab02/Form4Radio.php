<html>
    <head> <title> Receiving Input </title> </head>
    <body>
            <?php
                $email = $_POST["email"];
                $contract = $_POST["contract"];
                print ("<br>Your email address is: $email");
                print ("<br>Contract preference is: $contract");
            ?>
    </body>
</html>