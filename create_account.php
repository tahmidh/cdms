<?php 
require_once('connection.php');

if(isset($_POST["submit"]))  {
	$username = filter_input(INPUT_POST, "username"); 
	$password = filter_input(INPUT_POST, "password"); 

	$new_pass = createPassword($password); 

	$sql = "INSERT INTO member (`mem_id`, `username`,`password`) VALUES(NULL,'".$username."', '".$new_pass."'"; 

} else {
?>
<form id="form" action="create_account.php" method="POST">
<p>
<label for="name">User Name: </label>
<input type="text" name="username">
</p>
<p>
<label for="name">Password: </label>
<input type="text" name="password">
</p>

<p>
<input type="submit" name="submit" value="Submit">
</p>
</form>
<?php
	}
?>

<?php 
function createPassword($password){ 
    $rand  = md5(time() . uniqid() . rand(1, 1000)); 
    $crypt = crypt($password, $rand); 
    return $crypt; 
} 

function verifyPassword($password, $salt){ 
    if(crypt($password, $salt) === $salt){ 
        return true; 
    } 
    return false; 
}