function buscarCep() {
    var cep = $('#cep').val();

    if (cep) {
        // Faz a requisição AJAX para viacep.com.br
        $.ajax({
            type: 'GET',
            url: 'https://viacep.com.br/ws/' + cep + '/json/',
            success: function (data) {
                // Atualiza campos do formulário com os dados do CEP
                $('input[name="logradouro"]').val(data.logradouro);
                $('input[name="bairro"]').val(data.bairro);
                $('input[name="cidade"]').val(data.localidade);
                $('input[name="estado"]').val(data.uf);
            },
            error: function (error) {
                console.error('Erro na requisição AJAX', error);
            }
        });
    }
}