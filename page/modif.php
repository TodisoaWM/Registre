<?php
include('src/function.php');
$id = $_GET['id'];
if (isset($_POST["modifier"])) {
     $h = $_POST['heure'];
     $l = $_POST['lundi'];
     $m = $_POST['mardi'];
     $me = $_POST['mercredi'];
     $j = $_POST['jeudi'];
     $v = $_POST['vendredi'];
     modif($h, $l, $m, $me, $j, $v, $id);
}


$aff = afficheM($id);
?>
<form method="POST">
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
          foreach ($aff as $key => $value) {
          ?>
               <tr>
                    <td><input type="text" name="heure" value="<?= $value[1]; ?>"></td>
                    <td><input type="text" name="lundi" value="<?= $value[2]; ?>"></td>
                    <td><input type="text" name="mardi" value="<?= $value[3]; ?>"></td>
                    <td><input type="text" name="mercredi" value="<?= $value[4]; ?>"></td>
                    <td><input type="text" name="jeudi" value="<?= $value[5]; ?>"></td>
                    <td><input type="text" name="vendredi" value="<?= $value[6]; ?>"></td>
                    <td><input type="submit" name="modifier" value="modifier"></td>
               </tr>

          <?php
          }
          ?>
     </table>

</form>
<?php
?>