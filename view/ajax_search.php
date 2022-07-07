<?php
include 'database.php';
$search_value=$_POST['search'];

$data=$database->search($search_value);
$output="";
if($data){
    $output='<table  cellspacing="10" cellpadding="10px" width="100%" border="1">
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>EMAIL</th>
    <th>GENDER</th>
    <th>AGE</th>
    <TH>ADDRESS</TH>
    <TH>EDIT</TH>
    <TH>DELETE.</TH>
    </tr>';
    foreach($data as $value){
        // print_r($value);
$output .="<tr>
<td>{$value['id']}</td>
<td>{$value['firstname']}</td>
<td>{$value['lastname']}</td>
<td>{$value['email']}</td>
<td>{$value['gender']}</td>
<td>{$value['age']}</td>
<td>{$value['address']}</td>
<td><button class='delete-btn' data-id='{$value['id']}'>Delete</button></td>
<td><button class='edit-btn' data-eid='{$value['id']}'>EDIT</button></td>
</tr>";
    }
    $output .="</table>";
    echo $output;
}else{
    echo "No Record Found";
}


?>