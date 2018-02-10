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

$result=mysql_query("select * from users where user_id='$user_id'")or die(mysql_error);
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
<title></title>
<link rel="icon" type="image/ico" href="../images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="../school.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />
<link href="../date/htmlDatepicker.css" rel="stylesheet" />
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
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Recent News</a>
            <ul>
              <li><a href='?action=student'> update status</a></li>
            </ul>
          </li>

          <li><a href="?action=upload">upload photo</a></li>
        </ul>
      </div>
      <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keywords" title="NEWS"  class="txt_field" required >
            <option>
            <option>
            <?php
						$result = mysql_query("SELECT keywords FROM updated_news ");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['keywords'].'">';
								echo $row['keywords'];
								echo '</option>';
							}
						?>
          </select>
          <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
        </form>
      </div>
    </div>
    <!-- END of school_menubar -->


       <div id="content" class="float_l">
	  <br/></br>
        <!--<?php
		$action=$_REQUEST['action'];
		if ($action=='home'){
		?>
        <div id="slider-wrapper">
          <div id="slider" class="nivoSlider"> <img src='slider/bg1.jpg' alt="image" width="680" title="photo 1"  /> <a href="#"><img src="slider/bg2.jpg" alt="" width="680" title="photo 2" /></a> <img src="slider/bg3.jpg" alt="image" width="680" title="photo 3" /> <img src="slider/bg4.jpg" alt="image" width="680" title="photo 4" /> <img src="slider/bg5.jpg" alt="image" width="680" title="photo 5" title="##htmlcaption"   /> <img src="slider/bg6.jpg" alt="image" width="680" title="photo 6" /> <img src="slider/bg7.jpg" alt="image" width="680" title="photo 7" /> <img src="slider/bg1.jpg" alt="image" width="680" title="photo 1"  /> </div>
          <div id="htmlcaption" class="nivo-html-caption"> j<a href="#">j </a> j. </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        <p>&nbsp;</p>
        <h1>ALL FOR ONE AND ONE FOR ALL!</h1>


          <?php }
	 else  if($action=='search'){//------------------------------------------------------------

 $search=$_POST['search'];


$query=mysql_query("SELECT * from updated_news , image where image.image_id='$search' AND updated_news.keywords='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

?>
          <table style="border: 5px double #ff0010; background:url(images/powder.jpg);background-size:cover; padding:25px; color:black">
            <tr>
              <td scope="col" colspan="3" align="center">ALL FOR ONE AND ONE FOR ALL!</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              
             
              <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
            </tr>
            <tr>
              <td></td>
              <td><?php echo $array['updated_news'];?></td>
            </tr>


          </table>
          <?php

}else if($action=='updated_news'){//-------------------------------------------------------------------------------------------------
?>

          <p>&nbsp;</p>


        <?php
$sel=mysql_query("SELECT * FROM updated_news");
echo '<table class="out">';
echo '<th>DATE</th><th>NEWS UPDATE</th><th colspan=1>ACTION</th>';

while($fetch=mysql_fetch_array($sel)){

echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['date'].'</td><td>'.$fetch[''].'</td><td>'.$fetch['updated_news'].'</td><td><a href=modifyst.php?id='.$fetch[''].'><img src="../images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td></tr>';

}
echo '</table>';
}else if($action=='upload'){//---------------------------------------------------------------------------------------------

echo '<br/>u about to upload';
?>
        <form  method="POST" enctype="multipart/form-data" id="mytable">
          <table>
            <tr>
              <td> NEWS:</td>
              <td><select name="owner" required >
                  <option>
                  <option>
                  <?php
						$result = mysql_query("SELECT  keywords FROM updated_news WHERE keywords NOT IN (SELECT image_id FROM image)");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['keywords'].'">';
								echo $row['keywords'];
								echo '</option>';
							}
						?>
                </select>
              </td>
            </tr>
            <tr>
              <td>PHOTO:</td>
              <td><input type="file" name="image"  id="in" required /></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="submit" value="Upload"  />
                <input type="reset" name="reset" value="Cancel Upload"  /></td>
            </tr>
          </table>
        </form>
        <?php

 if (isset($_POST['submit'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];
								$owner=$_POST['owner'];
                                mysql_query("insert into image (image_id,location)
values ('$owner','$location')
") or die(mysql_error());



	 $query=mysql_query("select * from image, updated_news where image.image_id='$owner' and updated_news.keywords='$owner'")or die(mysql_error());
	 while($row=mysql_fetch_array($query)){

	 echo ''<BR/>';
	 ?>
        <img src="<?php echo $row['location']; ?>" width="100" height="100" alt="" class="img-rounded">
        <?php
	}

    echo '<meta content="4;home.php?action=upload" http-equiv="refresh" />';
                            }
}else if($action=='search'){//------------------------------------------------------------

 $search=$_POST['search'];

$do=mysql_query("SELECT * from updated_news , image where image.image_id='$search' AND updated_news.keywords='$search'")or die(mysql_error());
$array=mysql_fetch_array($do);
$count=mysql_num_rows($do);
if($count >0){


?>
        <table style="border: 5px double #ff0010; background:url(images/powder.jpg);background-size:cover; padding:25px; color:black">
          <tr>
            <td scope="col" colspan="3" align="center">ALL FOR ONE AND ONE FOR ALL!</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            
            
            <td rowspan="5"><img src="<?php echo $array['location']; ?>" width="200" height="200"  id="images"/></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $array['updated_news'];?></td>
          </tr>

          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>

        </table>
        <?php
}

}
?>
      <div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
<div id="school_footer">
          <div align=center> Copyright &copy; 2017  Designed by ROSHNI team.</div>

  </div>
  <!-- END of school_footer -->
</div>
<!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</div>
</div>
</body>
</html>
