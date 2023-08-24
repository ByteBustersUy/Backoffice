function loadNav() {
    let navHTML = `
    <nav class="navbar navbar-light bg-light">
      <a href="/index.html" id="logo"><img class="logo" src="./assets/logoecomerse1.png" alt="" width="100" height="40"/></a>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar en Digitalmarket" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      <a href="/pages/carrito.html" class="carrito">
        <img class="carrito" src="./assets/Carts_Icons.png" alt="" />
      </a>
    </nav>
    <div class="menu">
    
    
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
      <nav class="navbar" id="hamburg">
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <p id="categorias">CATEGORIAS</p>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Digital</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
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
  
    document.body.insertAdjacentHTML('afterbegin', navHTML);
  }
  
  window.onload = loadNav;

/*Footer*/ 

  function loadFooter() {
    let footerHTML = `
    <footer class="footer">
      <div class="container">
        <div class="datos-emp">
           <p>Cuidad: Pepelepu 123</p>
           <p>Coso pere 12346</p>
        </div>
        <div class="footer-icons">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p id="copy">&copy; 2023 Bytebusters. Todos los derechos reservados.</p>
      </div>
    </footer>
    `;

    document.body.insertAdjacentHTML('beforeend', footerHTML);
}

window.onload = function() {
    loadNav();
    loadFooter();
};



  