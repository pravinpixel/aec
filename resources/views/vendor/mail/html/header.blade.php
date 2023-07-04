<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'AECPrefab')
                <img src="{{ asset('public/logo-mail.png') }}" style="wi" class="logo" alt="AECPrefab Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
