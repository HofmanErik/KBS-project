<?php include 'modules/menu.php'; ?>

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
						1
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="2ster" value="option2">
						2
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="3ster" value="option3">
						3
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="4ster" value="option5">
						4
						</label>
					</div>
					<div class="radio">
						<label>
						<input type="radio" name="rating" id="4ster" value="option5">
						5
						</label>
					</div>
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