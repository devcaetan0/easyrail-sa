# Manual do Usuário EasyRail

**TÉCNICO EM DESENVOLVIMENTO DE SISTEMAS INTEGRADO AO ENSINO MÉDIO**

**Professora:**
- Djeniffer C. M. Esmeraldino

**Equipe:**
- Antonio R. Neto
- Davi B. Caetano
- Gabriel M. Ribeiro
- Rafael C. Descher

---

## Sumário

1. [Identificação](#identificação) (pág. 3)
2. [Introdução](#introdução) (pág. 4)
3. [Instruções de Uso](#instruções-de-uso) (pág. 5)
4. [Dicas e boas práticas](#dicas-e-boas-práticas) (pág. 6)
5. [Solução de Problemas (FAQ)](#solução-de-problemas-faq) (pág. 7)
6. [Suporte e Contatos](#suporte-e-contatos) (pág. 8)

---

## Identificação

- **Nome do Produto:** EasyRail
- **Versão:** 1.0
- **Fabricante:** Antônio, Davi, Gabriel e Rafael.

<br>

<img src="../assets/images/logo-negative.png" width="30%">

<br>

---

## Introdução

Este documento apresenta o nosso sistema de controle ferroviário. A proposta deste projeto é desenvolver uma plataforma que permita aos usuários acessar informações vindas de sensores presentes nos trens, nos trilhos e no ambiente, viabilizando uma análise precisa do desempenho no transporte de cargas. Nesse contexto, o sistema tem como público-alvo gestores logísticos, operadores de tráfego ferroviário, equipes de manutenção e demais profissionais do setor de transportes que necessitam de dados ágeis para a tomada de decisão. Trata-se de uma situação de aprendizagem cujo objetivo é aplicar, na prática, o desenvolvimento de sites e demonstrar o conhecimento adquirido ao longo dos anos letivos. O nome do sistema foi escolhido em consenso pela equipe, refletindo o desejo de criar uma ferramenta simples, funcional e agradável para os usuários. Quanto à identidade visual, optamos por cores marcantes para evidenciar o nosso diferencial e trazer uma proposta inovadora.

---

## Instruções de Uso

### 1. Tela de Login

<br>

<img src="../assets/images/manual/login_manual.png" width="40%">

<br>

Aqui você efetuará o login do site; os seus dados devem ter sido cadastrados pelo administrador para conseguir concluir esta ação. Caso consiga entrar como funcionário, irá aparecer a tela home do EasyRail (login efetuado como operador neste exemplo).

---

### 2. Tela Home

<br>

<img src="../assets/images/manual/home_user.png" width="40%">

<br>

Após realizar o login (como operador), você irá para a tela home do site, onde pode acessar todas as suas telas com apenas um clique. Vamos acessar por ordem, sendo a primeira a tela de Dashboard.

Vamos agora para a próxima página, a de Frota de Cargas, clicando em “Frota de Cargas” nos atalhos na NavBar.

---

### 3. Tela Frota de Carga

<br>

<img src="../assets/images/manual/frota_user.png" width="40%">

<br>

Aqui podemos gerenciar toda a parte de rotas do site, podendo ver quais estão ativas, além de futuramente conseguir baixar relatórios. Vamos agora para a próxima página:

---

### 4. Tela de Sensores

<br>

<img src="../assets/images/manual/sensor_user.png" width="40%">

<br>

Aqui temos a tela de sensores para analisar e mapear o que cada sensor está fazendo no momento, podendo atualizar e pesquisar caso necessário.

---

### 4. Tela de Rotas

<br>

<img src="../assets/images/manual/rotas_user.png" width="40%">

<br>

Aqui temos a tela de Rotas para analisar e verificar como está a situação no mapa dos trens no momento, podendo atualizar e pesquisar caso necessário.

---

## Instruções de Uso (como administrador)

### 2. Tela Home

<br>

<img src="../assets/images/manual/home_admin.png" width="40%">

<br>

Após realizar o login (como administrador), você irá para a tela home do site, onde pode acessar todas as suas telas com apenas um clique, além da tela de equipe, que você possui acesso agora. Vamos acessar por ordem, sendo a primeira a tela de Dashboard.

---

### 3. Tela Frota de Carga

<br>

<img src="../assets/images/manual/frota_manual.png" width="40%">

<br>

Aqui podemos gerenciar toda a parte de rotas do site, podendo ver quais estão ativas, além de futuramente conseguir baixar relatórios e, como estamos de administrador, podemos adicionar frotas de cargas.

Clicando no botão “adicionar locomotiva”, receberemos um popup no qual nos dá opções de configuração de uma locomotiva:

<br>

<img src="../assets/images/manual/frota_add_manual.png" width="30%">

<br>

Aqui você pode configurar sua locomotiva antes de adicioná-la ao seu banco de dados.

É assim que aparecerá na tabela do site. Aqui você tem duas opções, sendo a de excluir, para excluir o item do sistema, e a opção de editar, no qual clicando aparecerá um popup, no qual podemos alterar as informações do trem que selecionamos. Vamos para a próxima página.

<br>

<img src="../assets/images/manual/frota_tabela_manual.png" width="40%">

<br>

---

### 4. Tela de Rotas

<br>

<img src="../assets/images/manual/rotas_manual.png" width="40%">

<br>

Aqui temos a tela de Rotas para analisar e verificar como está a situação no mapa dos trens no momento, podendo atualizar e pesquisar caso necessário, além de conseguirmos adicionar uma rota. Clicando no botão de adicionar rota, aparece um popup na nossa tela.

<br>

<img src="../assets/images/manual/rota_add_manual.png" width="20%">

<br>

Aqui fica a parte de adicionar uma rota. Após preencher os campos e clicar em adicionar, aparecerá assim na tabela:

<br>

<img src="../assets/images/manual/rota_tabela_manual.png" width="40%">

<br>

---

### 5. Tela de Sensores

<br>

<img src="../assets/images/manual/sensores_manual.png" width="40%">

<br>

Aqui temos a tela de sensores para analisar e mapear o que cada sensor está fazendo no momento, podendo atualizar e pesquisar caso necessário, além de conseguirmos adicionar um sensor. Clicando no botão de adicionar sensor, aparece um popup na nossa tela.

<br>

<img src="../assets/images/manual/sensor_add_manual.png" width="20%">

<br>

Ao ser registrado, o sensor aparecerá na tabela parecido com esse modelo:

<br>

<img src="../assets/images/manual/sensor_tabela_manual (2).png" width="50%">

<br>

Aqui você também tem a opção de excluir, no qual exclui do banco de dados o sensor desejado, e editar, no qual abre um popup igual o de cadastro que altera as informações quando clicado em salvar sensor. Vamos para a próxima página:

---

### 6. Tela Usuários

<br>

<img src="../assets/images/manual/usuario_manual.png" width="40%">

<br>

Aqui nesta tela você tem acesso a toda gestão de usuários; aqui somente o administrador pode cadastrar, editar ou excluir usuários. Na aba lateral, temos a parte de cadastro de usuários, onde podemos escolher as informações e cadastrar ele no banco de dados.

<br>

<img src="../assets/images/manual/usuario_tabela_manual.png" width="50%">

<br>

Temos a opção de excluir um usuário aqui, que exclui o usuário do banco de dados, e a opção de editar, que abre um popup de edição de dados, que abre os dados do usuário que selecionamos e nos dá a opção de alterar o que quisermos.

---

## Dicas e boas práticas

Orientações básicas para o bom uso do sistema:

- **Uso Seguro:** Nunca compartilhar seu usuário e senha com outros colaboradores.
- **Bloqueio de Tela:** Certifique-se de que sempre bloqueou a tela para pessoas com menos acesso; não exclua e edite dados. Isso impede que pessoas sem o nível adequado de acesso visualizem ou editem dados sensíveis.
- **Cuidados:** Cuidado com a exclusão de dados; verifique se realmente é necessário apagar algo.
- **Consciência de Permissões:** O sistema registra quem faz cada alteração. Navegue dentro das permissões do seu perfil (operador, gestor ou administrador) e evite utilizar dispositivos com logins de terceiros abertos.
- **Salvamento de Edições:** Ao alterar informações na "Tela Frota de Carga" ou atualizar parâmetros na "Tela de Sensores", sempre revise os dados digitados e aguarde a mensagem de confirmação após clicar em salvar, antes de mudar de aba.
- **Monitoramento Ativo:** Crie o hábito de verificar a "Tela Dashboard" no início e no final do seu turno. Como o sistema depende de dados IoT em tempo real, acompanhar a visão geral ajuda a identificar rapidamente sensores desconectados ou rotas paralisadas.
- **Geração de Relatórios:** Ao baixar relatórios de desempenho, certifique-se de que sua conexão de internet está estável para evitar downloads corrompidos, especialmente ao extrair dados de longos períodos.

---

## Solução de Problemas (FAQ)

**1. Não consigo cadastrar uma nova locomotiva, sensor ou trecho de via. O que devo fazer?**
Verifique se todos os campos obrigatórios do formulário estão preenchidos corretamente. Além disso, confirme se o seu perfil de usuário possui as permissões necessárias (como perfil de Gestor ou Administrador) para adicionar novos registros no sistema.

**2. Editei os dados de um equipamento, mas as informações não foram salvas. O que pode ser?**
Isso costuma ocorrer devido a oscilações na conexão de internet no momento de salvar ou se o sistema identificar alguma informação inválida nos campos digitados. Atualize a página, refaça a edição com atenção a todos os dados e clique em "Salvar". Se o problema persistir, comunique o suporte.

**3. O sistema exibe um erro e não permite excluir um trem ou sensor cadastrado. Por quê?**
Por motivos de segurança e para manter o histórico de dados intacto, o sistema bloqueia a exclusão de qualquer equipamento que já tenha informações operacionais vinculadas a ele. Por exemplo: não é possível excluir um trem que já realizou viagens ou um sensor que já enviou dados de leitura. Nesses casos, a recomendação é inativar o item no sistema em vez de excluí-lo.

**4. Em que momento a tecnologia IoT (Internet das Coisas) entra em funcionamento no projeto?**
A IoT entra na fase de monitoramento ativo e em tempo real. Ela é representada pelos dispositivos físicos instalados nas locomotivas (embarcados) e ao longo das vias férreas. Esses equipamentos coletam dados reais, como temperatura, velocidade e os transmitem automaticamente pela internet para o sistema, atualizando os dados automaticamente.

**5. Não consigo vincular um sensor a uma locomotiva ou a um projeto de rota. Como proceder?**
Um sensor precisa ser associado ao local correto de sua instalação. Verifique se você não está tentando vincular um sensor de via fixa (como um medidor de pressão do trilho) a uma locomotiva em movimento, ou vice-versa. Certifique-se também de que o trem ou trecho de destino já foi devidamente cadastrado no sistema antes de tentar criar o vínculo.

**6. Esqueci minha senha ou não consigo acessar minha conta. O que faço?**
Contate o suporte, que possui permissões de administrador, para alterar diretamente a sua senha conforme suas especificações. Segue o contato no documento para realizar a atualização dos dados do usuário caso seja necessário.

**7. Onde e como posso entrar em contato com a equipe de suporte?**
Para relatar problemas técnicos, solicitar novos acessos ou tirar dúvidas que não estão neste manual, você pode contatar a equipe do sistema para abrir um chamado ou enviar um e-mail diretamente para o endereço de atendimento oficial do projeto.

**8. Os gráficos do painel de controle (Dashboard) estão vazios. Como resolver?**
Os gráficos dependem da recepção contínua de dados da tecnologia IoT. Se eles estiverem em branco, isso indica que os sensores físicos estão desligados, em manutenção ou perderam a conexão com a rede. Aguarde alguns instantes ou notifique a equipe de manutenção de campo para verificar o status dos dispositivos.

**9. O que significam os alertas de status "Alerta" e "Falha" nos sensores?**
O status de Alerta avisa que o sensor continua funcionando, mas registrou uma medida que foge do padrão de segurança (como o motor de um trem aquecendo acima do limite). O status de Falha indica que o sistema perdeu a comunicação com aquele dispositivo ou que ele está emitindo leituras inconsistentes, exigindo reparo físico.

---

## Suporte e Contatos

### Contatos

| Nome | E-mail | Telefone | Local |
| :--- | :--- | :--- | :--- |
| Davi Batista Caetano | davi_caetano@estudante.sesisenai.org.br | +55 47 12345-678910 | Joinville |
| Rafael Calegari Descher | rafael_descher@estudante.sesisenai.org.br | +55 47 12345-678910 | Joinville |
| Gabriel Maciel Ribeiro | gabriel_ribeiro16@estudante.sesisenai.org.br | +55 47 12345-678910 | Joinville |
| Antonio Ribeiro Neto | antonio_ribeiro-n@estudante.sesisenai.org.br | +55 47 12345-678910 | Joinville |