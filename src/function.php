<?php
function creatEDT($h, $l, $m, $me, $j, $v)
{
     global $db;
     $req = $db->prepare("INSERT INTO edt(id,heure,lundi,mardi,mercredi,jeudi,vendredi,date) VALUES('',?,?,?,?,?,?,NOW())");
     $req->execute([$h, $l, $m, $me, $j, $v]);
     return $req;
}

function afficheEDT()
{
     global $db;
     $req = $db->prepare("SELECT * FROM edt WHERE date");
     $req->execute();
     $result = $req->fetchAll();
     return $result;
}

function afficheEtudiant()
{
     global $db;
     $reqest = $db->prepare("SELECT * FROM students");
     $reqest->execute();
     $affiche = $reqest->fetchAll();
     return $affiche;
}

function afficheM($id)
{
     global $db;
     $req = $db->prepare("SELECT * FROM edt WHERE id = $id");
     $req->execute();
     return $req;
}

function modif($h, $l, $m, $me, $j, $v, $id)
{
     global $db;
     $req = $db->prepare("UPDATE edt SET heure = ?, lundi = ?, mardi = ?, mercredi = ?, jeudi = ?, vendredi = ? WHERE id = ?");
     $req->execute([$h, $l, $m, $me, $j, $v, $id]);
     return $req;
}
function rechercheEdt($rech)
{
     global $db;
     $edt = $db->query("SELECT * FROM edt ORDER BY id DESC");
     $edt = $db->query('SELECT * FROM edt WHERE date LIKE "%' . $rech . '%" ORDER BY id DESC');
     $showEdt = $edt->fetchAll();
     return $showEdt;
}
function rechGlobalEtudiant($rech)
{
     global $db;
     $req = $db->query('SELECT * FROM students ORDER BY id DESC');
     $req = $db->query('SELECT * FROM students WHERE CONCAT(name,lastname,matricule,adress,contact,class,absence) LIKE "%' . $rech . '%" ORDER BY id DESC');
     $globale = $req->fetchAll();
     return $globale;
}
