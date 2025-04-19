<div class="container-fluid p-0">
  <style>
    /* Estilos generales del footer */
    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #f8f9fa;
      box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      transition: transform 0.3s ease-in-out;
    }

    /* Barra de texto debajo de los íconos */
    .footer-bar {
      text-align: center;
      padding: 5px 0;
      font-size: 15px;
      background-color: #e3f6ff; /* Color azul claro */
      color:rgb(77, 59, 59);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Ocultar el footer al hacer scroll hacia abajo */
    .footer-hidden {
      transform: translateY(100%);
    }

    /* Cambiar el color de la barra cuando el footer está oculto */
    .footer-hidden .footer-bar {
      background-color:rgb(79, 217, 109); /* Color verde */
      color:rgb(10, 10, 10); /* Texto negro */
    }
  </style>

  <footer id="footer">
    <!-- Íconos sociales -->
    <!-- Barra de texto -->
    <div class="footer-bar">
      HOSPITAL UNIVERSITARIO SAN JORGE - Mauricio Sánchez Abella - Derechos Reservados &copy; 2025
    </div>
  </footer>

  <script>
    // Ocultar y mostrar el footer al hacer scroll
    let lastScrollTop = 0;
    const footer = document.getElementById("footer");

    window.addEventListener("scroll", function () {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > lastScrollTop) {
        // Scroll hacia abajo - ocultar footer
        footer.classList.add("footer-hidden");
      } else {
        // Scroll hacia arriba - mostrar footer
        footer.classList.remove("footer-hidden");
      }
      lastScrollTop = scrollTop;
    });
  </script>
</div>
