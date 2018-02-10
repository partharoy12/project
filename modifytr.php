<?php
      error_reporting("E_NOTICE");
      ?>
<?php
      ////include('header.php');
      include('connection.php');
      session_start();

      if (!isset($_SESSION['user_id'])){
      header('location:index.php');
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
      echo '<img src="images/5.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>
  <a href="logout.php" class="logout">Logout</a></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="icon" type="image/ico" href="images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="school.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="improve/graph/js/awesomechart.js"></script>
<script type="text/javascript" src="improve/graph/js/jquery.js"></script>

<script type="text/javascript" src="js/ddsmoothmenu.js">

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

      <div id="header_right">  </div>
      <div class="cleaner"></div>
    </div>
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >Home</a></li>
          <li><a href="#">Recent News</a>
            <ul>
              <li><a href='?action=update_news'> Current News</a></li>
               <li><a href='?action=Current_news'> Update news</a></li>
               <li><a href='?action=cracks'> Update docs</a></li>

            </ul>
          </li>
          <li><a href="#">View records</a>
            <ul>

              <li><a href='?action=onbursary'>No. of Victims </a></li>
              <li><a href='?action=partha'> View Reports </a></li>


            </ul>
          </li>
          <li><a href="#">NGO</a>
            <ul>
              <li><a href='?action=viewclubs'>available NGO's</a></li>

            </ul>
          </li>

        </ul>
      </div>
      <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keywords" title="keyword_id"   class="txt_field" required >
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
          <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="keyword_id" class="sub_btn"  />
        </form>
      </div>
    </div>
         <div id="school_main">
      <div id="sidebar" class="float_r">
        <div class="sidebar_box">
          <h3>KEYWORDS </h3>
          <div class="content">
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">
            <?php
              $student=mysql_query("select *from student");
              $gets=mysql_fetch_array($student);
              $count2=mysql_num_rows($student);
              $num=1;
              echo '<font color=yellow> '.$num. ' </font>&raquo;  ' .$gets['keyword'].'<br/>';
              $num=2;
              while($gets=mysql_fetch_array($student)){

              echo '<font color=yellow> '.$num. '</font>&raquo;  ' .$gets['keyword'].'<br/>';
              $num++;
              }
              ?>
            </MARQUEE>
            <br/>
          </div>
          <h3>RECENT NEWS</h3>
          <div class="content">
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">
            <?php 
              $student=mysql_query("select *from student");
              $gets=mysql_fetch_array($student);
              $count2=mysql_num_rows($student);
              $num=1;
              echo '<font color=red> '.$num. ' </font>&raquo;  ' .$gets['status_update'].'<br/>';
              $num=2;
              while($gets=mysql_fetch_array($student)){
      
              echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['status_update'].'<br/>';
              $num++;
              }
              ?>
            </MARQUEE>
          </div>
        </div>
      </div>
      <div id="content" class="float_l"> <br/>
        </br>
        <?php 
 $id=$_REQUEST['id'];
$sel=mysql_query("SELECT * FROM teacher WHERE TEACH_ID='$id'");

$fetch=mysql_fetch_array($sel);


?>
        <form  method="post" name="myform">
          <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
            <tr>
              <td  height="24">NEWS TYPE</td>
              <td >&nbsp;</td>
              <td ><input type="hidden" name="id" value="<?php echo $fetch[0] ?>"  />
                <input type="text" name="fname" size="30" id='in'value="<?php echo $fetch[1] ?>"</td>
            </tr>
            
            
            <tr>
              <td>NEWS</td>
              <td>&nbsp;</td>
              <td><input type="text" name="quality" size="30" id='in' value="<?php echo $fetch[2] ?>"</td>
            </tr>
            
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="submit" name="send" id='send'value="modify" />
                <input type='reset' id='clear'name="clear" value="cancel"  /></td>
            </tr>
          </table>
        </form>
        <?php
          if (isset($_POST['send'])){ 
$id=$_REQUEST['id'];
$fname =$_REQUEST['fname'];
$ua=$_REQUEST['quality'];

$insert= mysql_query("UPDATE teacher SET NAMES='$fname',  QUALITY='$ua' ,STATUS='$status' WHERE TEACH_ID='$id'") or die(mysql_query());

if($insert){
echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
 echo '<meta content="2;home.php?action=update_news" http-equiv="refresh" />';

}else 
echo 'failed to insert data';
echo mysql_error();
//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';
}else  if($action=='search'){//------------------------------------------------------------
      
 $search=$_POST['search'];
 
 
$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

?>
<?php

}?>
 <div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
<div id="school_footer">
        <div align=left> Copyright &copy; 2017 . Designed by Roshni Team</div>

</div>
<!-- END of school_footer -->
</div>
<!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</body>
</html>
