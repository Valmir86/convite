<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $presenca = strip_tags(trim($_POST["presenca"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    // Seu e-mail para receber as confirmações
    $para = "valmir.pereira86@hotmail.com";
    $assunto = "Confirmação de Presença - RSVP";

    // Monta o corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "Vai comparecer? $presenca\n";
    $corpo .= "Mensagem: $mensagem\n";

    // Cabeçalhos do e-mail
    $cabecalhos = "From: no-reply@seudominio.com\r\n";
    $cabecalhos .= "Reply-To: no-reply@seudominio.com\r\n";

    // Envia o e-mail
    $enviado = mail($para, $assunto, $corpo, $cabecalhos);

    if ($enviado) {
        echo "<p>Obrigado, $nome! Sua confirmação foi enviada com sucesso.</p>";
    } else {
        echo "<p>Desculpe, houve um erro ao enviar sua confirmação. Tente novamente.</p>";
    }
} else {
    // Se acessou direto pelo navegador sem enviar formulário
    header("Location: index.html"); // redireciona para a página inicial
    exit;
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações
    $para = "valmir.pereira86@hotmail.com"; // Seu e-mail
    $assunto = "Mensagem do site - Esther e Davi";

    // Dados do formulário
    $nome = strip_tags(trim($_POST["nome"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    // Montar o corpo do e-mail
    $corpo = "Você recebeu uma nova mensagem do site:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do e-mail
    $headers = "From: no-reply@seudominio.com\r\n";
    $headers .= "Reply-To: no-reply@seudominio.com\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Enviar o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso! Obrigado, $nome.";
    } else {
        echo "Erro ao enviar a mensagem. Por favor, tente novamente.";
    }
} else {
    // Se tentar acessar direto via GET
    echo "Método inválido.";
}
?>
