<form action="./index.php?content=register" method="post">
		<caption>Registratiepagina</caption>

			<h6>Persoonlijke gegevens: </h6>
		<fieldset>
			<label for='firstname'>Firstname: </label>
				<input type="text" name="firstname" id="firstname" placeholder=''><br />
			<label for='infix'>Infix: </label>
				<input type="text" name="infix" id="infix" placeholder=''><br />
			<label for='surname'>Surnmae: </label>
				<input type="text" name="surname" id="surname" placeholder=''><br />
		</fieldset>
			<h6>address: </h6>
		<fieldset>
			<label for='address'>Address: </label>
				<input type="text" name="address" id="address" placeholder=''><br />
			<label for='addressnumber'>Addressnumber: </label>
				<input type="number" name="addressnumber" id="addressnumber" placeholder=''><br />
			<label for='city'>City: </label>
				<input type="text" name="city" id="city" placeholder=''><br />
			<label for='zipcode'>Zipcode: </label>
				<input type="text" name="zipcode" id="zipcode" placeholder=''><br />
			<label for='country'>Country: </label>
				<input type="text" name="country" id="country" placeholder=''><br />
		</fieldset>
			<h6>Extra: </h6>
		<fieldset>
			<label for='email'>E-mail: </label>
				<input type="email" name="email" id="email" placeholder=''><br />
			<label for='phonenumber'>Phonenumber: </label>
				<input type="text" name="phonenumber" id="phonenumber" placeholder=''><br />
			<label for='mobilephonenumber'>MobileNumber: </label>
				<input type="text" name="mobilephonenumber" id="mobilephonenumber" placeholder=''>
		</fieldset>
			<input type="submit" name="submit" value="verstuur" />
</form>


















