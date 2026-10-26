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