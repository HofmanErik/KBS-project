<?php include 'modules/menu.php'; ?>
<?php include 'admin/classes/functions.php'; ?>

<?php $database = new Database; 

// query toevoegen aan de query functie zodat deze gereturned kan worden
$database->query('SELECT * FROM rating r JOIN bezoeker b ON r.reviewnr = b.reviewnr');
// To do - aanpassen van query om niet medewerkers maar ratings te tonen. 'SELECT * FROM rating r JOIN bezoeker b ON r.reviewnr = b.reviewnr'
$rows = $database->resultset();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form>
				<h2>Reactie achterlaten</h2>
				<div class="form-group">
					<label for="exampleInputEmail1">Rating</label>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="1ster" value="option1">
						1 ster
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="2ster" value="option2">
						2 sterren
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="3ster" value="option3">
						3 sterren
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="4ster" value="option5">
						4 sterren
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="4ster" value="option5">
						5 sterren
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tekst">Bericht</label>
					<textarea class="form-control" rows="3" id="tekst" placeholder="Uw Bericht"></textarea>
				</div>
				<div class="form-group">
					<label for="voornaam">Voornaam</label>
					<input type="text" class="form-control" id="voornaam" placeholder="Henk">
				<!-- </div>
				<div class="form-group"> -->
					<label for="tussenvoegsel">Tussenvoegsel</label>
					<input type="text" class="form-control" id="tussenvoegsel" placeholder="Henk">
				<!-- </div>
				<div class="form-group"> -->
					<label for="achternaam">Achternaam</label>
					<input type="text" class="form-control" id="achternaam" placeholder="Henk">
				</div>
				<div class="form-group">
					<label for="voornaam">E-mail</label>
					<input type="email" class="form-control" id="voornaam" placeholder="someone@example.com">
				</div>
				<button type="submit" class="btn btn-default">Versturen</button>
			</form>
		</div>
	</div>
</div>

<?php include 'modules/footer.php'; ?>