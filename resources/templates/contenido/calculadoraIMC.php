
<div class="padreCalculadora">
	<p class="textocal">
		El IMC es una herramienta útil para averiguar rápidamente si tu peso corporal está situado, por ejemplo, en la zona de sobrepeso, pero hay que tener en cuenta que este índice no contempla las diferentes densidades de la masa muscular o la masa ósea. En el caso de los deportistas que tienen una masa muscular muy desarrollada, el resultado de este cálculo podría indicar erróneamente que  padece sobrepeso. También hay que tener cuidado en los resultados obtenidos en personas embarazadas o en edad avanzada, ya que se tratan de casos especiales y en todo caso habría que tener en cuenta otros parámetros para determinar su IMC.<br>
		<br>
		Si quieres conocer con total exactitud tu composición corporal, te recomendamos que vayas a un nutricionista profesional.<br>
		<br>
		<b>El IMC no es recomendable aplicarlo a niños y adolescentes</b> debido a su desarrollo corporal, sino que está dirigido a mujeres y hombres de más de 18 años.
	</p>

	<div class="calculadora">
		<p id='error'></p>
		<label for="peso" class="espacio">Escribe tu peso (kg)</label><br>
		<input type="text" name="peso" id="peso" class="espacio" pattern="([0-9])*"><br>
		<label for="altura" class="espacio" >Escribe tu altura (cm)</label><br>
		<input type="text" name="altura" id="altura" class="espacio" pattern="([0-9])*"><br>
		<button>Calcular</button><br>
		<p>El resultado es: <span></span></p>
	</div>

	<figure class="medio">
		<img src="imagenes/peso.jpg" alt="">
	</figure>
</div>
<script type="text/javascript">
  //Código para el evento de la calculadora
	let but = document.querySelector('button');
	but.addEventListener('click',calcular);

	//Función que comprueba que esten bien introducidos los datos y calculamos el valor
	function calcular(){
		let alt = document.querySelector('#altura');
		let pes = document.querySelector('#peso');
		if(!alt.checkValidity() || !pes.checkValidity()) {
		  document.getElementById("error").innerHTML = 'Escribe números por favor';
		  document.getElementById("error").style.color = 'red';
		} else {
			document.getElementById("error").innerHTML = '';
			let altFin = parseInt(alt.value) * parseInt(alt.value);
			let pesFin = parseInt(pes.value) * 10000;
			let res = pesFin / altFin + '';
			document.querySelector('span').innerHTML = dejarDosDecimales(res);
		}
	}
	//Función para dejar dos decimales
	function dejarDosDecimales(num){
		let numArr = num.split('.');
		let decInt = parseInt(numArr[1]);
		let decRed = Math.round(decInt)+'';
		let decArr = decRed.split('',2);
		numArr[1] = decArr.join('');
		return numArr.join(',');
	}

</script>
