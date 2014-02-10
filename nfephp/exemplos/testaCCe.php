<?php
/**
 * Este é um exemplo do uso do método envCCe para enviar uma Carta de Correção
 * 
 * Para usar uma carta de correção você deve atentar para os seguintes detalhes :
 * 
 * 1 - não pode haver repetição do numero sequencial da correção ou o sefaz vai rejeitar 
 *     portando isso deve ser gerido pelo seu sistema 
 * 2 - O método irá gravar tanto o pedido de carta de correção que foi enviado, bem como o processo completo
 *     após a resposta positiva. Estes arquivos são gravados na pasta TEMPORARIAS com o nome :
 *     <chave_da_nfe>-<numero do evento>-envCCe.xml .... esse contêm os dados enviados
 *     <chave_da_nfe>-<numero do evento>-procCCe.xml .... esse contêm os dados enviados e o protocolo da SEFAZ
 */

require_once('../libs/ToolsNFePHP.class.php');
$nfe = new ToolsNFePHP;

$chNFe='35120658716523000119550000000000141425522783';
$xCorrecao='O numero correto para o endereco RUA LUZITANA 290 a acrescido da indicacao fundos. Telefone de contato 1234567890';
$nSeqEvento='1';
$tpAmb='2';
$modSOAP='2';
if ($xml = $nfe->envCCe($chNFe, $xCorrecao, $nSeqEvento, $tpAmb, $modSOAP)){
    header('Content-type: text/xml; charset=UTF-8');
    echo $xml;    
} else {
    echo $nfe->errMsg;
}

?>
