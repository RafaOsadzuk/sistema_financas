const saldoText = document.getElementById('saldoText');
const saldoInput = document.getElementById('saldoInputButton');


saldoInput.addEventListener('click', function() {
   
    const input = document.createElement('input');
    input.type = 'text';

  
    input.addEventListener('keydown', function(event) {
        
        if (!(/[0-9]/.test(event.key) || event.key === 'Enter' || event.key === 'Backspace' || event.key === 'ArrowLeft' || event.key === 'ArrowRight')) {
       
            alert('Apenas números são permitidos.');
            event.preventDefault();
        }
        
        
        if (event.key === 'Enter') {
            adicionarSaldo(input.value);
        }
        
        
    });

    
    saldoText.removeChild(saldoInputButton);
    saldoText.appendChild(input);

   
    input.focus();
});

function adicionarSaldo(valor) {
    
    console.log('Saldo adicionado:', valor);

   
    const novoTexto = document.createElement('span');
    novoTexto.textContent = 'Saldo adicionado: ' + valor;
    
    saldoText.textContent = ''; 
    saldoText.appendChild(novoTexto);
    
    
    const novoBotao = document.createElement('button');
    novoBotao.textContent = 'cadastrar Saldo';
    novoBotao.id = 'saldoInputButton';
    
    
    novoBotao.addEventListener('click', function() {
        saldoText.textContent = 'Saldo: ';
        saldoText.appendChild(novoBotao);
    });
}