<?php
include('src/function.php');
$show = afficheEtudiant();


?>
<form action="" method="POST">
     <input type="text" name="rech" placeholder="recherche">
     <input type="submit" name="reche" value="recherche">
</form>
<form action="" method="POST">
     <h2>Entrez la classe et le matricule de l'éléve</h2>
     <select name="class" id="">
          <option value="son">son</option>
          <option value="web">web</option>
          <option value="image">image</option>
     </select>
     <input type="text" name="matricule" placeholder="obligatoir">
     <input type="submit" name="recherhce" value="recherche">
</form>
<table>
     <tr>
          <th>nom</th>
          <th>prenom</th>
          <th>email</th>
          <th>MDP</th>
          <th>contact</th>
          <th>adresse</th>
          <th>matricule</th>
          <th>classe</th>
          <th>absence</th>
          <th></th>
     </tr>
     <?php
     if (isset($_POST['recherhce']) or isset($_POST['reche'])) {
          extract($_POST);
          $rech = @$_POST['rech'];
          $classe = @$_POST['class'];
          $matricule = @$_POST['matricule'];
          if (!empty($_POST['rech'])) {
               $showGlobal = rechGlobalEtudiant($rech);
               foreach ($showGlobal as $key => $show) {
     ?>
                    <tr>
                         <td><?= $show[1]; ?></td>
                         <td><?= $show[2]; ?></td>
                         <td><?= $show[3]; ?></td>
                         <td><?= $show[4]; ?></td>
                         <td><?= $show[5]; ?></td>
                         <td><?= $show[6]; ?></td>
                         <td><?= $show[7]; ?></td>
                         <td><?= $show[8]; ?></td>
                         <td><?= $show[9]; ?></td>
                         <td><?= $show[10]; ?></td>
                    </tr>
                    <?php
               }
          } elseif (!empty($classe) and !empty($matricule)) {
               $req = $db->prepare("SELECT * FROM students WHERE class = ? AND matricule = ?");
               $req->execute([$classe, $matricule]);
               $resultat = $req->fetchAll();

               if ($req->rowCount() === 0) {
                    echo "le resultat : " . $classe . " " . $matricule . " n'existe pas";
               } else {
                    foreach ($resultat as $key => $resultat) {
                    ?>
                         <tr>
                              <td><?= $resultat[1]; ?></td>
                              <td><?= $resultat[2]; ?></td>
                              <td><?= $resultat[3]; ?></td>
                              <td><?= $resultat[4]; ?></td>
                              <td><?= $resultat[5]; ?></td>
                              <td><?= $resultat[6]; ?></td>
                              <td><?= $resultat[7]; ?></td>
                              <td><?= $resultat[8]; ?></td>
                              <td><?= $resultat[9]; ?></td>
                              <td><?= $resultat[10]; ?></td>
                         </tr>
               <?php
                    }
               }
          } else {
               echo "veillez renseigner tout les champs";
          }
     } else {
          foreach ($show as $key => $result) {
               ?>
               <tr>
                    <td><?= $result[1]; ?></td>
                    <td><?= $result[2]; ?></td>
                    <td><?= $result[3]; ?></td>
                    <td><?= $result[4]; ?></td>
                    <td><?= $result[5]; ?></td>
                    <td><?= $result[6]; ?></td>
                    <td><?= $result[7]; ?></td>
                    <td><?= $result[8]; ?></td>
                    <td><?= $result[9]; ?></td>
                    <td><?= $result[10]; ?></td>
               </tr>
     <?php
          }
     }
     ?>
</table>