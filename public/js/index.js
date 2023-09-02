window.addEventListener("load", function () {
	fetch("./app/mostrar.php")
		.then((response) => response.json())
		.then((data) => {
			for (let id = 0; id < data.length; id++) {
				const divPrducPromo = document.getElementById("tarjetas");
				divPrducPromo.innerHTML += `
    <div>
        <div class="card h-100 produc-promo" >
            <img src="./imagenes-productos/${data[id].imagen}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4>$${data[id].precio}</h4>
                <h5>${data[id].nombre}</h5>
            </div>
            <a href="#" class="btn btn-agregar">Agregar al carrito</a>
        </div>
    </div>`;
			}
		});
});

setTimeout(() => {
	const inputSearch = document.getElementById("navSearch");
	//const btnNavSearch = document.getElementById("btnNavSearch");

	inputSearch.addEventListener("keyup", () => {
		fetch(`../api/search.php`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ value: inputSearch.value }),
		})
			.then((response) => response.json())
			.then((data) => {
				const sugerencias = [];
				for (let i = 0; i < 5; i++) {
					//console.log(data[i])
					if (data[i]) {
						sugerencias.push(data[i].nombre);
					}
				}
				console.log(sugerencias);
			});
	});
}, 100);
