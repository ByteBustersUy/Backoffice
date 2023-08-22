//Elementos
const btnAddUser = document.getElementById("btnAddUser");
const btnEditUser = document.getElementById("btnEditUser");
const btnDeleteUser = document.getElementById("btnDeleteUser");
const formAbm = document.getElementById("formAbmUser");
let selectedRow;

//validaciones
const v = {
	isSame: (a, b) => a === b,
	isEmpty: (a) => a.length === 0,
};

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
			admin: modalUsers.getElementsByTagName("input")[5],
			vendedor: modalUsers.getElementsByTagName("input")[6],
		};

		//transformo todo lo de nombre en 1 sola palabra, y  si hay mas, pasan a ser parte de apellido.
		let nombreCompleto = selectedRow
			.getElementsByTagName("td")[0]
			.innerHTML.split(" ");
		let apellidos = "";
		for (let i = 1; i < nombreCompleto.length; i++) {
			apellidos += nombreCompleto[i] + " ";
		}

		const selectedUserData = {
			nombre: selectedRow.getElementsByTagName("td")[0].innerHTML.split(" ")[0].trim(),
			apellido: apellidos.trim(),
			cedula: selectedRow.getElementsByTagName("td")[1].innerHTML.trim(),
			email: selectedRow.getElementsByTagName("td")[2].innerHTML.trim(),
			admin: "",
			vendedor: "",
		};
		const parsedRoles = selectedRow
			.getElementsByTagName("td")[3]
			.innerHTML.split(" ");
		parsedRoles.forEach((rol) => {
			if (rol == "admin") {
				selectedUserData.admin = "admin";
			}
			if (rol == "vendedor") {
				selectedUserData.vendedor = "vendedor";
			}
		});

		//rellenar formulario con la data seleccionada
		inputsForm.nombre.value = selectedUserData.nombre;
		inputsForm.apellido.value = selectedUserData.apellido;
		inputsForm.cedula.value = selectedUserData.cedula;
		inputsForm.cedula.disabled = true;
		inputsForm.cedula.style.filter = "brightness(50%)";
		inputsForm.email.value = selectedUserData.email;
		inputsForm.constrasenia.disabled = true;
		inputsForm.constrasenia.style.filter = "brightness(50%)";

		if (!v.isEmpty(selectedUserData.admin)) {
			inputsForm.admin.setAttribute("checked", "true");
		}
		if (!v.isEmpty(selectedUserData.vendedor)) {
			inputsForm.vendedor.setAttribute("checked", "true");
		}

		formAbm.attributes.item(2).value = `../src/modules/users/abm-usuarios.php?action=edit&ci=${inputsForm.cedula.value}`;
	}
});

// Eliminar usuario
btnDeleteUser.addEventListener("click",() => {
	if (!btnDeleteUser.classList.contains("disabled")) {
		btnDeleteUser.setAttribute("class", "enabled-button");
		const userCi = document.getElementsByClassName("selected")[0].id;
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
							"border-top: 1.5px solid red;border-bottom: 1.5px solid red;"
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
				alert("Error: La cédula ingresada no es correcta");
			}
			document
				.getElementsByClassName("selected")[0]
				?.classList.remove("selected");
			btnDeleteUser.classList.replace("enabled-button", "disabled");
			document.getElementById("btnEditUser").setAttribute("class", "disabled");
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
		location.reload(true);
	}
});

function selectUserRow(userCi) {
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
