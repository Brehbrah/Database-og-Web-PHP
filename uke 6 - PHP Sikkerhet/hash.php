<?php 

$password = "admin";

$pwnHash = '$2y$10$rLLoVD7kKlfgGQVB49EgteCxvTUVa/3H2q39Qlj7qc5mBUQ5BifAW';

echo $password;

echo '<br>';

$hash = password_hash($password, PASSWORD_BCRYPT);

echo $hash;

if (password_verify("admin", $pwnHash)) {
	echo "<h2>Success</h2>";
} else {
	echo "<h2>Try Again</h2>";
}

?>