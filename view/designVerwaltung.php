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
        			<div class="row"><h2 class="col-sm-offset-4">Designverwaltung</h2></div>
					<a href="#" class="col-sm-offset-4 col-sm-2"><button type="button" id="loeschen" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Löschen</span></button></a>
					<a href="designRegistrieren.php" class="col-sm-2"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"> Einfügen</span></button></a>
  				</div>
        </div>
        <div class="table-responsive">       
  				<table class="table">
    				<thead>
      				<tr>
      					<th><input type="checkbox" id="checkall"/></th>
        					<th>Name der Design</th>
        					<th>Bezeichnung</th>
      				</tr>
    				</thead>
    				<tbody>
    				<form method="POST" action="../controller/designLoeschen.php" id="form">
        <?php
        	$bdd = getBDD();
        	$designn = $bdd->query('SELECT * FROM design ORDER BY NameDesign');
        	$i = 1;
        	while($design = $designn->fetch()) {
        		?>   
      				<tr>
      					<td><input type="checkbox" id="design<?php echo $i;?>" name="design[]" value="<?php echo $design['IDDesign'];?>"></td>
      					<td><a href="designEdit.php?idd=<?php echo $design['IDDesign'];?>"><?php echo $design['NameDesign'];?></a></td>
      					<td><?php echo $design['BezeichnungDesign'];?></td>
      				</tr>
        		<?php
        		$i++;
        	}
        ?>
        </form>
    				</tbody>
  				</table>
  				<input type="hidden" value="<?php echo $i;?>" id="nbDesign"/>
        </div>
  </body>
  <script type="text/javascript">
  	var checkall = document.getElementById('checkall'),
  		nbDesign = document.getElementById('nbDesign'),
  		loeschen = document.getElementById('loeschen'),
  		form = document.getElementById('form');
  	checkall.addEventListener('change', function () {
  		if(this.checked == true){
  			for(var i = 1; i <= parseInt(nbDesign.value); i++){
  				elem = document.getElementById("design" + i);
  				elem.checked = true;
  			}
  		}else{                            
  			for(var i = 1; i <= parseInt(nbDesign.value); i++){
  				elem = document.getElementById("design" + i);
  				elem.checked = false;
  			}
  		}
  			
  	}, false);
  	
  	loeschen.addEventListener('click', function () {
  		form.submit();
  	}, false);
  </script>
</html>

