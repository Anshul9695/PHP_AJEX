<?php
include 'database.php';
include 'header.php';
$errors = array();
?>


<form action="register.php" method="post">
    <div>
        <?php if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div class="container">
        <h1>Register</h1>
        <hr>
        <label for="email"><b>FIRST NAME</b></label>
        <input type="text" name="first_name" id="first_name">

        <label for="email"><b>Last Name</b></label>
        <input type="text" name="last_name" id="last_name">


        <label for="email"><b>Email</b></label>
        <input type="text" name="email" id="email">
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" id="optradio" checked>Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" id="optradio">Female
        </label>

        <label for="adg"><b>AGE</b></label>
        <input type="text" name="age" id="age">

        <label for="ADDRESS"><b>ADDRESS</b></label>
        <input type="text" name="address" id="address">

        <button type="submit" name="save" class="registerbtn" id="save">Insert Data</button>
    </div>
</form>
<?php
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$address = $_POST["address"];
if (empty($first_name)) {
    array_push($errors, "first_name is Required..");
}
if (empty($last_name)) {
    array_push($errors, "Category Description is Required..");
}
if (empty($email)) {
    array_push($errors, "Category Description is Required..");
}
if (empty($gender)) {
    array_push($errors, "Category Description is Required..");
}
if (empty($age)) {
    array_push($errors, "Category Description is Required..");
}
if (empty($address)) {
    array_push($errors, "Category Description is Required..");
}
if (count($errors) == 0) {
    $insert = $database->save_value($first_name, $last_name, $email, $gender, $age, $address);
    if ($insert) {
        echo "Recored Inserted Successfully...";
    } else {
        echo "errors to insert the record";
    }
} else {
    echo "please fill the Record";
}
?>


<!-- LOAD THE DATA IN TABLE  -->
<button type="submit" class="registerbtn" id="LoadData">Load Table Data</button>
<table>
    <tr>
        <td id="display">
        </td>
    </tr>
</table>
<div id="model">
    <div id="model-form">
        <h3>Edit Record</h3>
        <table cellpadding="0" width="100%">
            
        </table>
        <div id="close-btn">X</div>
    </div>
</div>

<?php

include 'footer.php';
?>