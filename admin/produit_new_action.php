<?php
require_once("../classes/Produit.php");
require_once("../classes/Util.php");

@$libelle = $_POST['libelle'];
@$description = $_POST['description'];
@$id = $_POST['id'];
@$prix=$_POST['prix'];
@$id_categorie = $_POST['id_categorie'];
if( !empty($libelle) && !empty($description) ) 
{
	$cat = new Produit();
	$util = new Util();
	$cat->_libelle = $libelle;
	$cat->_description = $description;
	$cat->_image = $util->upload('image', "../upload");
	$cat->_prix=$prix;
	$cat->_id_categorie=$id_categorie;
	if( empty($id) ) 	// Ajout
		$id = $cat->ajouter();
	else				// Modification
	{
		$cat->_id = $id;
		$cat->modifier();
	}

	header("Location: produit_list.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>