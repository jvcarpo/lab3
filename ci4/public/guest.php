<!DOCTYPE html>
<html>
<head>
<title>Form</title>
</head>
<body>

<?php
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["message"])) {
	   $messageErr = "Message id is required";
  } else {
    $message = test_input($_POST["message"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<style>
*{
	margin: 0;
	padding: 0;
}
.container{
	height:100%;
	width: 100%;
	background-image: url(images/sky.png);
	background-position:center;
	background-repeat: no-repeat;
	background-size: cover;
}
.navigation{
	width:100%;
	height:15vh;
	margin: auto;
	display: flex;
	align-items: center;
	}
nav ul li{
	display: inline-block;
	list-style: none;
	margin: 0px 30px;
}
nav ul li a{
	text-decoration: none;
	color: black;
}
.wrapper{
            width: 1000px;
            margin: 0 auto;
        }
</style>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container">
		<div class="navigation">
			<nav>
				<ul>
					<li><a href="home">Home</a></li>
					<li><a href="Resources.html">Resources</a></li>
					<li><a href="about.html">About</a></li>	
					<li><a href="guest.php">Guest</a></li>	
				</ul>
			</nav>
		</div>
</head>
<div class="wrapper">
<h2>Send me a message</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Message: <input type="text" name="message" value="<?php echo $message;?>">
  <span class="error"><?php echo $messageErr;?></span>
  <br><br>
   <input type="submit" name="submit" value="Submit">  
   <button>See Messsaes</button>
</form>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $message;
?>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "webprogmi211";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO jvcarpo_myguests (name, email, message)
	VALUES ('$name', '$email', '$message')";
	
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}
?>
</body>
</html>