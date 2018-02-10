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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="improve/graph/js/awesomechart.js"></script>
<script type="text/javascript" src="improve/graph/js/jquery.js"></script>

<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
          
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
            
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
          <li><a href="?action=home" >HOME</a></li>
          <li><a href="#">RECENT NEWS</a>
            <ul>
              <li><a href='?action=update_news'> CURRENT NEWS</a></li>
               <li><a href='?action=Current_news'> UPDATE NEWS</a></li>
               <li><a href='?action=cracks'> UPDATE DOCS</a></li>

            </ul>
          </li>
          <li><a href="#">VIEW RECORDS</a>
            <ul>

              <li><a href='?action=onbursary'>NO. OF VICTIMS </a></li>
              <li><a href='?action=partha'> VIEW REPORT</a></li>

            </ul>
          </li>
          <li><a href="#">NGO</a>
            <ul>
              <li><a href='?action=viewclubs'>AVAILABLE NGO's</a></li>

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
    <!-- END of school_menubar -->
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
					$action=$_REQUEST['action'];
					if ($action=='home'){
					?>

       <div style="margin-left: 100px"id="slider-wrapper">
          <div id="slider" class="nivoSlider"> <img src="images/slider/1.jpg" alt="image" /> <a href="#"><img src="images/slider/2.jpg" /></a> <img src="images/slider/3.jpg" /> <img src="images/slider/4.jpg" /> <img src="images/slider/5.jpg"/> <img src="images/slider/6.jpg"  /> <img src="images/slider/bg7.jpg" /> </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
						$(window).load(function() {
							$('#slider').nivoSlider();
						});
						</script>
        <p>&nbsp;</p>
        <h1> ROSHNI</h1>
      </div>
      <div class="product_box">
      	
       <?php
			}else if($action=='registered1'){//------------------------------------------------------------------------------------------------
			$ids =$_POST['id'];
			$fnames =$_POST['fnames'];
			
			$qual=$_POST['quality'];
			$salary=$_POST['salary'];
			
			$ins= mysql_query("INSERT INTO  teacher VALUES ('','$fnames','$qual','Active')");
			
			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=Current_news" http-equiv="refresh" />';
			
			}else 
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';
			?>      
       
        
