<?php

function xml_request($path)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $path);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $retValue = curl_exec($ch);
    curl_close($ch);
    return $retValue;
}

function convertToUSD($currentValue, $usdValue): float
{
    $convertedValue = $currentValue / $usdValue;
    return round($convertedValue, 2);
}

$sXML = xml_request('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml?5105e8233f9433cf70ac379d6ccc5775');
$oXML = new SimpleXMLElement($sXML);

setlocale(LC_MONETARY, 'en_US');
$xml = $oXML[0]->Cube->Cube;
$xml2array = json_decode(json_encode((array)$xml), TRUE);
$currencyRates = $xml2array['Cube'];
$usdValue = floatval($currencyRates[0]["@attributes"]['rate']);
$arrayOfCurrents = [
    [
        'currency' => 'EUR',
        'rate' => convertToUSD(1, $usdValue)
    ]
];

foreach ($currencyRates as $currencyRate) {
    $currency = $currencyRate['@attributes']['currency'];
    $rate = floatval($currencyRate['@attributes']['rate']);

    $insert = [
        'currency' => $currency,
        'rate' => convertToUSD($rate, $usdValue)
    ];

    if ($currency !== 'USD') {
        array_push($arrayOfCurrents, $insert);
    }
}

if (isset($_POST['request'])) {

    if ($_POST['request'] == 'show') {
        header('Content-Type: application/json; charset=utf-8');
        print(json_encode($arrayOfCurrents, TRUE));
    }

    if ($_POST['request'] == 'csv') {

        function outputCsv($assocDataArray)
        {
            if (!empty($assocDataArray)) {

                $output = fopen('php://output', 'w');
                fputcsv($output, ['Currency Code',   'Rate']);

                foreach ($assocDataArray as $current) {
                    fputcsv($output, [$current['currency'],   $current['rate']],  ";");
                }

                fclose($output);
                exit;
            }
        }

        return outputCsv($arrayOfCurrents);
    }
}
