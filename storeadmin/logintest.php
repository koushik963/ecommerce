<?php
session_start();
if (isset($_POST["submit"])) {
  if ($_POST["user"] == "php5" && $_POST["pass"] == "iscool") {
    $_SESSION["username"] = $_POST["user"];
  }
}
?>
<html>
<head>
<title>User Authentication</title>
</head>
<body>
<?php
if (isset($_SESSION["username"])) {
  echo("You are logged in!");
} else {
?>
<form method="post">
<input type="text" name="user" /><br />
<input type="password" name="pass" /><br />
<input type="submit" name="submit" value="Login" />
</form>
<?php
}
?>
</body>
</html>
  