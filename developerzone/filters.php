<script type="text/javascript">
 $(document).ready(function(){
  //alert("Het werkt");
  
  //$("tr:last").css("background-color", "RGB(255,0, 0)");
  $("tr:even").css("background-color", "RGB(210,210, 210)");
  $("tr:odd").css("background-color", "RGB(180,180, 180)");
  $("tr:first").css("background-color", "RGB(240,240,240)");
  //$("tr:eq(4)").css("background-color", "RGB(255,255,240)");
  //$("tr:not(tr:eq(3))").css("background-color", "RGB(255,255,240)");
  //$("tr:gt(2)").css("background-color", "RGB(255,255,240)");
  //$("tr:lt(2)").css("background-color", "RGB(255,255,240)");
  //$("tr:nth-child(3n)").css("background-color", "RGB(255,255,240)");
  
  $("tr:not(tr:eq(0))").hover(function(){
  	$(this).css("background-color", "RGBA(255,255,210,120)");  	
  },
  function(){
  	$("tr:even").css("background-color", "RGB(210,210, 210)");
  	$("tr:odd").css("background-color", "RGB(180,180, 180)");	
  });
 });
	
</script>



<p>Dit is een oefenpagina voor het werken met filters voor JQuery</p>

<table>
 <tr>
  <th>id</th>
  <th>voornaam</th>
  <th>tussenvoegsel</th>
  <th>achternaam</th>
 </tr>
 <tr>
  <td>1</td>
  <td>Arjan</td>
  <td>de</td>
  <td>Ruijter</td>
 </tr>
 <tr>
  <td>2</td>
  <td>Bert</td>
  <td>de</td>
  <td>Vries</td>
 </tr>
 <tr>
  <td>3</td>
  <td>Jan</td>
  <td>van</td>
  <td>Baarn</td>
 </tr>
 <tr>
  <td>4</td>
  <td>James</td>
  <td></td>
  <td>Trully</td>
 </tr>
 <tr>
  <td>5</td>
  <td>Arend</td>
  <td>van</td>
  <td>Veen</td>
 </tr>	
</table>