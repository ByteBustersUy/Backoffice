var carrito = [];


function agregarProductoAlCarrito(id, cantidad){
    var productoExistente = carrito.find(producto => producto.id === id);
    if (productoExistente){
        productoExistente.cantidad += cantidad;
    }else{
        carrito.push({
            id: id,
            cantidad: cantidad
        })
    }
}

document.querySelectorAll(".btn-agregar").forEach(btn => {
    btn.addEventListener("click", () => {
        var id = btn.getAttribute("")
        var cantidad = 1;
        agregarProductoAlCarrito(id, cantidad);
    })
})

localStorage.setItem("carrito", JSON.stringify(carrito));


var carritoGuardado = localStorage.getItem("carrito");
if(carritoGuardado){
    carrito = JSON.parse(carritoGuardado);
}


/*Finalizar conptra envio de json*/
var btnFinalizarCompra = document.getElementById("btn-finalizar-compra");

btnFinalizarCompra.addEventListener("click", function(){

    if(carrito.length === 0) {
        console.log("El carrito esta vacio. No se puede finalizar la compra.");
        return;
    }

    /*var datosCompra = {
        carrito: carrito,
        total: calcularTotal()
    };*/

    

   /* fetch("./src/utils/finalizar-compra.php", {
        method: "POST",
        headers: {
             
            "content-Type": "application/json"
        },
        body: JSON.stringify(datosCompra)
    })
    .then(function(response) {
        if (response.ok) {
            console.log("compra finalizada exitosamente.");
        }else{
            console.log("error al finalizar la compra")
        }
    })
    .catch(function(error){
        console.log("error de solicitur: ", error);
    })*/
})