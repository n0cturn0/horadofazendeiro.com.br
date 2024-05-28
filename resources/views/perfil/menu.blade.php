<li><a href="setting.html">Comprar créditos</a></li>
<li><a href="{{ url('/anuncio/meusanuncios/') }}">Meus Anúncios</a></li>
<li><a href="{{ url('anuncio/store') }}">Adicionar Anúncio</a></li>

{{-- <li><a href="ad-post.html">ad post</a></li> --}}


<li><a  href="{{ url('/profile') }}">Perfil</a></li>
{{-- <li><a href="bookmark.html">bookmarks</a></li>
<li><a href="message.html">message</a></li>
<li><a href="notification.html">notification</a></li> --}}
<li><form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form></li>