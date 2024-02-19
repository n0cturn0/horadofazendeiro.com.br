<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de pagamento</title>
</head>
<body>
    

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("TEST-159e692f-db10-412d-8224-3456b7febb9b");
      </script>

      
  <form id="form-checkout" action="{{ route('pacote-pagamento') }}" method="post">
    @csrf
    <div>
      <div>
        <label for="payerFirstName">Nome</label>
        <input id="form-checkout__payerFirstName" name="payerFirstName" type="text">
      </div>
      <div>
        <label for="payerLastName">Sobrenome</label>
        <input id="form-checkout__payerLastName" name="payerLastName" type="text">
      </div>
      <div>
        <label for="email">E-mail</label>
        <input id="form-checkout__email" name="email" type="text">
      </div>
      <div>
        <label for="identificationType">Tipo de documento</label>
        <select id="form-checkout__identificationType" name="identificationType" type="text"></select>
      </div>
      <div>
        <label for="identificationNumber">Número do documento</label>
        <input id="form-checkout__identificationNumber" name="identificationNumber" type="text">
      </div>
    </div>

    <div>
      <div>
        <input type="hidden" name="transactionAmount" id="transactionAmount" value="100">
        <input type="hidden" name="description" id="description" value="Nome do Produto">
        <br>
        <button type="submit">Pagar</button>
      </div>
    </div>
  </form>
  <script type="text/javascript">

(async function getIdentificationTypes() {
      try {
        const identificationTypes = await mp.getIdentificationTypes();
        const identificationTypeElement = document.getElementById('form-checkout__identificationType');

        createSelectOptions(identificationTypeElement, identificationTypes);
      } catch (e) {
        return console.error('Error getting identificationTypes: ', e);
      }
    })();

    function createSelectOptions(elem, options, labelsAndKeys = { label: "name", value: "id" }) {
      const { label, value } = labelsAndKeys;

      elem.options.length = 0;

      const tempOptions = document.createDocumentFragment();

      options.forEach(option => {
        const optValue = option[value];
        const optLabel = option[label];

        const opt = document.createElement('option');
        opt.value = optValue;
        opt.textContent = optLabel;

        tempOptions.appendChild(opt);
      });

      elem.appendChild(tempOptions);
    }

</script>

</body>
</html>