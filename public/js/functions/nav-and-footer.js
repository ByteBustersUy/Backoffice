function loadNav() {
	let navHTML = `
    <nav class="navbar navbar-light bg-light">
    <div class="d-flex"></div>
      <a href="/index.html" id="logo"><img class="logo" src="./assets/logoecomerse1.png" alt=""/></a>
      <button id="btnNavOption" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <form class="d-flex">
        <input class="form-control search" type="search" placeholder="Buscar en Digitalmarket" aria-label="Search"/>
        <button id="btnNavSearch" class="btn btn-outline-secondary" type="submit">Buscar</button>
      </form>
      <a href="./pages/carrito.html" class="carrito">
        <img class="carrito" src="./assets/Carts_Icons.png" alt="" />
      </a>
      </div>
    </nav>


    <div class="menu">
      <ul>
        <li><a href="./index.html">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
      <nav class="navbar" id="burgerCategories">
      <div class="container-fluid">
        
        <button id="btnCategories" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <p id="categorias">CATEGORIAS</p>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CATEGORIAS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Almacen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Desayuno, merienda y postres</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Aguas y Bebidas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Frutas y verduyras</a>
            <li class="nav-item">
            <a class="nav-link" href="#">Lacteos y quesos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Otras cosas</a>
          </li>
          </li>
              
            </ul>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    </div>
    `;

	document.body.insertAdjacentHTML("afterbegin", navHTML);
}

window.onload = loadNav;

/*Footer*/

function loadFooter() {
	let footerHTML = `
    <footer class="footer">
      <div>
        <div class="datos-emp">
           <p>Nosotros</p>
           <p> Coso pere 12346</p>
        </div>
        <div class="footer-icons mb-2">
          <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.whatsapp.com/" target="_blank"><i class="bi bi-whatsapp"></i></a>
          <a href="#"><i class="bi bi-messenger"></i></a>
        </div>
        <div class="mt-5">
        <p id="copy">&copy; 2023 Bytebusters. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>
    `;

	document.body.insertAdjacentHTML("beforeend", footerHTML);
}

window.onload = function () {
	loadNav();
	loadFooter();
};
