<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require_once './dbh.inc.php';
        
        $query = mysqli_query($conn, "SELECT * FROM att");
        $rowCount = mysqli_num_rows($query);
        ?>
        
        <form action="update.php" method="POST">
          <label>Sr. No.</label>
          <label>Subject</label>
          <label>% Attendance</label>
          <label>""</label><br>

        <?php
          for($i=0;$i<$rowCount;$i++){
            $row = mysqli_fetch_assoc($query);
            $sub = $row["aSub"];
            $attper = ($row["aPre"] / $row["aTotal"])*100;
            ?>
              <label><?php echo $i+1;?></label>
              <label><?php echo $row["aSub"]?></label>
              <label><?php echo $attper;?></label>
              <input type = "radio" id="day" name="day" value="1" onchange="<?php echo $val=1;?>" >Present
              <input type = "radio" id= "day" name="day" value="0" oncchange="<?php echo $val=0;?>">Absent
              <a href="<?php echo "./update.php?sub=$sub&val='<script>update();</script>';"?>" class="buy" >update</a>
              <br>
            <?php 
          }
          ?>
        </table>
        <a href="./addSub.php" class="buy">Add subject</a>
    </div>
    <a class="left" href="../index.html"><i class="fa fa-arrow-left back" aria-hidden="true"><br>Back</i></a>
</body>
<script>
function update(){
  $value = Document.getElementById("day").value;
  return $value;
}
</script>

</html>