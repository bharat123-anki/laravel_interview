<!DOCTYPE html>
<html>

<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
  <h3>Chess Board Design</h3>
  <table width="270px" border="1px">
    <?php
    for ($i = 1; $i <= 8; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= 8; $j++) {
        $total = $i + $j;
        if ($total % 2 == 0) {
          echo "<td height=30px width=30px bgcolor='white'></td>";
        } else {
          echo "<td height=30px width=30px bgcolor='black'></td>";
        }
      }
      // echo "<br>";
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>