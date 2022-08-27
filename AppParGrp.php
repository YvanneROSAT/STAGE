<?php
require('HeaderFooter/header.php');
?>

<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("tbl");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>



<div class="row">
  <div class="col p-4">
    <?php
    include 'database/connectDbb.php';
    $codeG = $_GET['x'];
    $liste = AppParGrp($codeG);
    $nomG = $_GET['y'];
    echo "<h2 class='text-center'>$nomG</h2>";
    echo "<br>";
    echo "<table class='table mx-auto w-75' id='tbl'>";
    echo "<tr>";
    echo "<th onclick='sortTable(0)' scope='col'>num</th>";
    echo "<th onclick='sortTable(1)' scope='col'>codeApp</th>";
    echo "<th onclick='sortTable(2)' scope='col'>nameApp</th>";
    echo "<th onclick='sortTable(3)' scope='col'>prenomApp</th>";
    echo "<th onclick='sortTable(4)' scope='col'>Email</th>";
    // echo "<th onclick='sortTable(3)' scope='col'>CodeGroupe</th>";
    echo "<th onclick='sortTable(5)' scope='col'>nomGroupe</th>";
    echo "</tr>";
    $i = 1;
    foreach ($liste as $unApprenant) {

      echo "<tr>";
      echo "<td>" . $i . "</td>";
      echo "<td>" . $unApprenant['codeApp'] . "</td>";
      echo "<td>" . $unApprenant['nameApp'] . "</td>";
      echo "<td>" . $unApprenant['prenomApp'] . "</td>";
      echo "<td>" . $unApprenant['email'] . "</td>";

      //echo "<td>".$unApprenant['CodeGroupe']."</td>";
      echo "<td>" . $unApprenant['nomGroupe'] . "</td>";


      echo "</tr>";
      $i++;
    }
    echo "</table>"
    ?>

  </div>
  <div>
  </div>
  </body>

  </html>