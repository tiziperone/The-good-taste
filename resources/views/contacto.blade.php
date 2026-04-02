<form action="{{ url('/contacto') }}" method="POST">
    @csrf <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Tu nombre">
    </div>

    <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" placeholder="nombre@ejemplo.com">
    </div>

    <div class="mb-3">
        <label class="form-label">Mensaje</label>
        <textarea name="mensaje" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
</form>