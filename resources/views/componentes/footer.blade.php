<footer class="bg-dark text-white pt-5 pb-3 mt-5 border-top border-warning border-3 mb-0">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start justify-content-between">

            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto text-center">
                <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-2 mb-3 shadow" width="120" height="120" alt="The Good Taste Logo" style="object-fit: contain;">
                <h5 class="text-uppercase fw-bold text-warning estilo-marca">The Good Taste</h5>
                <p>Comida de verdad, con ingredientes reales y mucho cariño.</p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Encuéntranos</h6>
                <p><i class="bi bi-geo-alt-fill me-2 text-warning"></i> Calle 9 de Julio 392.</p>
                <p><i class="bi bi-globe-americas me-2 text-warning"></i> Corrientes, Argentina. CP 3400.</p>
                <p><i class="bi bi-envelope-fill me-2 text-warning"></i> thegoodtaste@gmail.com</p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center text-md-start">
                <h6 class="text-uppercase fw-bold mb-4 border-bottom border-warning pb-2">Nuestras Redes</h6>
                <div class="d-flex justify-content-center justify-content-md-start gap-4 fs-2 mt-3">
                    <a href="https://instagram.com/elevate.dis" target="_blank" class="text-white text-decoration-none">
                        <i class="bi bi-instagram hover-warning"></i>
                    </a>
                    <a href="https://facebook.com/adrian.obregon.3701/" target="_blank" class="text-white text-decoration-none">
                        <i class="bi bi-facebook hover-warning"></i>
                    </a>
                    <a href="https://wa.me/5493794000000" target="_blank" class="text-white text-decoration-none">
                        <i class="bi bi-whatsapp hover-warning"></i>
                    </a>
                </div>
            </div>

        </div>
        <button id="btnArriba" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="position: fixed; bottom: 20px; right: 20px; display: none; z-index: 1050; border: none; background: transparent; color: #ffc107; font-size: 2rem;">
            <i class="bi bi-arrow-up-circle-fill"></i>
        </button>

        <script>
            window.addEventListener('scroll', () => {
                const btn = document.getElementById('btnArriba');
                btn.style.display = window.scrollY > 300 ? 'block' : 'none';
            });
        </script>

        <hr class="mb-4 text-secondary">
        <div class="row text-center text-secondary" style="font-size: 0.9rem;">
            <div class="col-12">
                <p class="mb-1">© 2026 The Good Taste. Todos los derechos reservados.</p>
                <p class="mb-0">Titular: Obregón Adrian, Perone Tiziano. | Razón Social: The Good Taste S.R.L. | Domicilio Legal: Calle 9 de Julio 392, Corrientes</p>
            </div>
        </div>
    </div>
</footer>