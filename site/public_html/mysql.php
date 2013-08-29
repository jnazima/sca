<?php 
// Desabilita a exibição de erros. Necessário para a depuração dos erros
error_reporting(~E_ALL);

// Verifica se o formulário foi submetido
if ($_POST) {

    if (!function_exists('num_rows')) {
        function num_rows ($table) {
            $query = mysql_query('select count(*) from `'. $table .'`');
            return (int)mysql_result($query, 0);
        }
    }
    
    // Armazenar possíveis erros
    $error = array();
    
    // Variáveis de conexão
    $hostname = $_POST['hostname']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $database = $_POST['database'];
     
    // Abre uma conexão ao banco de dados mysql
    $conn = mysql_connect($hostname, $username, $password);
    
    // Verifica se houve erro ao criar a conexão
    if (!$conn) {
        $error[] = 'Não foi possível realizar uma conexão: ' . mysql_error();
    }    
    
    // Seleciona o banco de dados que será utilizado
    $db   = mysql_select_db($database, $conn);
    
    // Verifica se houve erro ao selecionar o banco de dados
    if (!$db) {
        $error[] = 'Não foi possível selecionar um banco de dados: ' . mysql_error();
    }
}    

// Verifica se houve uma requisição ajax
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Seleciona as colunas em um banco de dados
    $columns = mysql_query('SHOW COLUMNS FROM `'. $_POST['tabela'] .'`');
    // Monta a resposta em ajax
    echo '<h2>Colunas da tabela "'. $_POST['tabela'] .'"</h2>';
    echo '<ul>';
    // Percorre o laço com as colunas
    while($column = mysql_fetch_array($columns)) {
        echo '<li>'. $column[0] .'</li>';
    }
    echo '</ul>';
    echo 'Total de '. num_rows($_POST['tabela']) .' registro(s) nessa tabela.';
    
}
// Se não houve requisição ajax retorna o html
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste e Conexão com o Banco de Dados MySQL</title>
<style>
#form { min-width: 998px; }
#form, #form h1, #form h2, #form button, #form input { border: 0; margin: 0; padding: 0; }
#form .limpa { clear: both; }
#form a { color: #0371b7; text-decoration: none; }
#form a:hover { text-decoration: underline; }
#form * { color: #444; font-family: Arial, Tahoma, Sans; font-size: 12px; font-weight: normal; outline: none;  }
#form .bloco h1, #form button, #form input, #form select, #form .tabela { -webkit-border-radius: 5px; -moz-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0px 2px 2px #f0f0f0; -moz-box-shadow: 0px 2px 2px #f0f0f0; box-shadow: 0px 2px 2px #f0f0f0; }
#form .bloco { background: #fff;  }
#form .bloco h1 { background: #f0f0f0; border: 1px solid #ddd; font-size: 16px; font-weight: bold; padding: 5px; }
#form .bloco h2 { font-size: 15px; font-weight: bold; margin: 10px 0; }
#form button { background: #f0f0f0; border: 1px solid #ddd; cursor: pointer; display: block; float: right; font-weight: bold; margin: 10px 0 0 0; padding: 5px 15px; }
#form button:hover { background: #e5e5e5; }
#form .conteudo { padding: 10px 10px 20px 10px; }
#form label { display: block; float: left; padding: 5px 0; width: 100px; }
#form input { border: 1px solid #959595; float: left; margin: 0 0 5px 0; padding: 5px; }
#form select { border: 1px solid #959595; float: left; margin: 0 0 5px 0; padding: 4px 5px; }
#form .exemplo { color: #bbb; display: block; float: left; padding: 5px; }
#form input.pp{ width: 100px; }
#form select.pp { width: 112px; }
#form input.pq { width: 200px; }
#form select.pq { width: 212px; }
#form input.md { width: 300px; }
#form select.md { width: 312px; }
#form input.gd { width: 400px; }
#form select.gd { width: 412px; }
#form input.gg { width: 500px; }
#form select.gg { width: 512px; }
#form input:focus, #form select:focus, #form textarea:focus { background: #f0f0f0; border: 1px solid #444; }
#form input.radio { border: 0; margin: 5px 10px 0 0; padding: 0; }
#form .tabela { height: 300px; width: 100%; }
#form .tabela h2 { margin: 10px; }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script>
$(function () {
$('#tabela').change(function () {
if ($(this).val() != '') {
$.post('mysql.php', $('#form').serialize(), function (data) {
$('#resultado').html(data);
}); } }); });
</script>
</head>
<body>

<form action="" method="post" name="form" id="form">

  <div class="bloco">
    <h1>Dados de Conexão</h1>
    <div class="conteudo">
        <label for="hostname">Servidor:</label>
        <input type="text" name="hostname" id="hostname" value="<?php echo ($_POST['hostname']) ? $_POST['hostname'] : 'localhost' ?>" class="pq" />
        <div class="exemplo">Ex.: localhost</div>
        <div class="limpa"></div>

        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" value="<?php echo $_POST['username'] ?>" class="pq" />
        <div class="exemplo">Ex.: usuariocpanel_seuusuario</div>
        <div class="limpa"></div>
        
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" value="<?php echo $_POST['password'] ?>" class="pq" />
        <div class="limpa"></div>
        
        
        <label for="database">Banco de Dados:</label>
        <input type="text" name="database" id="database" value="<?php echo $_POST['database'] ?>" class="pq" />
        <div class="exemplo">Ex.: usuariocpanel_seubanco</div>
        <div class="limpa"></div>
        
        <button>Testar Conexão</button>
        
        <div class="limpa"></div>
        
    </div>
  </div>
  
<?php 
// Verifica se o formulário foi submetido
if ($_POST) { 
    // Consulta todas as tabelas disponíveis no banco de dados
    $query = mysql_query('SHOW TABLES');
    
    // Verifica se houve erro na execução da consulta
    if (!$query) {
        $error[] = 'Não foi possível executar a consulta: '. mysql_error();
    }

    // Verifica se houve erros
    if (count($error) == 0) {

?>

  <div class="bloco">
    <h1>Sucesso</h1>
    <div class="conteudo">
        <h2>Conexão realizada com sucesso</h2>
        <label for="tabela">Tabelas:</label>
        <select name="tabela" id="tabela" class="pq">
        <option value="">- selecione -</option>
<?php
        // Percorre todas as tabelas do banco de dados
        while($tables = mysql_fetch_array($query)) {
?>
            <option value="<?php echo $tables[0] ?>"><?php echo $tables[0] ?></option>
<?php    
        }
?>    
        </select>
        <div class="limpa"></div> 
        <div id="resultado"></div>        
        <div class="limpa"></div>
    </div>
  </div>

<?php        
        // Fecha a conexão com o banco de dados
        mysql_close($conn);        
    }
    else {

?>  
  <div class="bloco">
    <h1>Erro</h1>
    <div class="conteudo">
        <h2>Ocorreu um ou mais erros durante o processamento</h2>
        <ul>
<?php 
        // Percorre o laço com os erros emitidos durante o processamento
        foreach ($error as $err) { 
?>        
            <li><?php echo $err ?></li>
<?php 
        } 
?>            
        </ul>
        <div class="limpa"></div>
    </div>
  </div>  
<?php 
    } 
}
?>
</form>
</body>
</html>
<?php } ?>