<!DOCTYPE html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
        <style>
        
        body {
            font-family: 'PT Serif', 'serif';
            background-color: #FFFFFF;
        }
        .error {
            color: #000000;
            padding-left: 10px;
            }

        .field {
            min-width: 250px;
            min-height: 24px;
            font-size: 16px;
            padding-left: 5px;
            font-family: 'PT Serif', 'serif';
        }

        #container {
            background-color: rgba(240, 128, 128, 0.678);
            padding: 50px;
            height: 1000px;
            align-items: center;
            width: 60%;
            margin-left: 17.5%;
            border-radius: 5%;
        }

        #applicationform {
            font-size: 16px;
        }

        .button {
            min-width: 100px;
            min-height: 40px;
            font-size: 16px;
            font-family: 'PT serif';
        }

        #title {
            text-align: center;
        }

        textarea {
            font-family: 'PT serif';
            padding: 5px;
        }

        </style>
    </head>
<body>
    <?php

    $firstnameErr = $lastnameErr = $phonenumberErr = $emailErr = $genderErr = $subjectErr = "";
    $firstname = $lastname = $phonenumber = $email = $gender = $comment = $subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Voornaam is verplicht";
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $firstnameErr = "Alleen letters of spaties gebruiken!";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Achternaam is verplicht";
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lastnameErr = "Alleen letters of spaties gebruiken!";
        }
    }

    if (empty($_POST["phonenumber"])) {
        $phonenumberErr = "Telefoonnummer is verplicht";
    } else {
        $phonenumber = test_input($_POST["phonenumber"]);
        if (!preg_match("/^[0-9]{10}$/", $phonenumber)) {
            $phonenumberErr = "Telefoonnummer ongeldig";
        }
    }

    if (empty($_POST["email"])) {
    $emailErr = "Emailadres is verplicht";
    } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Ongeldig emailadres format";
        }
    }

    if (empty($_POST["gender"])) {
    $genderErr = "Geslacht is verplicht";
    } else {
    $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["subject1"])) {
        $subjectErr = "Geef minimaal één vak aan";
    } else {
    $subject1 = test_input($_POST["subject1"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $subject1)) {
    $subjectErr = "Alleen letters of spaties gebruiken!";
    }
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div id="container">
<h2 id="title">Aanmeldformulier nieuwe leraar</h2>
<br>
<p><span class="error">*Verplicht veld</span></p>
<form id="applicationform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Voornaam: 
    <br>
    <input class ="field" type="text" name="firstname" value="<?php echo $firstname;?>">
    <span class="error">* <?php echo $firstnameErr;?></span>
    <br><br>
    Achternaam: 
    <br>
    <input class="field" type="text" name="lastname" value="<?php echo $lastname;?>">
    <span class="error">* <?php echo $lastnameErr;?></span>
    <br><br>
    Telefoonnummer: 
    <br>
    <input class="field" type="text" name="phonenumber" value="<?php echo $phonenumber;?>">
    <span class="error">* <?php echo $phonenumberErr;?></span>
    <br><br>
    E-mail: 
    <br>
    <input class="field" type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Vakken:
    <br>
    <input class="field" type="text" name="subject1" value="<?php echo $subject1;?>">
    <span class="error">* <?php echo $subjectErr;?></span>
    <br>
    <input class="field" type="text" name="subject2" value="<?php echo $subject2;?>">
    <br>
    <input class="field" type="text" name="subject3" value="<?php echo $subject3;?>">
    <br><br>
    Geslacht:
    <br>
    <input type="radio" name="gender" value="female">Vrouw
    <input type="radio" name="gender" value="male">Man
    <input type="radio" name="gender" value="other">Anders
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    Opmerking:
    <br> 
    <textarea name="comment" rows="10" cols="50"><?php echo $comment;?></textarea>
    <br><br>
    
    <input class="button" type="submit" name="submit" value="Verzenden">
</form>    
</div>
<!--<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>-->

</body>
</html>