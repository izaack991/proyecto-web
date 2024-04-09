document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.querySelector(".sidebar");

  // Asegúrate de que el sidebar esté inicialmente oculto
  sidebar.classList.add("close");

  // Función para mostrar el sidebar
  const showSidebar = () => {
    sidebar.classList.remove("close");
  };

  // Función para ocultar el sidebar
  const hideSidebar = () => {
    sidebar.classList.add("close");
  };

  // Agrega los event listeners
  sidebar.addEventListener("mouseenter", showSidebar);
  sidebar.addEventListener("mouseleave", hideSidebar);

  // Adaptabilidad para dispositivos con ancho menor a 800px
  window.addEventListener('resize', () => {
    if (window.innerWidth < 800) {
      sidebar.classList.add("close");
    }
  });
});