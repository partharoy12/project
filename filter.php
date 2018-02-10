<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "hello");  
      $output = '';  
      $query = "  
           SELECT * FROM overallnews  
           WHERE data_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                 <tr>  
                               <th width="10%">DATE</th>
                               <th width="30%">PLACE</th>  
                               <th width="43%">NEWS</th>  
                                 
                               
                          </tr> 
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                     <td>'. $row["data_date"] .'</td>
                          <td>'. $row["place"] .'</td>  
                          <td>'. $row["news"] .'</td>  
                            
                           
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>