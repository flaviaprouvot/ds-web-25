<?php
session_start();

// CONFIGURAÇÃO DO BANCO
$host = "localhost";
$dbname = "saep_db";
$user = "root";
$pass = "";

// Conexão com o banco usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo json_encode(["erro" => "Falha na conexão com o banco de dados."]);
    exit;
}

$acao = $_GET['acao'] ?? '';
$dados = json_decode(file_get_contents("php://input"), true);

switch ($acao) {

    // LOGIN
    case 'login':
        $login = $dados['loginUsuario'] ?? '';
        $senha = $dados['senhaUsuario'] ?? '';

        if (!$login || !$senha) {
            echo json_encode(["erro" => "Informe o login e a senha."]);
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE loginUsuario = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['senhaUsuario'] == $senha) {
            $_SESSION['usuario'] = [
                "idUsuario" => $user['idUsuario'],
                "nomeUsuario" => $user['nomeUsuario'],
                "loginUsuario" => $user['loginUsuario']
            ];
            echo json_encode(["mensagem" => "Login realizado com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Usuário ou senha incorretos."]);
        }
        break;

    // LOGOUT
    case 'logout':
        session_destroy();
        header("Location: index.php");
        exit;
     break;

   
    // STATUS DE LOGIN
    case 'status':
        echo json_encode(["logado" => isset($_SESSION['usuario']), "usuario" => $_SESSION['usuario'] ?? null]);
        break;

    
    // LISTAR PRODUTOS
    case 'listarProdutos':
        $stmt = $pdo->query("SELECT * FROM produto ORDER BY nome");
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($produtos);
        break;

    // INSERIR PRODUTO
    case 'inserirProduto':

        $stmt = $pdo->prepare("INSERT INTO produto 
        (nome, modelo, tipoMaterial, preco, estoque, estoqueMin, estoqueMax, marca, tamanho, peso, tensao)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    
    $stmt->execute([
        $dados['nome'],
        $dados['modelo'],
        $dados['tipoMaterial'],
        $dados['preco'],
        $dados['estoque'],
        $dados['estoqueMin'],
        $dados['estoqueMax'],
        $dados['marca'],
        $dados['tamanho'],
        $dados['peso'],
        $dados['tensao']
    ]);
    
        echo json_encode(["mensagem" => "Produto cadastrado com sucesso!"]);
        break;

    // EDITAR PRODUTO
        case 'editarProduto':
            $stmt = $pdo->prepare("UPDATE produto SET nome=?, modelo=?, tipoMaterial=?, preco=?, estoque=?, estoqueMin=?, estoqueMax=?, marca=?, tamanho=?, peso=?, tensao=? WHERE idProduto=?");

    $stmt->execute([
        $dados['nome'],
        $dados['modelo'],
        $dados['tipoMaterial'],
        $dados['preco'],
        $dados['estoque'],
        $dados['estoqueMin'],
        $dados['estoqueMax'],
        $dados['marca'],
        $dados['tamanho'],
        $dados['peso'],
        $dados['tensao'] ,  
        $dados['idProduto']     
    ]);

        echo json_encode(["mensagem" => "Produto atualizado com sucesso!"]);
        break;

    // EXCLUIR PRODUTO
    case 'excluirProduto':
        $stmt = $pdo->prepare("DELETE FROM produto WHERE idProduto = ?");
        $stmt->execute([$dados['idProduto']]);
        echo json_encode(["mensagem" => "Produto excluído com sucesso!"]);
        break;


    // LANÇAR MOVIMENTO DE ESTOQUE
    case 'lancarEstoque':
        $fkProd = $dados['fkProd'] ?? null;
        $fkUsuario = $_SESSION['usuario']['idUsuario'] ?? null;
        $tipo = $dados['tipoMovimento'] ?? null; // 'E' = Entrada, 'S' = Saída
        $quantidade = (int)($dados['quantidade'] ?? 0);
        $dataMovimento = $dados['dataMovimento'] ?? date('Y-m-d H:i:s'); // data informada ou atual

        if (!$fkProd || !$fkUsuario || !$tipo || $quantidade <= 0) {
            echo json_encode(["erro" => "Dados incompletos para o lançamento."]);
            exit;
        }

        // Atualiza o estoque do produto
        if ($tipo === 'E') {
            $stmt = $pdo->prepare("UPDATE produto SET estoque = estoque + ? WHERE idProduto = ?");
        } else {
            $stmt = $pdo->prepare("UPDATE produto SET estoque = estoque - ? WHERE idProduto = ?");
        }
        $stmt->execute([$quantidade, $fkProd]);

        // Registra o movimento
        $stmt = $pdo->prepare("INSERT INTO estoque (fkProd, fkUsuario, tipoMovimento, quantidade, dataMovimento) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$fkProd, $fkUsuario, $tipo, $quantidade, $dataMovimento]);

        echo json_encode(["mensagem" => "Movimento registrado com sucesso!"]);
        break;

    // HISTÓRICO DE MOVIMENTOS
    case 'historicoEstoque':
        $fkProd = $_GET['fkProd'] ?? null;
        if (!$fkProd) {
            echo json_encode(["erro" => "Produto não informado."]);
            exit;
        }

        $stmt = $pdo->prepare("
            SELECT idEstoque, e.tipoMovimento, e.quantidade, e.dataMovimento, u.nomeUsuario
            FROM estoque e
            INNER JOIN usuario u ON u.idusuario = e.fkUsuario
            WHERE e.fkProd = ?
            ORDER BY e.dataMovimento DESC
        ");
        $stmt->execute([$fkProd]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;



    default:
        echo json_encode(["erro" => "Ação inválida ou não informada."]);
}
?>