window.addEventListener('load', function() {
   console.log("funciona")
   fetch("./../app/mostrar.php")
   .then(response => response.json()) 
   .then(data => {
       for (var id =0 ; id < data.length; id++) {
       // CREA LOS ELEMENTOS
        const newElement = document.createElement("div");
        const divnombreproduc = document.createElement("div");
        const divproducto = document.createElement("div");
        const imgproducto = document.createElement("img");
        const divcantidad = document.createElement("div");
        const nombreProduc = document.createElement("p");
        const btnscantidad = document.createElement("div");
        const inputnum = document.createElement("input");
        const inputbtnmas = document.createElement("input");
        const inputbtnmenos = document.createElement("input");
        const precioProducto = document.createElement("p");
        const btneliminar = document.createElement("button");
        //LES OTORGO UNA CLASE A LOS ELEMENTOS
        newElement.classList.add("col-12");
        newElement.classList.add("div-producto");
        nombreProduc.classList.add("nombre-produc"),
        divnombreproduc.classList.add("div-nombre-produc");
        precioProducto.classList.add("precio-produc")
        divproducto.classList.add("div-dato-produc");
        divcantidad.classList.add("cantidad");
        imgproducto.classList.add("img-producto");
        btneliminar.classList.add("btn-eliminar");
        btnscantidad.classList.add("btns-cantidad");
        inputnum.classList.add("input-num")
      
        //AGREGO PROPIEDADES A LOS ELEMENTOS 
        nombreProduc.textContent = data[id].nombre;
        imgproducto.src = "./../imagenes-productos/"+data[id].imagen;
        inputbtnmenos.type="button";
        inputbtnmenos.value="-";
        inputnum.type="number";
        inputnum.value=1;
        inputbtnmas.type="button";
        inputbtnmas.value="+";
        precioProducto.textContent = "Precio: $"+data[id].precio;
        btneliminar.innerHTML ='<i class="fa-solid fa-trash"></i>';
        
        //SE AÑADEN LOS ELEMENTOS AL DOCUMENTO HTML 
        document.querySelector(".row").appendChild(newElement);
        newElement.appendChild(imgproducto);
        newElement.appendChild(divproducto);
        divnombreproduc.appendChild(nombreProduc);
        divproducto.append(divnombreproduc);
        btnscantidad.append(inputbtnmenos);
        btnscantidad.append(inputnum);
        btnscantidad.append(inputbtnmas);
        divcantidad.append(btnscantidad);
        divcantidad.appendChild(precioProducto);
        divcantidad.append(btneliminar);
        divproducto.appendChild(divcantidad);
       }
   })
   .catch(error => {
       console.error("error",error)
   });
});

