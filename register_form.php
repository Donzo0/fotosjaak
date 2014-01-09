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
				<input type="text" name="street" />
				<input type="number" min="0" max="18926" name="house_number" />
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
				<input type="text" name="zip_code"  maxlength="6" />
			</td>
		</tr>
		<tr>
			<td>Geboortedatum: </td>
		<tr>
		<tr>
			<td>
				<input type="date" name="birthday" min="1883-01-01" />
			</td>
		</tr>
		<tr>
			<td>Geslacht: </td>
		<tr>
		<tr>
			<td>
				<input type="radio" name="sex" value="male" required/>Man<br>
				<input type="radio" name="sex" value="female" required/>vrouw
			</td>
		</tr>
		<tr>
			<td>Burgerlijke staat: </td>
		<tr>
		<tr>
			<td>
				<input type="radio" name="marital_status" value="married" required/>getrouwd<br>
				<input type="radio" name="marital_status" value="married" required/>niet getrouwd
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
			<td>password: </td>
		<tr>
		<tr>
			<td>
				<input type="password" name="password" required />
			</td>
		</tr>
		<tr>
			<td>Game genre: </td>
		<tr>
		<tr>
			<td>
				<select name="game_type" >
					<option value="no_choice" selected>---</option>
					<option value="fps">fps</option>
					<option value="strategy">strategy</option>
					<option value="adventure">adventure</option>
					<option value="rpg">rpg</option>
					<option value="horror">horror</option>
					<option value="retro">retro</option>
					<option value="sport">sport</option>
					<option value="puzzle">puzzle</option>
					<option value="party">party</option>
					<option value="casual">casual</option>
					<option value="education">education</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Favoriete game: </td>
		<tr>
		<tr>
			<td>
				<input type="text" name="favo_game" />
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" value="verstuur" />
			</td>
		</tr>
	</table>
</form>






















