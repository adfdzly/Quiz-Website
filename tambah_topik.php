<?php
//fail wajib
require 'sambung.php';
?>

<?php
if (isset($_POST['submit'])){
$nom_soalan = $_POST['nom_soalan'];
$topik = $_POST['paparan_topik'];
$markah = $_POST['markah'];

//Query Topik + Masukkan Topik Baharu
$query="INSERT INTO topik (topik,markah)
values('$topik','$markah')";
$insert_row=mysqli_query($hubung, $query);
$last_id = mysqli_insert_id($hubung);
//MESEJ
echo "<script>alert('Topik baru telah ditambah');
window.location='tambah_soalan.php?idtopik=$last_id'</script>";
}
//KIRA JUMLAH TOPIK DALAM SENARAI
$query = "SELECT * FROM topik";
$topik = mysqli_query($hubung,$query);
$total=mysqli_num_rows($topik);
$next=$total+1;
?>

<html>
<head>
	<title>Eccoquiz Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="assets/AT-pro-logo.png"/>

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="overlay-scrollbar">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>

        <!--LOGO-->
			<li class="nav-item">
				<img src="assets/LOGO2.png" alt="ATPro logo" class="logo logo-light">
				<img src="assets/LOGO.png" alt="ATPro logo" class="logo logo-dark">
			</li>
		</ul>

		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
			<i class="fas fa-search"></i>
		</form>
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">

        <!--Dark and Light Theme-->
			<li class="nav-item mode">
				<a class="nav-item" href="#" onclick="switchTheme()">
                <img src="assets/moon.png" alt="ATPro logo" class="logo logo-light">
				<img src="assets/sun.png" alt="ATPro logo" class="logo logo-dark">
				</a>
			</li>

        <!--Profile-->
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					<img src="assets/profile.png" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li  class="dropdown-menu-item">
							<a class="dropdown-menu-link">
								<div>
									<i class="fas fa-user-tie"></i>
								</div>
								<span>Profile</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="Index2.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="Index1.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-tachometer-alt"></i>
					</div>
					<span>
						Main Page
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="Admin.php" class="sidebar-nav-link active">
					<div>
						<i class="fab fa-accusoft"></i>
					</div>
					<span>Dashboard</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="Show_topic.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-spinner"></i>
					</div>
					<span>Quiz</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="prestasi_topik.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-check-circle"></i>
					</div>
					<span>Student Achivement</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="senarai_pelajar.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-bug"></i>
					</div>
					<span>Student Lists</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="import_daftar.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-chart-line"></i>
					</div>
					<span>Insert Studets</span>
				</a>
			</li>
		</ul>
	</div>

    <div class="wrapper">
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-tasks"></i>
					</p>
					<h3>100+</h3>
					<p>To do</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<h3>100+</h3>
					<p>In progress</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<h3>100+</h3>
					<p>Completed</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
						<i class="fas fa-bug"></i>
					</p>
					<h3>100+</h3>
					<p>Issues</p>
				</div>
			</div>
		</div>


<center><h2>ADD NEW TOPIC</h2></center>
<main>
<table width="70%" border="0" align="center"
style='font-size:18px'>
<tr>
<td>
<form method="post" action="tambah_topik.php">
<p>
<label>Topic - </label>
<?php echo $next; ?>
<input type="text" value="<?php echo $next; ?>" name="nom_soalan" hidden />
</p>
<p>
<label>Topic :</label>
<input type="text" name="paparan_topik" size="60%"
required />
</p>
<p>
<label>Marks :</label>
<input type="text" name="markah" size="5%" required />
</p>
<p>
<input type="submit" name="submit" value="TAMBAH" />
<input type="button" value="CANCEL"
onclick="history.back()"/>
</p>
</form>
</td>
</tr>
</table>
</main>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>
</html>


