<?

// $idDeal = $_REQUEST['data']['FIELDS']['ID'];

$id_chat = executeREST('imopenlines.crm.chat.getLastId', array('CRM_ENTITY_TYPE' => 'DEAL', 'CRM_ENTITY' => $_REQUEST['data']['FIELDS']['ID']));
// file_put_contents('./dump2.txt', print_r($id_chat, 1));


// $idChat = $deal_data['result'];

 $second_method = executeREST('crm.deal.update', array('id' => $_REQUEST['data']['FIELDS']['ID'], 'fields' => array('UF_CRM_1695634023' => print_r($id_chat['result'], true))));


function executeREST ($method, $params) {
$queryUrl = 'https://visagehall.bitrix24.ru/rest/17220/izb9hvxasyb950kk/'.$method.'.json';
$queryData = http_build_query($params);

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));

    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}