@if (session()->has('success'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      Swal.fire('Sucesso', "{{ session('success') }}", 'success');
    });
  </script>
@endif
@if (session()->has('credit'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      Swal.fire('Créditos', "{{ session('credit') }}", 'error');
    });
  </script>
@endif


@if ($errors->any())
  @php
    $mensagem = '';
    foreach ($errors->all() as $error) {
        $mensagem .= htmlspecialchars($error) . '<br>';
    }
  @endphp
  @if ($errors->any())
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        Swal.fire('Erro!', "{!! e($mensagem) !!}", 'error');
      });
    </script>
  @endif
@endif
