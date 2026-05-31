<!DOCTYPE html>
<html>

<body>
    <p>Hola <strong>{{ $consulta->nombre }}</strong>,</p>
    <p>Hemos recibido tu consulta sobre: "{{ $consulta->asunto }}".</p>
    <p><strong>Nuestra respuesta:</strong></p>
    <div style="background: #f4f4f4; padding: 10px; border-left: 4px solid #ffc107;">
        {{ $respuesta }}
    </div>
    <br>
    <p>Gracias por contactar a <strong>The Good Taste</strong>.</p>
</body>

</html>