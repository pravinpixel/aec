<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'AECPrefab')
                <img src="{{ asset('public/logo-mail.png') }}" class="logo" alt="AECPrefab">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
