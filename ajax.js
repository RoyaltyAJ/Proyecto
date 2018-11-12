const calcular = async (event) => {
	const moneda = new Map([
		['Canada', '$'],
		['España', '€'],
		['Japon', '¥'],
		['Colombia', '$'],
		['Argentina', '$'],
	]);

	event.preventDefault();
	const form = document.getElementById('frmOperacion');
	const form_a = new FormData(form);
	let jsonData = {};

	for (const pair of new FormData(form)) {
		jsonData[pair[0]] = pair[1];
	}

	const pais = moneda.get(form_a.get('Pais'));

	const respuesta = await enviarPeticion('Controlador.php', jsonData);
	
	document.getElementById('Total').value = `${respuesta.body.total} ${pais}`;
}

const enviarPeticion = (action, jsonBody) => {
	const URL = `${document.location}/${action}`;
	return new Promise(async (resolve, reject) => {
		const rawResponse = await fetch(URL, {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(jsonBody)
		})
			.then(response => response.text().then(data => {
				return ({ status: response.status, body: JSON.parse(data) })
			}
			))
			.then((data) => resolve(data))
			.catch(err => reject(Error(err.message)));
	});
};
