//Elementos
const btnAddProduct = document.getElementById("btnAddProduct");
const btnEditProduct = document.getElementById("btnEditProduct");
const btnDeleteProduct = document.getElementById("btnDeleteProduct");
const formAbm = document.getElementById("formAbmProduct");

let selectedRow;

//validaciones
const v = {
	isSame: (a, b) => a === b,
	isEmpty: (a) => a.length === 0,
};

//Agregar Producto
btnAddProduct.addEventListener("click", () => {
	btnAddProduct.setAttribute("class", "enabled-button");
	modalProducts.getElementsByClassName("modal-title")[0].innerHTML =
		"Agregar producto";
	formAbm.attributes.item(2).value =
		"../src/modules/products/abm-productos.php?action=add";

	modalProducts.addEventListener("submit", () => {
		// nombre si tiene espacio, tomar solo el primer nombre
	});
});

//Editar Producto
btnEditProduct.addEventListener("click", () => {
	if (!btnEditProduct.classList.contains("disabled")) {
		btnEditProduct.setAttribute("class", "enabled-button");
		const productId = document.getElementsByClassName("selected")[0].id;

		modalProducts.getElementsByClassName("modal-title")[0].innerHTML =
			"Editar producto ";

		// const inputsForm = {
		// 	nombre: modalProducts.getElementsByTagName("input")[0],
		// 	apellido: modalProducts.getElementsByTagName("input")[1],
		// 	cedula: modalProducts.getElementsByTagName("input")[2],
		// 	email: modalProducts.getElementsByTagName("input")[3],
		// 	constrasenia: modalProducts.getElementsByTagName("input")[4],
		// 	admin: modalProducts.getElementsByTagName("input")[5],
		// 	vendedor: modalProducts.getElementsByTagName("input")[6],
		// };

		// let nombreCompleto = selectedRow
		// 	.getElementsByTagName("td")[0]
		// 	.innerHTML.split(" ");
		// let apellidos = "";
		// for (let i = 1; i < nombreCompleto.length; i++) {
		// 	apellidos += nombreCompleto[i] + " ";
		// }

		// const selectedUserData = {
		// 	nombre: selectedRow.getElementsByTagName("td")[0].innerHTML.split(" ")[0],
		// 	apellido: apellidos,
		// 	cedula: selectedRow.getElementsByTagName("td")[1].innerHTML,
		// 	email: selectedRow.getElementsByTagName("td")[2].innerHTML,
		// 	admin: "",
		// 	vendedor: "",
		// };
		// const parsedRoles = selectedRow
		// 	.getElementsByTagName("td")[3]
		// 	.innerHTML.split(" ");
		// parsedRoles.forEach((rol) => {
		// 	if (rol == "admin") {
		// 		selectedUserData.admin = "admin";
		// 	}
		// 	if (rol == "vendedor") {
		// 		selectedUserData.vendedor = "vendedor";
		// 	}
		// });

		// //refill inputs with selected user data
		// inputsForm.nombre.value = selectedUserData.nombre;
		// inputsForm.apellido.value = selectedUserData.apellido;
		// inputsForm.cedula.value = selectedUserData.cedula;
		// inputsForm.cedula.disabled = true;
		// inputsForm.cedula.style.filter = "brightness(50%)";
		// inputsForm.email.value = selectedUserData.email;
		// inputsForm.constrasenia.disabled = true;
		// inputsForm.constrasenia.style.filter = "brightness(50%)";
		// if (selectedUserData.admin) {
		// 	inputsForm.admin.setAttribute("checked", "true");
		// }
		// if (selectedUserData.vendedor) {
		// 	inputsForm.vendedor.setAttribute("checked", "true");
		// }

		formAbm.attributes.item(
			2
		).value = `../src/modules/products/abm-productos.php?action=edit&id=${productId}`;
	}
});

// Eliminar producto
btnDeleteProduct.addEventListener("click", async () => {
	if (!btnDeleteProduct.classList.contains("disabled")) {
		btnDeleteProduct.setAttribute("class", "enabled-button");
		const productId = document.getElementsByClassName("selected")[0].id;
			const response = prompt(
				`Se eliminará el producto con id ${productId} \n\nIngrese el id para confirmar`
			);
			if (response == productId) {
				const data = new URLSearchParams();
				data.append("deleteProductId", productId);
				await fetch("../src/modules/products/abm-productos.php?action=delete", {
					method: "POST",
					headers: {
						"Content-type": "application/x-www-form-urlencoded",
					},
					body: data,
				})
					.then((response) => {
						if (!response.ok) {
							throw new Error("Error en la solicitud: " + response.status);
						}
						selectedRow.setAttribute(
							"style",
							"border-top: 1.2px solid red;border-bottom: 1.2px solid red;"
						);
						setTimeout(() => {
							alert("Producto eliminado con éxito!");
							location.reload(true);
							return response.text();
						}, 1200);
					})
					.catch((error) => {
						console.error("Error: " + error);
					});
			} else {
				alert("Error: El id ingresado no es correcto");
			}
			document
				.getElementsByClassName("selected")[0]
				?.classList.remove("selected");
			btnDeleteProduct.classList.replace("enabled-button", "disabled");
			document
				.getElementById("btnEditProduct")
				.setAttribute("class", "disabled");
	}
});

//Modal
const modalProducts = document.getElementById("moddalProducts");
modalProducts.addEventListener("click", (event) => {
	if (
		event.target.id === modalProducts.id ||
		event.target.id === "btnCloseModal" ||
		event.target.id === "btnCancelModal"
	) {
		location.reload(true);
	}
});

function selectProductRow(productId) {
	const btnDeleteProduct = document.getElementById("btnDeleteProduct");
	document.querySelectorAll(".selected").forEach((el) => {
		el.classList.remove("selected");
	});

	selectedRow = document.getElementById(productId);
	selectedRow.setAttribute("class", "selected");

	btnDeleteProduct.classList.remove("disabled");
	btnEditProduct.classList.remove("disabled");
	btnEditProduct.setAttribute("data-bs-toggle", "modal");
	btnEditProduct.setAttribute("data-bs-target", "#moddalProducts");
}
