<?

// $deal_data = $_REQUEST['data']['ID'];


// $name_group = $deal_data['params']['select']['NAME'];
//  $second_method = executeREST('calendar.event.add', array('type' => 'user', 'ownerId' => '56', 'from' => '2024-02-13', 'to' => '2024-02-14', section => '896', name => 'result'));
$startBp = executeREST('bizproc.workflow.start', array('TEMPLATE_ID' => '176', 'DOCUMENT_ID' => array('lists', 'BizprocDocument', '506'), 'PARAMETERS' => array('Parameter1' => $_REQUEST['data']['id'])));
sleep(3);
$delID = executeREST('bizproc.workflow.start', array('TEMPLATE_ID' => '176', 'DOCUMENT_ID' => array('lists', 'BizprocDocument', '506'), 'PARAMETERS' => array('Parameter1' => '')));
file_put_contents('./dump.txt', print_r($_REQUEST, 1));// получить дамп
function executeREST ($method, $params) {
$queryUrl = 'https://indarchitects.bitrix24.ru/rest/71/51qobk4kex5mttzj/'.$method.'.json';
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

