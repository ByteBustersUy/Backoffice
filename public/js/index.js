window.addEventListener('load', function() {
    
    fetch("./app/mostrar.php")
    .then(response => response.json()) 
    .then(data => {
        for (let id =0 ; id < data.length; id++) {

            const divPrducPromo =  document.getElementById("tarjetas");
            divPrducPromo.innerHTML +=`
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
    })
})