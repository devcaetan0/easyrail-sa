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