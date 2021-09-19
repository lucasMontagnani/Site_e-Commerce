<?php 
$cep_destino = $_POST['cep_destino'];
$cep_origem  = '11700005';

$url  = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
$url .= 'nCdEmpresa=0&';
$url .= 'sDsSenha=0&';
$url .= 'nCdServico=41106&';
$url .= 'sCepOrigem='.$cep_origem.'&';
$url .= 'sCepDestino='.$cep_destino.'&';
$url .= 'nVlPeso=1&';
$url .= 'nCdFormato=1&';
$url .= 'nVlComprimento=16&';
$url .= 'nVlAltura=16&';
$url .= 'nVlLargura=21&';
$url .= 'nVlDiametro=11&';
$url .= 'sCdMaoPropria=N&';
$url .= 'nVlValorDeclarado=0&';
$url .= 'sCdAvisoRecebimento=N&';
$url .= 'StrRetorno=xml&';
$url .= 'nIndicaCalculo=3';

$xml   = simplexml_load_file($url);

$frete = $xml->cServico;

$valor = $frete->Valor;
$prazo = $frete->PrazoEntrega;

echo "
	Valor do frete: R$ $valor
	Prazo: $prazo Dias
  ";
  
?>