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



  