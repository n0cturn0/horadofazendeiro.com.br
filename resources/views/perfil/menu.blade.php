<li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
     href="setting.html">Comprar créditos</a></li>
<li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
     href="{{ url('/anuncio/meusanuncios/') }}">Meus Anúncios</a></li>
<li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
     href="{{ url('anuncio/store') }}">Adicionar Anúncio</a></li>
<li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
     href="{{ url('/profile') }}">Perfil</a></li>
<li>
  <form method="POST"
        action="{{ route('logout') }}"
        class="block">
    @csrf
    <x-dropdown-link :href="route('logout')"
                     class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
                     onclick="event.preventDefault(); this.closest('form').submit();">
      {{ __('Log Out') }}
    </x-dropdown-link>
  </form>
</li>
