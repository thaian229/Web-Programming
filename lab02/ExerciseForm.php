<html>
    <head> <title> Receiving Input </title> </head>
    <body>
            <?php
                $name = $_POST["name"];
                $email = $_POST["email"];
                $tel = $_POST["tel"];
                $gender = $_POST["gender"];
                $pref = $_POST["pref"];
                $news = $_POST["news"];
                switch($gender) {
                    case "male":
                        print "<h2>Hi Mr. ";
                        break;
                    case "female":
                        print "<h2>Hi Ms. ";
                        break;
                    case "others":
                        print "<h2>Hi ";
                        break;
                    default:
                        break;
                }
                print "$name, here your submited info</h2>";
                print "<b>Your contract info are:</b><br> Email: $email <br> ";
                print "Tel No. (+84) $tel<br><br>";
                print "<b>List of preferences:</b> ";
                foreach ($pref as $index) {
                    print "<br>$index";
                }
                print "<br><br>";
                if ($news == 1) {
                    print "<b>We will send you news related to your preferences!</b>";
                } else {
                    print "<b>We will not send you news related to your preferences!</b>";
                }
            ?>
    </body>
</html>