<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if(isset($_POST['submit']))
    {
      $file_name=$_FILES['image']['name'];
      $file_type=$_FILES['image']['type'];
      $file_size=$_FILES['image']['size'];
      $file_tem_loc=$_FILES['image']['tmp_name'];
      $file_store="../../admin/upload/".$file_name;
       if (move_uploaded_file($file_tem_loc, $file_store)){

          echo "File Uploaded Successfully";
      }



        $sql = "INSERT INTO candidate1 (ppd, no, flow, unit, name, icno, position, others, actgred, gred, workplace, postcode, retiredate, address, currentdate1, currentdate2, modeofchange,newplace, distancecurrent, distancenew,total, positionhist,positionhist2,positionhist3,placehist,placehist2,placehist3,startdate1,startdate2,startdate3,enddate1,enddate2,enddate3, justification, notes, takefrom, positionof, othersnewpost, image)
            VALUES ('".$_POST['ppd']."','".$_POST['no']."','".$_POST['flow']."','".$_POST['unit']."','".$_POST['name']."', '".$_POST['icno']."', '".$_POST['position']."','".$_POST['others']."','".$_POST['actgred']."','".$_POST['gred']."','".$_POST['workplace']."','".$_POST['postcode']."','".$_POST['retiredate']."','".$_POST['address']."','".$_POST['currentdate1']."','".$_POST['currentdate2']."',
            '".$_POST['modeofchange']."','".$_POST['newplace']."','".$_POST['distancecurrent']."','".$_POST['distancenew']."','".$_POST['total']."','".$_POST['positionhist']."','".$_POST['positionhist2']."','".$_POST['positionhist3']."','".$_POST['placehist']."','".$_POST['placehist2']."','".$_POST['placehist3']."','".$_POST['startdate1']."','".$_POST['startdate2']."','".$_POST['startdate3']."','".$_POST['enddate1']."','".$_POST['enddate2']."','".$_POST['enddate3']."','".$_POST['justification']."','".$_POST['notes']."','".$_POST['takefrom']."','".$_POST['positionof']."','".$_POST['othersnewpost']."', '".$file_name."' )";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Rekod baharu berjaya dibuat";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../candidates1.php");
    }
    if(isset($_POST['update']))

    {
      if($_FILES['image']['name']!='')
       {
      $file_name=$_FILES['image']['name'];
      $file_type=$_FILES['image']['type'];
      $file_size=$_FILES['image']['size'];
      $file_tem_loc=$_FILES['image']['tmp_name'];
      $file_store="../../admin/upload/".$file_name;


      if (move_uploaded_file($file_tem_loc, $file_store)){

          echo "File Uploaded Successfully";
      }
    }

     else
    {
      $file_name=$_POST['old_img'];
     }

      $folder="../../admin/upload/";

      if(is_dir($folder))
       {
        if($open=opendir($folder))

         while(($image=readdir($open)) !=false)
        {
          if($image=='.'|| $image=="..") continue;

          echo '<img src="../../admin/upload/'.$image.'" width="150" height="150">';

        }

            closedir($open);
       }
        $sql = "UPDATE candidate1 SET ppd='".$_POST['ppd']."',
        no='".$_POST['no']."',
flow='".$_POST['flow']."',
  unit='".$_POST['unit']."',
        name='".$_POST['name']."',
    icno='".$_POST['icno']."',
    position='".$_POST['position']."',
    others='".$_POST['others']."',
    actgred='".$_POST['actgred']."',
    gred='".$_POST['gred']."',
    workplace='".$_POST['workplace']."',
    retiredate='".$_POST['retiredate']."',
    address='".$_POST['address']."',
    currentdate1='".$_POST['currentdate1']."',
    currentdate2='".$_POST['currentdate2']."',
    modeofchange='".$_POST['modeofchange']."',
    newplace='".$_POST['newplace']."',
    distancecurrent='".$_POST['distancecurrent']."',
    distancenew='".$_POST['distancenew']."',
    total='".$_POST['total']."',
    positionhist='".$_POST['positionhist']."',
    positionhist2='".$_POST['positionhist2']."',
    positionhist3='".$_POST['positionhist3']."',
    placehist='".$_POST['placehist']."',
    placehist2='".$_POST['placehist2']."',
    placehist3='".$_POST['placehist3']."',
    startdate1='".$_POST['startdate1']."',
    startdate2='".$_POST['startdate2']."',
    startdate3='".$_POST['startdate3']."',
    enddate1='".$_POST['enddate1']."',
    enddate2='".$_POST['enddate2']."',
    enddate3='".$_POST['enddate3']."',
    justification='".$_POST['justification']."',
      notes='".$_POST['notes']."',
    takefrom='".$_POST['takefrom']."',
    positionof='".$_POST['positionof']."',
    othersnewpost='".$_POST['othersnewpost']."',

    image='".$file_name."',

    ref1='".$_POST['ref1']."',
    letterdate1='".$_POST['letterdate1']."',
    postcode='".$_POST['postcode']."',

    startdate='".$_POST['startdate']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['success'] = "Rekod berjaya dikemas kini";
        header("location:../candidates1.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM candidate1 WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $_SESSION['success']=' Rekod berjaya dipadamkan';
        header("location:../candidates1.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




$conn = null;
?>
