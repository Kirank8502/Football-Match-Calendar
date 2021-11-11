<html>

<head>
</head>

<body>
  <?php
  $infoErr = "";
  ?>
  <form action="trytable.php" method="POST">
    <table>
      <tr>
        <td>Team Name: </td>
        <td><input type="text" name="tname"></td>
      </tr>
      <tr>
        <td>Start Date: </td>
        <td><input type="text" name="test[]"></td>
        <td>&nbsp; End Date: </td>
        <td><input type="text" name="test[]"></td>
        <td><?php echo "$infoErr"; ?></td>
      </tr>
      <tr>
        <td>Start Time: </td>
        <td><input type="text" name="test[]"></td>
        <td>&nbsp; End Time: </td>
        <td><input type="text" name="test[]"></td>
      </tr>
      <tr>
        <td>Event: </td>
        <td><input type="text" name="event"></td>
      </tr>
      <tr>
        <td>Submit</td>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $arr1 = $_POST['test'];
    // print_r($arr1);
    $var = [];
    // for ($l = 0; $l < count($arr1); $l++) {
    //   if ($arr1[$l] == null) {
    //     $infoErr = "null";
    //     break;
    //   } else {
    //     $var = $arr1;
    //     if (!preg_match("/^[0-9]*$/", $arr1[$l])) {
    //       $infoErr = "Only numbers are allowed";
    //     }
    //   }
    // }
    $arr[] = $var;
    if (empty($_POST['test'])) {
      $infoErr = "data is required";
    } else {
      $var = $_POST["test"];
      if (!preg_grep("/^[0-9]*$/", $_POST['test'])) {
        $infoErr = "Only numbers are allowed";
      }
    }
    $arr = array($var);
    //print_r($arr);
    //$ar = array(json_encode($var));
    $son1 = json_decode(file_get_contents("myfile.json"), true);
    //print_r($son1);
    //echo "<br>";

    array_push($son1, $arr[0]);
    $jsonData = json_encode($son1);
    file_put_contents('myfile.json', $jsonData);
    //$son2 = json_decode(file_get_contents("myfile.json"), true);
    //print_r($son1);

    for ($v = 0; $v < 4; $v++) {
      if ($var[$v] != null) {
        $var1 = (int)$var[0];
        $var2 = (int)$var[1];
        $var3 = (int)$var[2];
        $var4 = (int)$var[3];
      } else {
        $var1 = "null";
        $var2 = "null";
        $var3 = "null";
        $var4 = "null";
      }
    }
    // if ($son1[0] != null) {
    //   $m1 = (int)$son1[0][0];
    //   $m2 = (int)$son1[0][1];
    //   $m3 = (int)$son1[0][2];
    //   $m4 = (int)$son1[0][3];
    // }

    // if ($son1[1] != null) {
    //   $n1 = (int)$son1[1][0];
    //   $n2 = (int)$son1[1][1];
    //   $n3 = (int)$son1[1][2];
    //   $n4 = (int)$son1[1][3];
    // }
    //echo "<br>";
  }
  // $infoErr = " ";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tname = $_POST['tname'];
    // if ($var[0] == $son1[0]) {
    //   echo "Choose another date and time";
    // }
    // $var = $_POST['test'];
    $event = $_POST['event'];
    //print_r($var);
    //echo "<br>";

    // if ($son1[0] != null) {
    //   $x = abs($m2 - $m1);
    //   $y = abs($m4 - $m3);

    //   $x++;
    //   $y++;
    // }

    // $a = abs($var2 - $var1);
    // $b = abs($var4 - $var3);

    // $a++;
    // $b++;

    // if ($son1[1] != null) {
    //   $p = abs($n2 - $n1);
    //   $q = abs($n4 - $n3);

    //   $p++;
    //   $q++;
    // }

    // echo "$a", "<br>";
    // echo "$b";
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<table border='2'>";
    echo "<td>Time/Date</td>";
    for ($col = 1; $col <= 31; $col++) {
      echo "<td >$col jan &nbsp; &nbsp; &nbsp;"; //print date
      echo "</td>";
    }
    for ($row = 1; $row <= 10; $row++) {
      echo "<tr>";
      echo "<td >$row hrs &nbsp; &nbsp; &nbsp;"; //print time
      echo "</td>";
      for ($col1 = 1; $col1 <= 31; $col1++) {
        // if ($var1 == $col1 and $var3 == $row) {
        //   if (($var1 != $son1[1][0]) || ($var1 != $son1[0][0])) {
        //     echo "<td rowspan='$b' colspan='$a'>Event name is: " . $event . "<br>Team name is: " . $tname . "&nbsp; &nbsp;</td>";
        //     continue;
        //   }
        // }

        for ($r = 0; $r < count($son1); $r++) {
          if ($son1[$r] != null && $var1 != null && $var2 != null && $var3 != null && $var4 != null) {
            // print_r($son1[$r]);
            // echo " hello world ";
            // if ($r != 0) {
            // if ($son1[$r][0] != $son1[$r - 1][0] && $son1[$r][1] != $son1[$r - 1][1] && $son1[$r][2] != $son1[$r - 1][2] && $son1[$r][3] != $son1[$r - 1][3]) {
            $m1 = (int)$son1[$r][0];
            $m2 = (int)$son1[$r][1];
            $m3 = (int)$son1[$r][2];
            $m4 = (int)$son1[$r][3];

            $x = abs($m2 - $m1);
            $y = abs($m4 - $m3);

            $x++;
            $y++;
            // } else {
            // echo "input another data";
            // }
            // }
            if ($var1 != $son1[$r][0] || $son1[$r][0] != $son1[$r - 1][0]) {
              if ($son1[$r][0] == $col1 && $son1[$r][2] == $row) {
                echo "<td id='$row-$col1' rowspan='$y' colspan='$x'>Event name is: " . $event . "<br>Team name is: " . $tname . "&nbsp; &nbsp;</td>";
                continue;
              }
            }
          }
          // else {
          //   $var1 = "";
          //   $var2 = "";
          //   $var3 = "";
          //   $var4 = "";
          // }
        }



        // if ($son1[0] != null) {
        //   if (($son1[0][0] != $var1) && ($son1[0][0] != $son1[1][0])) {
        //     if ($son1[0][0] == $col1 and $son1[0][2] == $row) {
        //       echo "<td rowspan='$q' colspan='$p'>Event name is: " . $event . "<br>Team name is: " . $tname . "&nbsp; &nbsp;</td>";
        //       continue;
        //     }
        //   }
        // }

        for ($o = 0; $o < count($son1); $o++) {
          if ($col1 >= $son1[$o][0] && $col1 <= $son1[$o][1]) {
            if ($row >= $son1[$o][2] && $row <= $son1[$o][3]) {
              echo "<td hidden id='$row-$col1'>" . $col1 . $row . " </td";
              // continue;
            }
          }
        }
        // for ($o = $m1 + 1; $o <= $x; $o++) {
        //   echo "<td>hello</td>";
        // }
        // for ($o = $m3 + 1; $o <= $y; $o++) {
        //   for ($k = $m1; $k <= $m2; $k++) {
        //     echo "<td>hello</td>";
        //   }
        // }

        // if ($son1[1] != null) {
        //   if (($son1[1][0] != $var1) && ($son1[1][0] != $son1[0][0])) {
        //     if ($son1[1][0] == $col1 and $son1[1][2] == $row) {
        //       echo "<td rowspan='$q' colspan='$p'>Event name is: " . $event . "<br>Team name is: " . $tname . "&nbsp; &nbsp;</td>";
        //       continue;
        //     }
        //   }
        // }

        // //echo "\r\n".$var[0]."-".$col1."\r\n"; die;
        // if ($col1 >= $var1 && $col1 <= $var2) {
        //   if ($row >= $var3 && $row <= $var4) {
        //     // echo $col1."\r\n";
        //     continue;
        //   }
        // }


        // if ($son1[1] != null) {
        //   if ($col1 >= $son1[1][0] && $col1 <= $son1[1][1]) {
        //     if ($row >= $son1[1][2] && $row <= $son1[1][3]) {
        //       continue;
        //     }
        //   }
        // }

        echo "<td id='$row-$col1'>&nbsp; &nbsp; &nbsp;</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
</body>

</html>