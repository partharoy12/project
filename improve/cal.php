<?php
error_reporting("E_NOTICE");
?>

<?php
////include('header.php');
include('../connection.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:../index.php');
}
//
?>
<?php
//mag show sang information sang user nga nag login
$user_id=$_SESSION['user_id'];

$result=mysql_query("select * from users where user_id='$user_id'");
$row=mysql_fetch_array($result);

$FirstName=$row['FNAME'];
$LastName=$row['LNAME'];
?>
<div style="float:right; margin-right:24px;" ;>
		<?php
echo '<img src="../images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>
		<a href="../logout.php" class="logout">Logout</a></div>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Name of school</title>
<link rel="icon" type="image/ico" href="../images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="../school.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="school_body_wrapper">
<div id="school_wrapper">

	<div id="school_header">
		<div id="site_title"> <a href="#"></a> </div>
<!-- end of site_title -->
		<div id="header_right"> <img src="../images/user-group-icon.png" width="200" height="150" /> </div>
		<div class="cleaner"></div>
</div>
<!-- end of header -->

    <div id="school_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
				<ul>
						<li><a href="../home.php?action=home" >Home</a></li>
						<li><a href="#">Recent News</a>
								<ul>
										<li><a href='../home.php?action=update_news'> Update News</a></li>

								</ul>
						</li>
						<li><a href="#">View records</a>
								<ul>
										<li><a href='../home.php?action=onbursary'>no. of victims </a></li>

								</ul>
						</li>
						<li><a href="#">NGO</a>
								<ul>
										<li><a href='../home.php?action=viewclubs'>available NGO's</a></li>

								</ul>
						</li>

				</ul>

		</div>
        <div id="school_search"> <form action="../home.php?action=search" method="post">

              <select value=" " name="search" id="keyword" title="news"  class="txt_field" required >

			  <option><option><?php
						$result = mysql_query("SELECT keyword FROM updated_news ");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['keyword'].'">';
								echo $row['keyword'];
								echo '</option>';
							}
						?>


			  </select>
              <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of school_menubar -->


    <!-- END of school_main -->

    <div id="school_footer">
    	      <div align=center> Copyright &copy; 2017  Designed by ROSHNI team. </div>

    </div> <!-- END of school_footer -->

</div> <!-- END of school_wrapper -->
</div> <!-- END of school_body_wrapper -->

</ul></body>
</html>
