<?php require_once("classes/Produit.php");
require_once("classes/Categorie.php");
$id=$_GET['id'];
$cat=new Categorie();
$detail=$cat->details($id);
$pro=new Produit();

	?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Affable Beans - Liste des produits</title>
</head>
<!--/head-->

<body>
	<?php require_once("header.php")
	?>



	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2><?php echo $detail->_libelle;?></h2>
						<div class="panel-group category-products" id="accordian">
							<?php echo $detail->_description;?>
						</div>




					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center">Les produits de la catégorie <?php echo $detail->_libelle;?> </h2>
						<?php  $list=$pro->liste();
						foreach ($list as $data )
							{
							if($data->_id_categorie == $id)
							{?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">

								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/<?php echo $data->_image?>" alt="" />


										<h2><?php echo $data->_prix ?> TND</h2>
										<p>
											<?php echo $data->_libelle ?>
										</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
											Ajouter au panier
										</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p>
												<?php echo $data->_description ?>
											</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
												Ajouter au panier
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--features_items-->

						<?php } } ?>

					</div>
				</div>
			</div>
	</section>

	<?php require_once("footer.php") ?>
</body>

</html>
