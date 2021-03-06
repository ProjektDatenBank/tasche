	<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="de">
  <?php
	include 'head.php';
	include 'nav_bar.php';
  ?>
	<body>
	<?php
		$queryMarke = $bdd->query('SELECT * FROM marke GROUP BY NameMarke');
		$queryDesign = $bdd->query('SELECT * FROM design GROUP BY NameDesign');
		$queryType = $bdd->query('SELECT * FROM type GROUP BY NameType');
		$queryKategorie = $bdd->query('SELECT * FROM kategorie GROUP BY NameKategorie');
	?>
	<div class="container">
		<div class="row" style="margin-top:80px;">
			  <h3>Neue Tasche</h3>
		 <form class="form-group" action="../controller/tascheRegController.php" method="POST" enctype="multipart/form-data" class="form col-lg-push-3 col-lg-6">
					<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" required/>
					<?php
					if(isset($_GET['err_name']) and $_GET['err_name'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Menge:</label>
					<input type="number" name="menge" class="form-control" required/>
					<?php
					if(isset($_GET['err_menge']) and $_GET['err_menge'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Preis:</label>
					<input type="number" name="preis" step=any class="form-control" required/>
					<?php
					if(isset($_GET['err_preis']) and $_GET['err_preis'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="name">Kategorie:</label>
					<select name="kategorie" class="form-control">
						<?php
							while($donneesKat = $queryKategorie->fetch()){
								?>
									<option value="<?php echo $donneesKat['IDKategorie'];?>"><?php echo $donneesKat['NameKategorie'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Marke:</label>
					<select name="marke" class="form-control">
						<?php
							while($donneesMarke = $queryMarke->fetch()){
								?>
									<option value="<?php echo $donneesMarke['IDMarke'];?>"><?php echo $donneesMarke['NameMarke'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Design:</label>
					<select name="design" class="form-control">
						<?php
							while($donneesDesign = $queryDesign->fetch()){
								?>
									<option value="<?php echo $donneesDesign['IDDesign'];?>"><?php echo $donneesDesign['NameDesign'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Type:</label>
					<select name="type" class="form-control">
						<?php
							while($donneesType = $queryType->fetch()){
								?>
									<option value="<?php echo $donneesType['IDType'];?>"><?php echo $donneesType['NameType'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="bild">Bild:</label>
					<input type="file" name="bild" class="form-control" id="inputBild" required/>
					<?php
					if(isset($_GET['err_bild']) and $_GET['err_bild'] == true){
				?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
				<div class="form-group">
					<label for="beschreibung">Taschenbeschreibung (max. 255 Zeichen):</label>
					<textarea name="beschreibung" class="form-control"/></textarea>
					<?php
					if(isset($_GET['err_beschreibung']) and $_GET['err_beschreibung'] == true){
					?>
						<span class="label label-danger">Fehler bei diesem Feld</span>
				<?php
					}
				?>
				</div>
					<input type="submit" value="Einstellen" class="btn btn-success" id="submit" style="margin-top:10px;"/>
					<a href="start_seite.php"><input value="Abbrechen" class="btn btn-danger" style="margin-top:10px;"></a>
					
				</form>
		</div>
		</div>
  </body>
  
  <script>
$(window).load(function()
{
	
});

/*
var inputBild = document.getElementById('inputBild'),
	bild = document.getElementById('bild');
	
inputBild.addEventListener('change', function () {
	alert(this.files[0].mozFullPath);
}, false);*/
  </script>
</html>