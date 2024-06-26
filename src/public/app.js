// criar input para adicionar saldo do usuario
const saldoText = document.getElementById('saldoText');
const saldoInput = document.getElementById('saldoInput');

saldoInput.addEventListener('click', function() {
    const input = document.createElement('input');
    input.type = 'number'; 

    input.addEventListener('keydown', function(event) {
      
        if (!(/[0-9\.]/.test(event.key) || event.key === 'Enter' || event.key === 'Backspace' || event.key === 'ArrowLeft' || event.key === 'ArrowRight')) {
            alert('Apenas números são permitidos.');
            event.preventDefault();
        }

       
        if (event.key === '.' && input.value.includes('.')) {
            alert('Apenas um ponto decimal é permitido.');
            event.preventDefault();
        }

        
        if (event.key === 'Enter') {
            adicionarSaldo(input.value);
        }
    });

    saldoText.removeChild(saldoInput);
    saldoText.appendChild(input);

    input.focus();
});

function adicionarSaldo(saldo) {
   
    if (isNaN(parseFloat(saldo))) {
        alert('Por favor, insira um valor numérico válido.');
        return;
    }

    
    saldo = parseFloat(saldo).toFixed(2);

    console.log('Saldo adicionado:', saldo);

    const novoTexto = document.createElement('span');
    novoTexto.textContent = 'Saldo: ' + saldo;

    saldoText.textContent = ''; 
    saldoText.appendChild(novoTexto);

    const novoBotao = document.createElement('button');
    novoBotao.textContent = 'cadastrar Saldo';
    novoBotao.id = 'saldoInput';

    novoBotao.addEventListener('click', function() {
        saldoText.textContent = 'Saldo: ';
        saldoText.appendChild(novoBotao);
    });
}


//adiciona receita em uma tabela

document.getElementById('formReceita').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const receitaId = document.getElementById('id').value;
    const valor = document.getElementById('valor').value;
    const data = document.getElementById('data').value;
    const descricao = document.getElementById('descricao').value;
    const categoria = document.getElementById('categoria').value;

 
    const novaReceita = {
        id: id,
        valor: parseFloat(valor),
        data: data,
        descricao: descricao,
        categoria: categoria
    };

   
    console.log('Nova Receita Adicionada:', novaReceita);


    document.getElementById('formReceita').reset();
    

    alert('Receita adicionada com sucesso!');
});