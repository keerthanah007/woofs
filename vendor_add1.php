<?php 
    include 'admin_header.php';

    if(isset($_POST['submit'])){
        extract($_POST);
//      if(!empty($_POST['breed'])){
// // Loop to store and display values of individual checked checkbox.
//      foreach($_POST['breed'] as $selected){
//          echo $selected."</br>";

        $qv="INSERT INTO tbl_vendor VALUES (null,'0','$v_name','$v_phno','$v_place','1','$breed_name')";
         $id=insert($qv);
          // $qvb="INSERT INTO tbl_vendor_breed VALUES (null,'$id','$breed_name')";
          // insert($qvb);
         }

//}
         if(isset($_GET['id']))
{
    extract($_GET);
    echo $q="update tbl_vendor set v_status='0' where vendor_id='$id'";
    update($q);
    // return redirect('staff_view.php');
}

if(isset($_GET['uid']))
{
    extract($_GET);
    echo $q="update tbl_vendor set v_status='1' where vendor_id='$uid'";
    update($q);
    // return redirect('staff_view.php');
}

if (isset($_GET['upid'])) {
    extract($_GET);

    $q2="select * from tbl_vendor where vendor_id='$upid'";
    $res=select($q2);
}
if (isset($_POST['update'])) {
    extract($_POST);

    $q="update tbl_vendor set v_name='$v_name',v_phno='$v_phno',v_place='$v_place',breed_id='$breed_name' where vendor_id='$upid'";
    update($q);
}

  

//}
 ?>




    <div class="contact">
        <div class="container">
            <h3 class="agileits-title">Add Vendor Details</h3>
            <div class="contact-agileinfo">
                <div class="col-md-7 contact-right">
                    
