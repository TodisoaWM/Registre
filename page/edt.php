<?php
include('config.php');
include('src/function.php');
$date = date("Y-m-d");
var_dump($date);
if (isset($_POST['valider'])) {
     $h = $_POST['heure'];
     $l = $_POST['lundi'];
     $m = $_POST['mardi'];
     $me = $_POST['mercredi'];
     $j = $_POST['jeudi'];
     $v = $_POST['vendredi'];
     $d = strtotime($date);
     creatEDT($h, $l, $m, $me, $j, $v);
}





?>
<form action="" method="POST">
     <input type="search" name="rech" placeholder="date de l'EDT">
     <input type="submit" name="recherche" value="recherhce">
</form>
<form action="" method="POST">


     <table>
          <tr>
               <th>heure</th>
               <th>Lundi</th>
               <th>Mardi</th>
               <th>Mercredi</th>
               <th>Jeudi</th>
               <th>Vendredi</th>
               <th>Date</th>
          </tr>
          <tr>
               <td><input type="text" name="heure" placeholder="8h - 10h"></td>
               <td><input type="text" name="lundi"></td>
               <td><input type="text" name="mardi"></td>
               <td><input type="text" name="mercredi"></td>
               <td><input type="text" name="jeudi"></td>
               <td><input type="text" name="vendredi"></td>
          </tr>
          <!-- <tr>
               <td><input type="text" name="heure" value="10h - 12h"></td>
               <td><input type="text" name="matier"></td>
          </tr>
          <tr>
               <td><input type="text" name="heure" value="13h - 15h"></td>
               <td><input type="text" name="matier"></td>
          </tr>
          <tr>
               <td><input type="text" name="heure" value="15h - 17h"></td>
               <td><input type="text" name="matier"></td>
          </tr> -->
     </table>
     <input type="submit" name="valider" value="valider">
</form>

<table>
     <tr>
          <th>heure</th>
          <th>Lundi</th>
          <th>Mardi</th>
          <th>Mercredi</th>
          <th>Jeudi</th>
          <th>Vendredi</th>
          <th>modif</th>
     </tr>
     <?php
     if (isset($_POST['recherche'])) {
          $rech = htmlspecialchars($_POST['rech']);
          $sow = rechercheEdt($rech);
          foreach ($sow as $key => $result) {
     ?>
               <tr>
                    <td><?= $result[1]; ?></td>
                    <td><?= $result[2]; ?></td>
                    <td><?= $result[3]; ?></td>
                    <td><?= $result[4]; ?></td>
                    <td><?= $result[5]; ?></td>
                    <td><?= $result[6]; ?></td>
                    <td><a href="index.php?page=modif&id=<?= $value[0]; ?>">modif</a></td>
               </tr>

               <?php
          }
     } else {
          $edt = afficheEDT();
          foreach ($edt as $key => $value) {
               if ($value[7] === $value[7]) {
               ?>
                    <tr>
                         <td><?= $value[1]; ?></td>
                         <td><?= $value[2]; ?></td>
                         <td><?= $value[3]; ?></td>
                         <td><?= $value[4]; ?></td>
                         <td><?= $value[5]; ?></td>
                         <td><?= $value[6]; ?></td>
                         <td><a href="index.php?page=modif&id=<?= $value[0]; ?>">modif</a></td>
                    </tr>

     <?php
               }
          }
     }
     ?>
</table>

<?php

?>