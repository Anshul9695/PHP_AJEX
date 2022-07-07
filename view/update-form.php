<?php
include 'database.php';
$student_id = $_POST['id'];
$result = $database->select_by_id($student_id);
$output = "";
if ($result) {
    foreach ($result as $values) {
        $output .= "
    <tr>
                <td>First Name</td>
               <input type='hidden' id='edit_id' readonly name='id' value='{$values['id']}' > 
                <td> <input type='text' id='edit_fname' name='fname' value='{$values['firstname']}'> </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td> <input type='text' id='edit_lname' name='lname' value='{$values['lastname']}'> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td> <input type='text' id='edit_email' name='email' value='{$values['email']}'> </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>  <input type='radio' name='gender' value='male' id='edit_gender' value='{$values['gender']}' checked>Male <br/>
                <input type='radio' name='gender' value='female' id='edit-gender'>Female
            </td>
            </tr>
            <tr>
                <td>Age</td>
                <td> <input type='text' id='edit_age' name='age' value='{$values['age']}'> </td>
            </tr>
            <tr>
                <td>Address</td>
                <td> <input type='text' id='edit_address' name='address' value='{$values['address']}'> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type='submit' id='edit_submit' value='Update'> </td>
            </tr>
    ";

        echo $output;
    }
} else {
    echo "No Record Found";
}
