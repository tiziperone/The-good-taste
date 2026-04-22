<button id="btnArriba" class="btn btn-outline-warning shadow rounded-circle" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050; display: none; width: 50px; height: 50px;" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
    <i class="bi bi-arrow-up fs-4"></i>
</button>

<script>
    window.addEventListener('scroll', () => {
        const btn = document.getElementById('btnArriba');
        // Cambiamos 'block' por 'flex' para que el icono quede perfectamente centrado
        if (window.scrollY > 300) {
            btn.style.display = 'flex';
            btn.style.alignItems = 'center';
            btn.style.justifyContent = 'center';
        } else {
            btn.style.display = 'none';
        }
    });
</script>