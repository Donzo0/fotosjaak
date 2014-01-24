<form action="./index.php?content=register" method="post">
	<table border='1'>
		<caption>Registratiepagina</caption>
		<tr>
			<th>Vul hier uw gegevens in</th>
		</tr>
		<tr>
			<td>voornaam:</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="firstname" />
			</td>
		</tr>
		<tr>
			<td>tussenvoegsel:</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="infix" />
			</td>
		</tr>
		<tr>
			<td>achternaam:</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="surname" />
			</td>
		</tr>
		<tr>
			<td>Adres: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="address" />
				<input type="number" min="0" max="18926" name="addressnumber" />
			</td>
		</tr>
		<tr>
			<td>Woonplaats:</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="city" />
			</td>
		</tr>
		<tr>
			<td>Postcode: </td>
		<tr>
		<tr>
			<td>
				<input type="text" name="zipcode"  maxlength="6" />
			</td>
		</tr>		
		<tr>
			<td>emailadres: </td>
		<tr>
		<tr>
			<td>
				<input type="email" name="email" required />
			</td>
		</tr>
		<tr>
			<td>telefoonnummer: </td>
		<tr>
		<tr>
			<td>
				<input type="text" name="phonenumber" required />
			</td>
		</tr>
		<tr>
			<td>mobiel: </td>
		<tr>
		<tr>
			<td>
				<input type="text" name="mobilephonenumber" required />
			</td>
		</tr>
		
		<tr>
			<td>
				<input type="submit" name="submit" value="verstuur" />
			</td>
		</tr>
	</table>
</form>






