<?php
			  }
			
			else if($action=='update_news'){//-----------------------------------------------------------------------------------------
			?>
<style type="text/css">
			
			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
  <?php
			$sel=mysql_query("SELECT * FROM teacher");
			echo '<table style="width:100%;">';
			echo '<th>NEWS_TYPE</th><th>NEWS</th><th colspan=2>ACTION</th>';
			$rowcolor=0;
			
			$intt=mysql_num_rows($sel);
			
			while($fetch=mysql_fetch_array($sel)){
			
			
			echo '<tr><td>'.$fetch['1'].'</td><td align="middle">'.$fetch['QUALITY'].'</td><td><a href=modifytr.php?id='.$fetch['TEACH_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=deletetr.php?id='.$fetch['TEACH_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';
			 
			}
			echo '</table>';
			?>

			

        <?php
			}else if($action=='Current_news'){//------------------------------------------------------------------------------------
			?>
			 <p style="font-size: 20px">INFORMATION PORTAL </p>
        <p>&nbsp;</p>
        <form action="?action=registered1" method="post" name="myform">
          <table  border="0" cellspacing="14" cellpadding="10"  id='mytable'summary="registering student">
            <tr>
              <td  style="font-size: 20px ">NEWS TYPE:</td>
              <td >&nbsp;</td>
              <td ><input type="text" name="fnames" size="30" id='in'title="enter you first name here" required></td>
            </tr>
            
            <tr>
              <td style="font-size: 20px">NEWS:</td>
              <td>&nbsp;</td>
              <td><input type="text" name="quality" size="60" id='in'title="" required/></td>
            </tr>
            
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="submit" name="send" id='send'value="SEND DATA" />
                <input type='reset' id='clear'name="clear" value="CANCEL"  /></td>
            </tr>
          </table>
        </form>
        
        <link rel="stylesheet" href="style.css" type="text/css" />

        <?php
			}else if($action=='registered1'){//------------------------------------------------------------------------------------------------
			$update_news =$_POST['update_news'];
			$ins= mysql_query("INSERT INTO  update_news VALUES ('$update_news')");

			if($ins){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=update_news" http-equiv="refresh" />';

			}else
			echo 'failed to insert data';
			echo mysql_error();
			//echo '<meta content="2;register1.php" http-equiv="refresh" />';

			?>
        
        <?php
			}else if($action=='cracks'){//------------------------------------------------------------------------------------
			?>
 <div id="header">

</div>
<div id="body">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">UPLOAD</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>FILE UPLOADED SUCCESSFULLY ! <a href="view.php">CLICK HERE TO VIEW THE FILE</a></label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>PROBLEM WHILE FILE UPLOADING !</label>
        <?php
	}
	else
	{
		?>
        <label>TRY TO UPLOAD ANY FILES(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
	}
	?>
</div>



 <?php
			}else if($action=='recordstudent'){//------------------------------------------------------------------------------------
			?>
    <style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
    
    <?php
			$keyword=$_POST['keyword'];
			$age_of_victim=$_POST['age_of_victim'];


			$sel=mysql_query("SELECT * FROM student "); // age of victims
			echo '<table style="width:100%;">';
			echo '<th>KEYWORD</th><th></th><th>AGE OF VICTIM</th>';
			$intt=mysql_num_rows($sel);
			while($fetch=mysql_fetch_array($sel)){


			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td><td>'.$fetch['CLASS'].'</td><td>'.$fetch['STATUS'].'<td><a href=modifyst.php?id='.$fetch['STUDENT_ID'].'></a></td><td><a href=deletest.php?id='.$fetch['STUDENT_ID'].'></a></td></tr>';

			}
			echo '</table>';
			?>

  <?php

			}else if($action=='recordupdate_news'){//------------------------------------------------------------------------------------
			?>
  <style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
  <?php
			$sel=mysql_query("SELECT * FROM update_news"); //no of victims
			echo '<table style="width:100%;">';
			echo '<th>PLACES</th><th>NO. OF VICTIMS</th><th colspan=2>ACTION</th>';
			$rowcolor=0;

			$intt=mysql_num_rows($sel);

			while($fetch=mysql_fetch_array($sel)){


			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td align="middle">'.$fetch['QUALITY'].'</td><td>'.$fetch['STATUS'].'</td><td><a href=modifytr.php?id='.$fetch['TEACH_ID'].'><img src="images/edit-icon.png" width=30 height=30 title=MODIFY_RECORD /></a></td><td><a href=deletetr.php?id='.$fetch['TEACH_ID'].'><img src="images/deletee.png" width="30" height="30" title=DELETE_RECORD /></a></td></tr>';

			}
			echo '</table>';
			?>
	
<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>


<?php
			if(isset($_POST['sen'])){
			echo 'ok';
			$id=$_POST['id'];
			$place=$_POST['place'];
			$no_of_victims= $_POST['no. of victims'];
			$getst=mysql_query("select *from student where keyword='$keyword' ");
			$fe=mysql_fetch_array($getst);



			$goburs=mysql_query("insert into bursarystudent values('','$id','$place','$no_of_victims')");

			if($goburs){
			echo '<img src="images/492.png" /> &nbsp;! data inserted successfully';
			 echo '<meta content="2;home.php?action=onbursary" http-equiv="refresh" />';

			}
			}

			}else if($action=='onbursary'){

			?>
<style type="text/css">
			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			$sel=mysql_query("SELECT * FROM bursarystudent");
			echo '<table style="width:100%">';
			echo '<th align=left>PLACE</th><th align=left>NO OF VICTIMS</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td><a href=deletebursary.php?id='.$fetch['ID'].'></a></td></tr>';


			}
			echo '</table>';
			?>
       
        <?php

			}else if($action=='partha'){//----------------------------------------------------------------------========
			?>
			<style type="text/css">
			
			th{border-bottom:1px solid #333333;border-left:1px solid #333333;border-top:1px solid #666666; padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
			 <?php  
 $connect = mysqli_connect("localhost", "root", "", "hello");  
 $query = "SELECT * FROM overallnews ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>
<body>  
           <br /><br />  
           <div class="container" style="width:720px;">  
                
                <h3 align="center"> NEWS EXTRACTION</h3><br /> 
                <form action="filter.php" method="get"> 
                <tr>
                    <td><input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" /></td>
                
                 
                    <td><input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" /></td>  
                  
                  
                    <td><input type="button" name="filter" id="filter" value="FILTER" class="btn btn-info" />
                  	<button type="reset" value="Reset">RESET</button></td>
                </tr>
                <div style="clear:both"></div>                 
                <br />  
                <div id="data_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">DATE</th>
                               <th width="10%">PLACE</th>  
                               <th width="43%">NEWS</th>  
                                 
                               
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                          		<td><?php echo $row["data_date"]; ?></td>
                               <td><?php echo $row["place"]; ?></td>  
                               <td><?php echo $row["news"]; ?></td>  
                                 
                               
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
  <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#data_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>


      
<?php
			if(isset($_POST['enter'])){
			$ngo_id=$_POST['ngo_id'];
			$name_of_the_ngo=$_POST['name_of_the_ngo'];
			$place_where_it_is_located=$_POST['place_where_it_is_located'];
			$status=$_POST['status'];
			$insert=mysql_query("insert into club values('$ngo_id','$name_of_the_ngo','$place_where_it_is_located','$status')");
			if($insert){
			echo ' member registered successfully';
			 echo '<meta content="2;home.php?action=rclubs" http-equiv="refresh" />';
			}
			}
			else if($action=='member')
			?>      
       
        
<?php
			  }
			
			else if($action=='viewclubs'){//-----------------------------------------------------------------------------------------
			?>
<style type="text/css">

			th{border-bottom:1px solid #333333;border-top:1px solid #6b6921 padding-bottom:12px;}
			td{ border-bottom:1px solid #3F3F3F ;}
			</style>
<?php
			$sel=mysql_query("select *from club ");
			echo '<table style="width:100%">';
			echo '<th>NAME OF THE NGO</th>';
			$flag = 0;
			while($fetch=mysql_fetch_array($sel)){




			echo '<tr><td>'.$fetch['0'].'</td><td>'.$fetch['1'].'</td><td>'.$fetch['3'].'</td><td>'.$fetch['4'].'</td><td>'.$fetch['5'].'</td><td>'.$fetch['6'].'</td></tr</tr>';


			}
			echo '</table>';
			}else if($action==''){//-----------------------------------------------------------------------------------------

			?>

<style type="text/css">

			th{border-bottom:1px solid #333333;border-left:1px solid #333333;}
			td{ border-bottom:1px solid #3F3F3F ;border-left:1px solid #333333;}
			</style>
<?php
			
			echo '</table>';

			}else  if($action=='search'){//------------------------------------------------------------

			 $search=$_POST['search'];


			$query=mysql_query("SELECT * from updated_news , image where image.image_id='$search' AND updated_news.keywords='$search'")or die(mysql_error());
			$array=mysql_fetch_array($query);
			$count=mysql_num_rows($query);
			if($count < 1){
			echo 'some little problem ';


			}else {

			?>
<table style="border: 5px double black; background:url(images/powder.jpg);background-size:cover; padding:25px; color:GreenYellow ">
  <tr>
    <td scope="col" colspan="3" align="center">NEWS BASED ON KEYWORDS</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="175" height="34">KEYWORDS</td>
    <td width="251"><?php echo $array['keywords'];?> </td>
    <td rowspan="5"><img src="<?php echo 'improve/'.$array['location']; ?>" width="200" height="200"  id="images"/></td>
  </tr>
  <tr>
    <td width="175" height="34">NEWS</td>
    <td width="251"> <?php echo $array['updated_news'];?></td>

  </tr>
  
 
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
</table>
<?php
			}

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
