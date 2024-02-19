@if(session()->has('error'))
    <script>
        document.addEventListener('DOMContentLoaded',() => {
            Swal.fire('Opps', "{{ session('error') }}", 'error');
        });
    </script>
@endif