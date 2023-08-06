//Botones
const btnAddUser = document.getElementById("btnAddUser");
const btnEditUser = document.getElementById("btnEditUser");
const btnDeleteUser = document.getElementById("btnDeleteUser");
const formAbm = document.getElementById("formAbmUser");

//Agregar usuario
btnAddUser.addEventListener("click", () => {
	btnAddUser.setAttribute("class", "enabled-button");
	modalUsers.getElementsByClassName("modal-title")[0].innerHTML =
		"Agregar usuario";
	formAbm.attributes.item(2).value =
		"../src/modules/users/abm-usuarios.php?action=add";
});


//Editar usuario
btnEditUser.addEventListener("click", () => {
	if (!btnEditUser.classList.contains("disabled")) {
		btnEditUser.setAttribute("class", "enabled-button");
		const userCi = document.getElementsByClassName("selected")[0].id;

		modalUsers.getElementsByClassName("modal-title")[0].innerHTML = "Editar usuario";
		formAbm.attributes.item(2).value = `../src/modules/users/abm-usuarios.php?action=edit&ci=${userCi}`;
	}
});

const modalUsers = document.getElementById("moddalUsers");
modalUsers.onclick = () => {
	btnAddUser.classList.remove("enabled-button");
	btnEditUser.classList.remove("enabled-button");
	btnEditUser.setAttribute("class", "disabled");
	btnDeleteUser.setAttribute("class", "disabled");
	document.getElementsByClassName("selected")[0]?.classList.remove("selected");
};

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
						location.reload(true);
						return response.text();
					})
					.catch((error) => {
						console.error("Error: " + error);
					});
			}
			document
				.getElementsByClassName("selected")[0]
				?.classList.remove("selected");
			btnDeleteUser.classList.replace("enabled-button", "disabled");
			document.getElementById("btnEditUser").setAttribute("class", "disabled");
		}, 100);
	}
});

function selectUserRow(userCi) {
	const btnDeleteUser = document.getElementById("btnDeleteUser");
	document.querySelectorAll(".selected").forEach((el) => {
		el.classList.remove("selected");
	});

	const selectedRow = document.getElementById(userCi);
	selectedRow.setAttribute("class", "selected");

	btnDeleteUser.classList.remove("disabled");
	btnEditUser.classList.remove("disabled");
}
