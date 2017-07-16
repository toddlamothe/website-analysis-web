<?php
// This module processes the form input from index.php
$isPostBack = false;
$yourUrl = "";
$competitor1url = "";
$competitor2url = "";
$competitor3url = "";
// For each url entered by the user, fetch analytics from
// the service and push results onto the array
$resultSets = array();
$topOrganicCompetitors = null;
$topPaidCompetitors = null;

// Initialize curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

if(isset($_POST['url']) && !empty($_POST['url'])) {
    $isPostBack = true;
    $yourUrl = $_POST['url'];
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $yourUrl;
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    // Decode json returned by the service
    $decodedAnalyticsData = json_decode($result);
    $decodedAnalyticsData->url = $yourUrl;
    array_push($resultSets, $decodedAnalyticsData);

    // AWS URL for competitors API
    $urlCompetitors = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors-organic";

    // Fetch top organic competitors
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors?url=" . $yourUrl . "&isOrganic=true";
    curl_setopt($curl, CURLOPT_URL, $url);
    $topOrganicCompetitors = curl_exec($curl);
    $topOrganicCompetitors = json_decode($topOrganicCompetitors);

    // Fetch top paid competitors
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors?url=" . $yourUrl . "&isOrganic=false";
    curl_setopt($curl, CURLOPT_URL, $url);
    $topPaidCompetitors = curl_exec($curl);
    $topPaidCompetitors = json_decode($topPaidCompetitors);
}

// Competitor 1
if(isset($_POST['competitor1url']) && !empty($_POST['competitor1url'])) {
    $competitor1url = $_POST['competitor1url'];
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $competitor1url;
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    $competitor1DecodedAnalyticsData = json_decode($result);
    $competitor1DecodedAnalyticsData->url = $competitor1url;
    array_push($resultSets, $competitor1DecodedAnalyticsData);
}

// Competitor 2
if(isset($_POST['competitor2url']) && !empty($_POST['competitor2url'])) {
    $competitor2url = $_POST['competitor2url'];
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $competitor2url;
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    $competitor2DecodedAnalyticsData = json_decode($result);
    $competitor2DecodedAnalyticsData->url = $competitor2url;
    array_push($resultSets, $competitor2DecodedAnalyticsData);
}

// Competitor 3
if(isset($_POST['competitor3url']) && !empty($_POST['competitor3url'])) {
    $competitor3url = $_POST['competitor3url'];
    $url = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $competitor3url;
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    $competitor3DecodedAnalyticsData = json_decode($result);
    $competitor3DecodedAnalyticsData->url = $competitor3url;
    array_push($resultSets, $competitor3DecodedAnalyticsData);
}

curl_close($curl);

function dd($d) {
    echo "<pre>";
    var_dump($d);
    echo "</pre>";
}
?>
