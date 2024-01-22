<?

$id_company = $_REQUEST['data']['FIELDS']['ID'];
$activity = executeREST('crm.activity.list', array('filter' => array('OWNER_ID' => $id_company, 'OWNER_TYPE_ID' => 4)));
$id_activity = [$activity['result'][0]['ID'], $activity['result'][1]['ID'],$activity['result'][2]['ID'],$activity['result'][3]['ID'],$activity['result'][4]['ID'],$activity['result'][5]['ID'],$activity['result'][6]['ID'],$activity['result'][7]['ID'],$activity['result'][8]['ID'],$activity['result'][9]['ID'],$activity['result'][10]['ID'],$activity['result'][11]['ID'],$activity['result'][12]['ID'],$activity['result'][13]['ID'],$activity['result'][14]['ID'],$activity['result'][15]['ID'],$activity['result'][16]['ID'],$activity['result'][17]['ID'],$activity['result'][18]['ID'],$activity['result'][19]['ID'],$activity['result'][20]['ID'],$activity['result'][21]['ID'],$activity['result'][22]['ID'],$activity['result'][23]['ID'],$activity['result'][24]['ID'],$activity['result'][25]['ID'],$activity['result'][26]['ID'],$activity['result'][27]['ID'],$activity['result'][28]['ID'],$activity['result'][20]['ID']];
$BP = executeREST('bizproc.workflow.start', array('TEMPLATE_ID' => '166', 'DOCUMENT_ID' => array('crm', 'CCrmDocumentCompany', 'COMPANY_' . $id_company), 'PARAMETERS' => array('Parameter1' => $id_activity)));
// file_put_contents('./dump6.txt', print_r($id_activity, 1));// получить дамп
function executeREST ($method, $params) {
$queryUrl = 'https://b24.zavod-vzg.ru/rest/4/1dam41auowulya8w/'.$method.'.json';
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

