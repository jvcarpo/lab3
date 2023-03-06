<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="home.css">
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
</style>
</head>
<body>
	<div class="container">
		<div class="navigation">
			<nav>
				<ul>
					<li><a href="home.html">Home</a></li>
					<li><a href="Resources.html">Resources</a></li>
					<li><a href="about.html">About</a></li>	
				</ul>
			</nav>
		</div>
		<div>
			<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>
		</div>
</body>
</html>