<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
       
    // Função com uma única responsabilidade: inserir um pet no sistema
    // Conforme Clean Code, funções devem fazer uma única coisa e fazê-la bem
    function inserirPet() {
        // Boas práticas: nomes claros e descritivos para variáveis
        const codPet = document.getElementById('codPet').value;
        const nome = document.getElementById('nome').value;
        const gen = document.querySelector('input[name="gen"]:checked').value;
        const nasc = document.getElementById('nasc').value;
        const tutor = document.getElementById('tutor').value;

        // Ponto de atenção (Clean Code): Repetição de lógica (duplicação de XMLHttpRequest em várias funções)
        // Poderia ser extraída para uma função reutilizável
        const requisicao = new XMLHttpRequest();
        requisicao.open("GET", `contrPet.php?codPet=${codPet}&nome=${nome}&gen=${gen}&nasc=${nasc}&tutor=${tutor}&Inserir=Inserir+Pet`, true);
        requisicao.send();

        // Código que lida com a resposta da requisição
        requisicao.onload = function(){
            document.getElementById("resposta").innerHTML = this.responseText;
        }
    }

    // Função que executa apenas a exclusão de um pet
    // Boa prática: função pequena, clara e com nome descritivo
function apagarPet() {
        const codPet = document.getElementById('codPet').value;

        const requisicao = new XMLHttpRequest();
        requisicao.open("GET", `contrPet.php?codPet=${codPet}&Excluir=Excluir+Pet`, true);
        requisicao.send();

        requisicao.onload = function(){
            document.getElementById("resposta").innerHTML = this.responseText;
        }
    }

    // Função que solicita alteração de dados de um pet
    // Ponto de melhoria: atualmente só envia o código — pode ser insuficiente para alteração real
    function atualizarPet() {
        const codPet = document.getElementById('codPet').value;

        const requisicao = new XMLHttpRequest();
        requisicao.open("GET", `contrPet.php?codPet=${codPet}&Alterar=Alterar+Dado`, true);
        requisicao.send();

        requisicao.onload = function(){
            document.getElementById("resposta").innerHTML = this.responseText;
        }
    }

    // Função simples e coesa: faz busca pelo código do pet
    function pesquisarPet() {
        const codPet = document.getElementById('codPet').value;

        const requisicao = new XMLHttpRequest();
        requisicao.open("GET", `contrPet.php?codPet=${codPet}&Pesquisar=Procurar+por+Pet`);
        requisicao.send();

        requisicao.onload = function() {
            document.getElementById("resposta").innerHTML = this.responseText;
        }
    }



    </script>
</head>
<body>
    <body>
    <!-- Título da aplicação, curto e direto, comunica claramente o propósito da página -->
    <h2>PETSHOP</h2>

    <!-- Campo para o código do pet: uso adequado de label e id para clareza e acessibilidade -->
    <label for="codPet">Código</label>
    <input type="number" name="codPet" id="codPet" required>

    <!-- Campo para o nome do pet: segue o mesmo padrão claro e semântico -->
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <!-- Campos de seleção de gênero: organização em grupo lógico e semântico (fieldset recomendado) -->
    <!-- IDs duplicados (gen) violam o HTML válido e dificultam manipulação via JavaScript -->
    <!-- Cada input deveria ter um id exclusivo (ex: genM, genF), mas manter o mesmo name="gen" para agrupamento correto -->
    <input type="radio" name="gen" value="M" id="gen" required>Macho
    <input type="radio" name="gen" value="F" id="gen">Fêmea 

    <!-- Campo para data de nascimento do pet: uso de input tipo date melhora a usabilidade -->
    <label for="nasc">Nascimento</label>
    <input type="date" name="nasc" id="nasc" required><br><br>

    <!-- Campo opcional para informar o tutor do pet -->
    <label for="tutor">Tutor</label>
    <input type="text" name="tutor" id="tutor"><br><br>

    <!-- Botões acionam funções com nomes verbosos e claros, facilitando manutenção -->
    <!-- A escolha por nomes como inserirPet() ou apagarPet() respeita a regra de 'nomes que dizem o que fazem' -->
    <button onclick="inserirPet()">INSERIR</button>
    <button onclick="atualizarPet()">ALTERAR</button>
    <button onclick="apagarPet()">APAGAR</button>
    <button onclick="pesquisarPet()">PESQUISAR</button>

    <!-- Elemento para exibir mensagens ou respostas das ações; separa claramente interface de lógica -->
    <p id="resposta"></p>
</body>

</html>
