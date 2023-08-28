function loadNav() {
	let navHTML = `
  <nav class="navbar navbar-light bg-light">
  <div class="d-flex m-auto">
    <a href="index.html" id="logo"><img class="logo" src="./assets/logoecomerse1.png" alt=""/></a>
    <button id="btnNavOption" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarMenu" aria-controls="offcanvasNavbarMenu" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarMenu" aria-labelledby="offcanvasNavbarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarMenuLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="bg-color: black">
          ${loadLinks()}
          ${loadCategories()}
        </div>
      </div>
    <form class="d-flex">
      <input class="form-control search" type="search" placeholder="Buscar en Digitalmarket" aria-label="Search"/>
      <button id="btnNavSearch" class="btn btn-outline-secondary" type="submit">Buscar</button>
    </form>
    <a id="btn-carrito" href="./pages/carrito.html">
      <img class="carrito" src="./assets/Carts_Icons.png" alt="logo carrito de compras" />
    </a>
  </div>
</nav>
</div>
<nav class="navbar" id="burgerCategories">
  <button id="btnCategories" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarCat" aria-controls="offcanvasNavbarCat" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><p id="categorias">CATEGORIAS</p>
  </button>
  <div class="menu">
    <div>
      ${loadLinks()}
    </div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarCat" aria-labelledby="offcanvasNavbarCatLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarCatLabel">CATEGORIAS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          ${loadCategories()}
        </div>
      </div>
  </div>
</nav>
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
          <p>Aconcagua 1277 - Montevideo</p>
        </div>
        <div class="footer-icons mb-2">
          <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.whatsapp.com/" target="_blank"><i class="bi bi-whatsapp"></i></a>
          <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-messenger"></i></a>
        </div>
        <div class="mt-2">
          <p id="copy">&copy; 2023 Bytebusters. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>
    `;

	document.body.insertAdjacentHTML("beforeend", footerHTML);
}

function loadCategories() {
  return `
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
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Lacteos y quesos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Otras cosas</a>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>`;
}

function loadLinks() {
  return `
      <ul>
        <li><a href="./index.html">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
      `;
}

window.onload = function () {
	loadNav();
	loadFooter();
};