<form method="post">
    <?php if (isset($_GET['upid'])) { ?>
<table border=1  class="table" style="width: 600px">
<tr>
    <th>Name</th>
    <td><input type="text" name="v_name" value="<?php echo $res[0]['v_name'] ?>"></td>
</tr>
<tr>
    <th>Phone Number</th>
    <td><input type="number" min="0" name="v_phno" value="<?php echo $res[0]['v_phno'] ?>"></td> 
</tr>
<tr>
    <th>Place</th>
    <td>
    <select name="v_place" value="<?php echo $res[0]['v_place'] ?>">
                    <option value="Kasargod">Kasargod
                    </option>
                    <option value="Kannur">Kannur
                    </option>
                    <option value="Wayanad">Wayanad
                    </option>
                    <option value="Kozhikode">Kozhikode
                    </option>
                    <option value="Malappuram">Malappuram</option>
                    <option value="Palakkad">Palakkad
                    </option>
                    <option value="Thrissur">Thrissur
                    </option>
                    <option value="Ernakulam">Ernakulam
                    </option>
                    <option value="Idukki">Idukki
                    </option>
                    <option value="Kottayam">Kottayam
                    </option>
                    <option value="Alappuzha">Alappuzha</option>
                    <option value="Pathanamthitta">Pathanamthitta</option>
                    <option value="Kollam">Kollam
                    </option>
                    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
    </select>
    </td>
</tr>
<tr>
    <th>Breeds Supplied</th>
    <!-- <td><input type="checkbox" id="b1" name="breed[]" value="Bulldog">Bulldog
    <input type="checkbox" id="b2" name="breed[]" value="Labrador Retriever">Labrador Retriever
<input type="checkbox" id="b3" name="breed[]" value="German Shepherd">German Shepherd
<input type="checkbox" id="b4" name="breed" value="Golden Retriever">Golden Retriever
<input type="checkbox" id="b5" name="breed" value="Beagle">Beagle
<input type="checkbox" id="b6" name="breed" value="Yorkshire Terrier">Yorkshire Terrier
<input type="checkbox" id="b7" name="breed" value="Boxer">Boxer
<input type="checkbox" id="b8" name="breed" value="Poodle">Poodle
<input type="checkbox" id="b9" name="breed" value="Rottweiler">Rottweiler
<input type="checkbox" id="b10" name="breed" value="Dachshunds">Dachshunds
<input type="checkbox" id="b11" name="breed" value="Great Dane">Great Dane
    <input type="checkbox" id="b12" name="breed" value="Pug">Pug
<input type="checkbox" id="b13" name="breed" value="Cocker Spaniel">Cocker Spaniel
<input type="checkbox" id="b14" name="breed" value="Pomeranian">Pomeranian
<input type="checkbox" id="b15" name="breed" value="Dalmatian">Dalmatian
<input type="checkbox" id="b16" name="breed" value="Indian Spitz">Indian Spitz
<input type="checkbox" id="b17" name="breed" value="Gull Terrier">Gull Terrier
<input type="checkbox" id="b18" name="breed" value="Gull Dong">Gull Dong
<input type="checkbox" id="b19" name="breed" value="Kumaon Mastiff">Kumaon Mastiff
<input type="checkbox" id="b20" name="breed[]" value="Sinhala Hound">Sinhala Hound
</td> -->


 <td><select name="breed_name" value="<?php echo $res[0]['breed_name'] ?>">
        <?php
        $q="SELECT * FROM `tbl_breed`";
        $res=select($q);
        foreach ($res as $row) {?>
            
<option value="<?php echo $row['breed_id'] ?>"><?php echo $row['breed_name'] ?></option>

            <?php
        }
        ?>
    </select>
    </td></tr>
    
<tr>
    <td colspan="2"><input type="submit" value="Submit" name="update" align="center">
    </td>
    </tr>
</table>
<?php }else{?>

    <table border=1  class="table" style="width: 600px">
<tr>
    <th>Name</th>
    <td><input type="text" name="v_name"></td>
</tr>
<tr>
    <th>Phone Number</th>
    <td><input type="number" min="0" name="v_phno"></td> 
</tr>
<tr>
    <th>Place</th>
    <td>
    <select name="v_place">
                    <option value="Kasargod">Kasargod
                    </option>
                    <option value="Kannur">Kannur
                    </option>
                    <option value="Wayanad">Wayanad
                    </option>
                    <option value="Kozhikode">Kozhikode
                    </option>
                    <option value="Malappuram">Malappuram</option>
                    <option value="Palakkad">Palakkad
                    </option>
                    <option value="Thrissur">Thrissur
                    </option>
                    <option value="Ernakulam">Ernakulam
                    </option>
                    <option value="Idukki">Idukki
                    </option>
                    <option value="Kottayam">Kottayam
                    </option>
                    <option value="Alappuzha">Alappuzha</option>
                    <option value="Pathanamthitta">Pathanamthitta</option>
                    <option value="Kollam">Kollam
                    </option>
                    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
    </select>
    </td>
</tr>
<tr>
    <th>Breeds Supplied</th>



 <td><select name="breed_name">
        <?php
        $q="SELECT * FROM `tbl_breed`";
        $res=select($q);
        foreach ($res as $row) {?>
            
<option value="<?php echo $row['breed_id'] ?>"><?php echo $row['breed_name'] ?></option>

            <?php
        }
        ?>
    </select>
    </td></tr>
    
<tr>
    <td colspan="2"><input type="submit" value="Submit" name="submit" align="center">
        <input type="reset" value="Reset" name="reset" align="center">
    </td>
    </tr>
</table>
<?php } ?>
    
    <h3 class="agileits-title">Update Vendor Details</h3>

<table border=1  class="table" style="width: 600px">
<tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Place</th>
    <th>Breed</th>
    <th>Status</th>
                <th>Action</th>
</tr>
<?php
$q="SELECT * FROM tbl_vendor";
$res=select($q);
foreach ($res as $key ) 
    {
        ?>
        <tr>
    <td><?php echo $key['v_name']?></td>
    <td><?php echo $key['v_phno']?></td>
    <td><?php echo $key['v_place']?></td>
    <td><?php echo $key['breed_id']?></td>
    <td><?php echo $key['v_status']?></td>

    <?php 
                        if($key['v_status']=='1')
                            { ?>
                            <td><a href="?id=<?php echo $key['vendor_id']?>" class="btn btn-danger btn-sm">De-activate</a></td>
                    <?php   }
                    else if($key['v_status']=='0'){  ?>
                        <td><a href="?uid=<?php echo $key['vendor_id']?>" class="btn btn-success btn-sm">Activate</a></td>
                <?php    }



                     ?><td><a href="?upid=<?php echo $key['vendor_id']?>" class="btn btn-success btn-sm">Update</a></td>
    </tr>
<?php
}

?>
</table>   
    </form>
                

                </div>
                
                    
                
    <!-- //contact -->
    <!-- password-script -->
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->

    <script src="js/SmoothScroll.min.js"></script>
    <!-- start-smooth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>