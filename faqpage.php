<?php 
	if (!isset($_GET['language']))
	{
		$_GET['language'] = 'dutch';
	}
	$userrole = array('customer');
	include("security.php");
	include("connect_db.php");
	$query = "SELECT *
			  FROM `faq`";
	$result = mysql_query($query, $db);
?>

<table class='simple'>
	<caption>
		Faq pagina
		<a href='index.php?content=faqpage&language=english'>
			<img src='./images/eng_vlag.png' alt='' />
		</a>
		<a href='index.php?content=faqpage&language=dutch'>
			<img src='./images/ned_vlag.png' alt='' />
		</a>
	</caption>
	<tr>
		<th>
			id
		</th>
		<th>
			vraag
		</th>
		<th>
			antwoord
		</th>	
	</tr>
<?php
while ( $record = mysql_fetch_array($result))
{
	echo "<tr>
			<td>
				".$record['id']."
			</td>
			<td>
				";
			if ($_GET['language'] == 'english')
			{
				echo $record['question_english'];
			}
			else
			{
				echo $record['question_dutch'];
			}
			echo "
			</td>
			<td>
				";
			if ($_GET['language'] == 'english')
			{
				echo $record['answer_english'];				
			}
			else
			{
				echo $record['answer_dutch'];
			}
			echo "
			</td>	
		  </tr>";
}
?>
</table>