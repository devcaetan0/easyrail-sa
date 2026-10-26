# Relatório Do Uso da IA Entrega 10


## API De CEP

Foi usado o chatpt como IA de apoio.

### Prompts

Como desenvolver uma API de consulta e validação de CEP na easyrail um site desenvolvido em PHP, html, CSS, javascritpt e bootstrap. 
Uma API que preeche todos os dados automaticamente.

Como deixar o formulário mais bonito e organizado. Como deixar o cep e estado lado a lado com boostrap.


### Objetivo e Observações

O objetivo principal do primeiro prompt foi desenvolver toda a API e a sua funcionalidade que é preencher os todos os dados rua, bairro, cidade e estado conforme o CEP do usuário.

O uso do segundo prompt o principal objetivo foi deixar o site mais organizado e bonito.


Não houve erros e a aplicação da API com o auxilio da IA foi bem sucedida, e o teste foi executado com CEP's comuns achados na internet e de alguns colegas de sala.

### Alterações da equipe no código

Tivemos que implementar vários dados novos no formulário html, como o próprio CEP, estado, cidade, bairro e logadouro. Também além disso implementamos toda a funcionalidade da API no javascript.

### Código (javascript = utilizando a IA)

const campoCep = document.getElementById("cep");
const mensagemCep = document.getElementById("mensagemCep");

if (campoCep) {
    campoCep.addEventListener("blur", consultarCep);
}

async function consultarCep() {
    const cep = campoCep.value.replace(/\D/g, "");

    mensagemCep.textContent = "";

    if (cep.length === 0) {
        limparEndereco();
        return;
    }

    if (!/^\d{8}$/.test(cep)) {
        limparEndereco();
        mensagemCep.textContent = "Digite um CEP com 8 números.";
        return;
    }

    mensagemCep.textContent = "Consultando CEP...";

    try {
        const resposta = await fetch(
            `https://viacep.com.br/ws/${cep}/json/`
        );

        if (!resposta.ok) {
            throw new Error("Falha na consulta");
        }

        const dados = await resposta.json();

        if (dados.erro) {
            limparEndereco();
            mensagemCep.textContent = "CEP não encontrado.";
            return;
        }

        document.getElementById("logradouro").value =
            dados.logradouro || "";

        document.getElementById("bairro").value =
            dados.bairro || "";

        document.getElementById("cidade").value =
            dados.localidade || "";

        document.getElementById("estado").value =
            dados.uf || "";

        mensagemCep.textContent = "Endereço preenchido com sucesso.";

    } catch (erro) {
        limparEndereco();
        mensagemCep.textContent =
            "Erro ao consultar. Verifique sua conexão e tente novamente.";
    }
}

function limparEndereco() {
    document.getElementById("logradouro").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("estado").value = "";
}






## API de Meteorologia

Foi usado o Google Gemini:

### Prompts

Faz um código que puxa a API mais fácil de ser utilizada que mostre a temperatura e o estado do clima se possível

### Objetivo e Observações

O objetivo principal é realizar a funcionalidade requisitada pela entrega:

* Informações meteorológicas obtidas pela API de clima.

Não houveram erros e nem limitações durante a execução da IA, e o teste executado foi somente com a visualização da funcionalidade ativa, com administrador e usuário

### Alterações da equipe no código

Tiramos emojis e mudamos um pouco a descrição dos estados do clima, além de também colocamos a localização fixa de Joinville/Bucarein para adaptar ao bloqueio que o SESI dá à localização dos computadores.

### Código

const lat = -26.307058;
const lon = -48.839269;

function traduzirClima(codigo) {
    const condicoes = {
        0: 'Ensolarado / Céu limpo',
        1: 'Predominantemente ensolarado',
        2: 'Parcialmente nublado',
        3: 'Nublado',
        45: 'Nevoeiro',
        48: 'Nevoeiro',
        51: 'Chuvisco leve',
        53: 'Chuvisco moderado',
        55: 'Chuvisco denso',
        61: 'Chuva fraca',
        63: 'Chuva moderada',
        65: 'Chuva forte',
        80: 'Pancadas de chuva',
        81: 'Pancadas de chuva fortes',
        82: 'Chuva violenta',
        95: 'Trovoada'
    };
    return condicoes[codigo] || 'Condição desconhecida';
}

fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,weather_code`)
    .then(res => res.json())
    .then(data => {
        const temp = data.current.temperature_2m;
        const unidade = data.current_units.temperature_2m;
        const codigoClima = data.current.weather_code;

        document.getElementById('temperatura').innerText = `${temp}${unidade}`;
        document.getElementById('condicao').innerText = traduzirClima(codigoClima);
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('condicao').innerText = 'Erro ao carregar clima';
    });


