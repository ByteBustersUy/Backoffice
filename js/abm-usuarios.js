// Agregar usuario
const btnAddUser = document.getElementById("btnAddUser");
btnAddUser.addEventListener("click", () => {
	btnAddUser.setAttribute("class", "enabled-button");
});

const modalUsers = document.getElementById("moddalUsers");
modalUsers.onclick = () => {
	btnAddUser.classList.remove("enabled-button");
	document.getElementsByClassName("selected").forEach((row) => {
		row.classList.remove("selected");
	});
};

//editar usuario
const btnEditUser = document.getElementById("btnEditUser");
//TODO:  falta poder editar

// Eliminar usuario
const btnDeleteUser = document.getElementById("btnDeleteUser");
btnDeleteUser.addEventListener("click", () => {
	if (!btnDeleteUser.classList.contains("disabled")) {
		btnDeleteUser.setAttribute("class", "enabled-button");
		const userCi = document.getElementsByClassName("selected")[0].id;
		setTimeout(() => {
			const response = prompt(
				`Se eliminará al usuario con cédula ${userCi} \n\nIngrese la cédula para confirmar`
			);
			btnDeleteUser.classList.replace("enabled-button", "disabled");

			if (response == userCi) {
				const data = new URLSearchParams();
				data.append("deleteUserCi", userCi);
				document.getElementById("btnEditUser").setAttribute("class", "disabled");
				fetch("../src/modules/users/abm-usuarios.php", {
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
						return response.text();
					})
					.then(() => {
						alert("Usuario eliminado con éxito!");
						location.reload(true);
					})
					.catch((error) => {
						console.error("Error: " + error);
					});
			}
			document.getElementsByClassName("selected").forEach((row) => {
				row.classList.remove("selected");
			});
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
