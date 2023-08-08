//Botones
const btnAddUser = document.getElementById("btnAddUser");
const btnEditUser = document.getElementById("btnEditUser");
const btnDeleteUser = document.getElementById("btnDeleteUser");
const formAbm = document.getElementById("formAbmUser");
let selectedRow;

//Agregar usuario
btnAddUser.addEventListener("click", () => {
	btnAddUser.setAttribute("class", "enabled-button");
	modalUsers.getElementsByClassName("modal-title")[0].innerHTML =
		"Agregar usuario";
	formAbm.attributes.item(2).value =
		"../src/modules/users/abm-usuarios.php?action=add";

	modalUsers.addEventListener("submit", () => {
		// nombre si tiene espacio, tomar solo el primer nombre
	});
});

//Editar usuario
btnEditUser.addEventListener("click", () => {
	if (!btnEditUser.classList.contains("disabled")) {
		btnEditUser.setAttribute("class", "enabled-button");
		const userCi = document.getElementsByClassName("selected")[0].id;

		modalUsers.getElementsByClassName("modal-title")[0].innerHTML =
			"Editar usuario ";

		const inputsForm = {
			nombre: modalUsers.getElementsByTagName("input")[0],
			apellido: modalUsers.getElementsByTagName("input")[1],
			cedula: modalUsers.getElementsByTagName("input")[2],
			email: modalUsers.getElementsByTagName("input")[3],
			constrasenia: modalUsers.getElementsByTagName("input")[4],
		};

		let nombreCompleto = selectedRow
			.getElementsByTagName("td")[0]
			.innerHTML.split(" ");
		let apellidos = "";
		for (let i = 1; i < nombreCompleto.length; i++) {
			apellidos += nombreCompleto[i] + " ";
		}

		const selectedUserData = {
			nombre: selectedRow.getElementsByTagName("td")[0].innerHTML.split(" ")[0],
			apellido: apellidos,
			cedula: selectedRow.getElementsByTagName("td")[1].innerHTML,
			email: selectedRow.getElementsByTagName("td")[2].innerHTML,
		};

		//refill inputs with selected user data
		inputsForm.nombre.value = selectedUserData.nombre;
		inputsForm.apellido.value = selectedUserData.apellido;
		inputsForm.cedula.value = selectedUserData.cedula;
		inputsForm.cedula.disabled = true;
		inputsForm.cedula.style.filter = "brightness(50%)";
		inputsForm.email.value = selectedUserData.email;
		inputsForm.constrasenia.disabled = true;
		inputsForm.constrasenia.style.filter = "brightness(50%)";

		const newData = {
			nombre: "",
			apellido: "",
			emial: "",
			roles: "",
		};

		modalUsers.addEventListener("change", () => {

			//nombre
			if (inputsForm.nombre.value.length > 0) {
				if (selectedUserData.nombre !== inputsForm.nombre.value) {
					newData.nombre = inputsForm.nombre.value.split(" ")[0];
					console.log("nombre: ", newData.nombre);
				}
			} else {
				newData.nombre = selectedUserData.nombre;
				console.log("nombre: ", newData.nombre);
			}

			//apellido
			if(inputsForm.apellido.value.length > 0 ){
				if (selectedUserData.apellido !== inputsForm.apellido.value) {
					newData.apellido = inputsForm.apellido.value;
					console.log("apellido: ", newData.apellido);
				}
			}else{
				newData.apellido = selectedUserData.apellido;
				console.log("apellido: ", newData.apellido);
			}

			//email
			if(inputsForm.email.value.length > 0){
				if (selectedUserData.email !== inputsForm.email.value) {
					newData.emial = inputsForm.email.value;
					console.log("email: ",newData.emial);
				}
			}else{
				newData.emial = selectedUserData.email;
				console.log("email: ",newData.emial);
			}


			formAbm.attributes.item(
				2
			).value = `../src/modules/users/abm-usuarios.php?action=edit&ci=${userCi}`;
		});
	}
});

// Eliminar usuario
btnDeleteUser.addEventListener("click", () => {
	if (!btnDeleteUser.classList.contains("disabled")) {
		btnDeleteUser.setAttribute("class", "enabled-button");
		const userCi = document.getElementsByClassName("selected")[0].id;
		setTimeout(() => {
			const response = prompt(
				`Se eliminará al usuario con cédula ${userCi} \n\nIngrese la cédula para confirmar`
			);
			if (response == userCi) {
				const data = new URLSearchParams();
				data.append("deleteUserCi", userCi);
				fetch("../src/modules/users/abm-usuarios.php?action=delete", {
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
							alert("Usuario eliminado con éxito!");
							location.reload(true);
							return response.text();
						}, 1200);
					})
					.catch((error) => {
						console.error("Error: " + error);
					});
			} else {
				setTimeout(() => {
					alert("Error: La cédula ingresada no es correcta");
				}, 100);
			}
			document
				.getElementsByClassName("selected")[0]
				?.classList.remove("selected");
			btnDeleteUser.classList.replace("enabled-button", "disabled");
			document.getElementById("btnEditUser").setAttribute("class", "disabled");
		}, 100);
	}
});

//Modal
const modalUsers = document.getElementById("moddalUsers");
modalUsers.addEventListener("click", (event) => {
	if (
		event.target.id === modalUsers.id ||
		event.target.id === "btnCloseModal" ||
		event.target.id === "btnCancelModal"
	) {
		// btnAddUser.classList.remove("enabled-button");
		// btnEditUser.classList.remove("enabled-button");
		// if (btnEditUser.attributes.getNamedItem("data-bs-target")) {
		// 	btnEditUser.attributes.removeNamedItem("data-bs-target");
		// }
		// if (btnEditUser.attributes.getNamedItem("data-bs-toggle")) {
		// 	btnEditUser.attributes.removeNamedItem("data-bs-toggle");
		// }
		// btnEditUser.setAttribute("class", "disabled");
		// btnDeleteUser.setAttribute("class", "disabled");
		// document
		// 	.getElementsByClassName("selected")[0]
		// 	?.classList.remove("selected");
		location.reload(true);
	}
});

function selectUserRow(userCi) {
	const btnDeleteUser = document.getElementById("btnDeleteUser");
	document.querySelectorAll(".selected").forEach((el) => {
		el.classList.remove("selected");
	});

	selectedRow = document.getElementById(userCi);
	selectedRow.setAttribute("class", "selected");

	btnDeleteUser.classList.remove("disabled");
	btnEditUser.classList.remove("disabled");
	btnEditUser.setAttribute("data-bs-toggle", "modal");
	btnEditUser.setAttribute("data-bs-target", "#moddalUsers");
}
