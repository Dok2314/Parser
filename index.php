<?php 
$ch = curl_init($argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);



preg_match_all('|<a[^>]* href="(.+)"[^>]*>|U',
    $content,
    $out, PREG_PATTERN_ORDER);

$data['a'] = $out[1];


preg_match_all('|<img[^>]* src="(.+)"[^>]*>|U',
    $content,
    $out, PREG_PATTERN_ORDER);

$data['img'] = $out[1];

preg_match_all('|<script src="(.+)">|U',
    $content,
    $out, PREG_PATTERN_ORDER);

$data['script'] = $out[1];


preg_match_all('|<link[^>]* href="(.+)"[^>]*>|U',
    $content,
    $out, PREG_PATTERN_ORDER);

$data['link'] = $out[1];




echo json_encode($data);