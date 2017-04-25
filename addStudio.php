<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
$stNum = "";
$stName = "";
$stAddress = "";
$stPC = "";
$stTelNum = "";

$connect = new mysqli('localhost', 'root', '', 'soundspace');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connected successfully";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $stNum = $_POST['fStdId'];
    $stName = $_POST['fStdName'];
    $stAddress = $_POST['fStdAd'];
    $stPC = $_POST['fStdPC'];
    $stTelNum = $_POST['fStdTP'];

$sql = "INSERT INTO studio(Studio_ID, Studio_Name, Studio_Address,Studio_PCode,Studio_TelNo) VALUES ('$stNum','$stName','$stAddress','$stPC','$stTelNum')";
if ($connect->query($sql)=== TRUE) {
    echo "<script> alert('Record added successfully!'); </script>";
} else{
   echo "<script> alert('Record Already Exists!'); </script>";
}
}
?>


<html>
    <head>
        <title>Add Studio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="myStylee.css">
    </head>
    <body>
        <p id ="abd"></p>
        <div id="form">
            <form action="addStudio.php" method="POST">
                <fieldset >
                    <legend><b>Add a Studio</b></legend><br>
                    <table>
                        <tr>
                            <td><b><span id = "asterisk">*</span>Studio Id Number: </b><br><br></td>
                            <td><input type="text" onkeypress="return isNumberKey(event)" required="required" name="fStdId" id="text"><br><br></td>
                        </tr>
                        <tr>
                            <td><b><span id = "asterisk">*</span>Studio Name: </b><br><br></td>
                            <td><input type="text" name="fStdName" required="required" id="text"><br><br></td>
                        </tr>
                        <tr>
                            <td><b><span id = "asterisk">*</span>Studio Address: </b><br><br></td>
                            <td><input type="text" name="fStdAd" required="required" id="text" ><br><br></td>
                        </tr>
                        <tr>
                            <td><b><span id = "asterisk">*</span>Studio Postcode:</b><br><br> </td>
                            <td><input type="text" name="fStdPC" required="required" id="text" maxlength="7" minlength="7" placeholder="XXX XXX"><br><br></td>
                        </tr>
                        <tr>
                            <td><b><span id = "asterisk">*</span>Telephone Number: </b><br><br><br></td>
                            <td><input type="text" onkeypress="return isNumberKey(event)" required="required" name="fStdTP" id="text" maxlength="11" minlength="11"><br><br><br></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Add Studio" ></td>
                            <td><input type="reset" value="Clear Form" ></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>

        <script>
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>

    </body>
</html>

