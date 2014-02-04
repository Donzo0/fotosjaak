<form action="./index.php?content=register" method="post">
	<table>
		<tr>
			<td>voornaam:</td>
		</tr>
		<tr>
			<td><input type="text" name="firstname" /></td>
		</tr>
		<tr>
			<td>tussenvoegsel</td>
		</tr>
		<tr>
			<td><input type="text" name="infix" /></td>
		</tr>
		<tr>
			<td>achternaam</td>
		</tr>
		<tr>
			<td><input type="text" name="surname" /></td>
		</tr>
		<tr>
			<td>straat + huisnummer</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="address" />
				<input type="number" min="0" max="18923" name="addressnumber"/>
			</td>
		</tr>
		<tr>
			<td>Stad: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="city" />
			</td>
		</tr>
		<tr>
			<td>Postcode: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="zipcode" />
			</td>
		</tr>
		<tr>
			<td>Land: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="country" />
			</td>
		</tr>
		<tr>
			<td>email</td>
		</tr>
		<tr>				
			<td>
				<input type='email' name='email' />
			</td>
		</tr>
		<tr>
			<td>telefoonnummer vast: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="telephonenumber" />
			</td>
		</tr>
		<tr>
			<td>mobiel nummer: </td>
		</tr>
		<tr>
			<td>
				<input type="text" name="mobilephonenumber" />
			</td>
		</tr>		
		<tr>
			<td><input type="submit" name="submit" value="verstuur" /></td>
		</tr>
	</table>
</form>		