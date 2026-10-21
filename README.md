# EasyRail

A proposta do trabalho deste repositório é desenvolver um sistema de controle ferroviário para que os usuários tenham acesso a informações vindas dos sensores presentes nos trens, nos trilhos e no ambiente, permitindo uma melhor análise do desempenho do envio de cargas. Este projeto é uma proposta de situação de aprendizagem para aprendermos a desenvolver sites na prática e demonstrar o conhecimento adquirido durante os anos letivos. Nós escolhemos esse nome em um consenso da equipe, pois queríamos fazer um trabalho simples, mas que funcionasse e fosse prazeroso para os usuários utilizarem. Quanto à nossa identidade visual, escolhemos cores marcantes para demonstrar o nosso diferencial em relação a outros sites e ser algo inovador.


## Identidade Visual e Documentação

Nosso Mockup foi focado em fazer um site com uma identidade visual diferente mas também não ser feio e o principal foco de toda nossa equipe era fácil um site fácil de entender e utiliza-lo.

* **Mockup:** [Acesse o Mockup no Canva](https://canva.link/aqv7k248a5vx4wy)


* **Documentação Oficial**: [Google Docs do Projeto](https://docs.google.com/document/d/1MB7gOFvf_L-3unkxo9Xj64JbBwdSI_qu04njbLAZorc/edit?usp=sharing)



## Regras de Negócio

| ID | Descrição |
| :--- | :--- |
| **RN01** | Para acessar o aplicativo é necessário que o usuário seja cadastrado. |
| **RN02** | Todo sensor deve ser cadastrado no sistema. |
| **RN03** | O sistema ferroviário deve ser monitorado em tempo real. |
| **RN04** | Os dados que devem ser capturados são: velocidade, localização, consumo de energia e detecção de falhas por meio de sensores IoT. |
| **RN05** | Disponibilizar o gerenciamento dos sensores e suas informações. |
| **RN06** | É necessário a geração de relatórios analíticos. |
| **RN07** | Os históricos de relatórios precisam aparecer para o usuário. |
| **RN08** | Sensores com dados registrados não podem ser excluídos. |
| **RN09** | Disponibilizar um dashboard contendo os dados dos sensores para a análise visual das informações. |
| **RN10** | Todo trem deve ser cadastrado no sistema. |
| **RN11** | A listagem de sensores cadastrados deve conter: ID do sensor, localização, tipo de dado, botão de exclusão e de visualização dos detalhes. |
| **RN12** | Disponibilizar o gerenciamento dos trens e suas informações. |
| **RN13** | Disponibilizar a saída do aplicativo. |

## Estrutura do Diretório

```text
devcaetan0-easyrail-sa/
├── README.md
├── index.php
├── LICENSE
├── assets/
│   └── css/
│       └── style.css
├── components/
│   ├── cards.php
│   ├── navbar.php
│   └── modals/
│       ├── add/
│       │   ├── frota-add.php
│       │   ├── rota-add.php
│       │   ├── sensor-add.php
│       │   └── usuario-add.php
│       └── edit/
│           ├── frota-edit.php
│           ├── rota-edit.php
│           ├── sensor-edit.php
│           └── usuario-edit.php
├── config/
│   ├── bootstrap.html
│   ├── conexao.php
│   └── links.html
├── database/
│   └── db.sql
├── pesquisas/
│   ├── apis.md
│   ├── crud.md
│   ├── pdo.md
│   ├── scrum.md
│   └── xampp.md
├── public/
│   ├── dashboard.php
│   ├── frota.php
│   ├── home.php
│   ├── relatorios.php
│   ├── rotas.php
│   ├── sensores.php
│   └── usuarios.php
├── scripts/
│   ├── frota.js
│   ├── navbar.js
│   ├── relatorios.js
│   ├── rotas.js
│   ├── sensores.js
│   └── usuarios.js
└── source/
    ├── auth-login.php
    ├── create/
    │   ├── frota-create.php
    │   ├── rota-create.php
    │   ├── sensor-create.php
    │   └── usuario-create.php
    ├── delete/
    │   ├── frota-delete.php
    │   ├── rota-delete.php
    │   ├── sensor-delete.php
    │   └── usuario-delete.php
    └── update/
        ├── frota-update.php
        ├── rota-update.php
        ├── sensor-update.php
        └── usuario-update.php
```

## Diagrama 

[![Architecture diagram of devcaetan0/easyrail-sa](https://gitdiagram.com/devcaetan0/easyrail-sa/diagram.png)](https://gitdiagram.com/devcaetan0/easyrail-sa?utm_source=readme&utm_medium=picture)


## Requisitos Funcionais

| ID | Descrição |
| :--- | :--- |
| **RF01** | O sistema deve permitir o cadastro do usuário. |
| **RF02** | O sistema deve permitir ao administrador cadastrar sensores. |
| **RF03** | O sistema deve permitir ao administrador editar sensores. |
| **RF04** | O sistema deve permitir ao administrador excluir sensores. |
| **RF05** | O sistema deve permitir ao administrador visualizar detalhes dos sensores. |
| **RF06** | O sistema deve permitir ao administrador cadastrar trens. |
| **RF07** | O sistema deve permitir ao administrador editar trens. |
| **RF08** | O sistema deve permitir ao administrador excluir trens. |
| **RF09** | O sistema deve permitir ao administrador visualizar detalhes dos trens. |
| **RF10** | O sistema deve permitir que um sensor com dados não seja excluído. |
| **RF11** | O sistema deve exibir uma mensagem de erro em caso de exclusão de um sensor que contém dados. |
| **RF12** | O sistema deve permitir gerar gráficos analíticos. |
| **RF13** | O sistema deve permitir gerar relatórios analíticos. |
| **RF14** | O sistema deve permitir exibir o histórico dos relatórios. |
| **RF15** | O sistema deve permitir a geração de um dashboard analítico. |
| **RF16** | O sistema deve permitir a pesquisa de relatórios cadastrados. |
| **RF17** | O sistema deve permitir a saída do aplicativo. |


## Requisitos Não Funcionais

| ID | Descrição |
| :--- | :--- |
| **RNF01** | O sistema deve enviar todos os dados ao banco de dados central. |
| **RNF02** | O sistema deve fornecer os dados dos sensores em menos de 10 segundos. |
| **RNF03** | O sistema deve ter um Uptime de 99%. |
| **RNF04** | Todos os dados sensíveis devem ser armazenados utilizando criptografia. |
| **RNF05** | O software deve ser compatível com o Chrome, Firefox e Edge. |
| **RNF06** | O sistema deve ser responsivo (adaptado para dispositivos móveis e desktop). |
| **RNF07** | O sistema ao exibir histórico de relatórios deve filtrar por tipo de falha e período que foi registrado. |
| **RNF08** | O sistema deve monitorar em tempo real as ferrovias. |
| **RNF09** | O sistema deve ter tolerância a falhas de conexão temporária dos sensores. |
| **RNF10** | O sistema deve emitir alertas automáticos em casos de falhas graves. |
| **RNF11** | Os dados dos sensores devem ser armazenados diariamente por meio de backups. |



## Tecnologias Utilizadas

O sistema do frontend foi construído utiizando as seguintes tecnologias:

* **HTML** - Estrturação sêmantica das páginas.
* **CSS** - Estilização e identidade visual personalizada.
* **Javascript** - Comportamentos dinâmicos, consumo de dados e interatividade.
* **Bootstrap** - Agilidade no design e padronização.



## Estrutura do Sistema:

Para desenvolver o sistema, utilizaremos HTML, CSS, Javascript e Bootstrap, para que cumpra as seguintes funções:

1. **Dashboard:** Painel principal com gráficos e os dados mais críticos dos trens e sensores.
2. **Frota:** Listagem e gerenciamento de todos os treins e suas respectivas rotas.
3. **Sensores:** Tela para cadastro, gereciamento e listagem de todos os sensores.
4. **Relátorios:** Histórico de dados gerados pelos sensores e das rotas realizadas pelos trens.
5. **Funcionários:** Tela interativa para cadastrar novos funcionários e listagem dos funcionários.
6. **Login:** Tela interativa para realizar login.
7. **Home:** Página interativa que mostra todas as outras possíveis abas no sistema.


 
## Funcionalidades Das Principais Páginas


### Página de Funcionários

Área restrita contendo um formulário completo para preenchimento de:

* Nome de Usuário
* Email Institucional
* Senha 
* Setor

E uma listagem completa de todos os funcionários cadastrados no sistema com os seguintes dados:

* ID funcionário
* Nome
* Setor
  

### Página de Login

A página de login é bem simples somente contento o nome do usuário e a senha.



### Página Dashboard

A página de Dashboard terá todas as informações importantes e dados dos trens e sensores.



### Página de Sensores

Área contendo toda listagem dos sensores e um botao para adicionar novos sensores:

* ID Sensor
* Nome Sensor
* Responsável
* Tipo
* Localização

Pop-up Cadastrar Novo Sensor contendo:

* Nome
* Responsável
* Tipo
* Localização



## Metodologias De Desenvolvimento: 

Para garantir a eficiência e entrega contínua do projeto, escolhemos adotar duas metodologias de desenvolvimento de software: Kanban e Scrum.


### Kanban

Utilizaremos o Kanban como nosso principal suporte para gerenciar as tarefas visualmente e organizar as tarefas individualmente.

* "A fazer"
* "Em progresso"
* "Revisão"
* "Entregue"


### Scrum

Utilizaremos o Scrum como um suporte ao Kanban. Utilizaremos o Scrum: com as Sprints e reuniões, conseguiremos organizar o fluxo de trabalho, o pensamento e o alinhamento de todo o projeto. Além disso, com o Scrum e através das Sprints, conseguimos ver os pontos que nós temos que melhorar no trabalho. Assim, vamos melhorando e revisando os erros durante todo o período de desenvolvimento e, claro, dividindo em pequenas tarefas em períodos curtos de tempo, deixando o fluxo de trabalho muito mais organizado.


