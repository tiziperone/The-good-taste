@props(['url'])
<tr>
    <td class="header" style="text-align: center; padding: 25px 0;">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel' || trim($slot) === 'The Good Taste')
            {{-- Si la notificación nos manda el logo listo, lo muestra. Si no, muestra el texto --}}
            @if(isset($logo_embed))
            <img src="{{ $logo_embed }}" class="logo" alt="The Good Taste" style="height: 80px; width: auto; display: block; margin: 0 auto;">
            @else
            <span style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; color: #2b2b2b; letter-spacing: 1px;">
                The <span style="color: #ff6b6b;">Good</span> Taste
            </span>
            @endif
            @else
            {!! $slot !!}
            @endif
        </a>
    </td>
</tr>