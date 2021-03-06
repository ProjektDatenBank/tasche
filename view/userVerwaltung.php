<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
	include 'head.php'
  ?>
  <body style="padding-top:100px;">
        <?php include 'nav_bar.php' ?>
        <div class="container">
        <div class="row">
        			<div class="row"><h2 class="col-sm-offset-4">Kundenverwaltung</h2></div>
					<a href="#" class="col-sm-offset-4 col-sm-2"><button type="button" id="speichern" class="btn btn-success"><span class="glyphicon glyphicon-save"> Speichern</span></button></a>
					<a href="userVerwaltung.php" class="col-sm-2"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"> Zurücksetzen</span></button></a>
  				</div>
        	<div class="row">
        <div class="table-responsive">       
  				<table class="table">
    				<thead>
      				<tr>
        					<th>Username</th>
        					<th>Name</th>
        					<th>Vorname</th>
        					<th>Stadt</th>
        					<th>PLZ</th>
        					<th>Strasse, Nr.</th>
        					<th>Email</th>
        					<th>IBan</th>
        					<th>Kundentyp</th>
      				</tr>
    				</thead>
    				<tbody>
    				<form method="POST" action="../controller/kundenSpeichern.php" id="form">
        <?php
        	$bdd = getBDD();
        	$kunden = $bdd->query('SELECT * FROM kunde ORDER BY NameKunde');
        	$i = 1;
        	while($kunde = $kunden->fetch()) {
        		?>   
      				<tr>
      					<td><?php echo $kunde['Username'];?></td>
      					<td><?php echo $kunde['Namekunde'];?></td>
      					<td><?php echo $kunde['Vorname'];?></td>
      					<td><?php echo $kunde['Stadt'];?></td>
      					<td><?php echo $kunde['PLZ'];?></td>
      					<td><?php echo $kunde['Strasse'];?></td>
      					<td><?php echo $kunde['Email'];?></td>
      					<td><?php echo $kunde['IBANKunde'];?></td>
      					<td>
      						<?php if($kunde['IDKunde'] == $_SESSION['id']){ ?>
      							<select name="typeKunden[]" class="form-control" disabled>
      						<?php }else{ ?>
      							<input type="hidden" name="idKunden[]" value="<?php echo $kunde['IDKunde'];?>"/>
      							<select name="typeKunden[]" class="form-control">
      						<?php } ?>	
      					<?php if($kunde['TypeKunde'] == "1"){ ?>
	      						<option value="0">Kunde</option>
      							<option value="1" selected>Administrator</option>
      					<?php
      						}else { ?>
	      						<option value="0" selected>Kunde</option>
      							<option value="1">Administrator</option>
      						<?php }
      						?>
      						</select>
      					</td>
      				</tr>
        		<?php
        		$i++;
        	}
        ?>
        </form>
    				</tbody>
  				</table>
        </div>
  </body>
  <script type="text/javascript">
  	var speichern = document.getElementById('speichern'),
  		form = document.getElementById('form');
  		
  	speichern.addEventListener('click', function () {
  		form.submit();
  	}, false);
  </script>
</html>

