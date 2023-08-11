<?php
include("../conn.php");
if (isset($_GET['load_provinces'])) {
    $result = $conn->query("SELECT * FROM provinces order by provincename") or die('failed to load provinces');
    $data = '';
    $data .= '<option value="">Select Province...</option>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data .= '<option value="' . $row['provincecode'] . '">' . $row['provincename'] . '</option>';
    }
    echo $data;
}

if (isset($_GET['name']) && $_GET['name'] == 'load_districts') {
    $result = $conn->query("SELECT * FROM districts where provincecode='" . $_GET['val'] . "'") or die('failed to load districts');
    $data = '';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data .= '<option value="' . $row['districtcode'] . '">' . $row['namedistrict'] . '</option>';
    }
    echo $data;
}

if (isset($_GET['name']) && $_GET['name'] == 'load_sectors') {
    $result = $conn->query("SELECT * FROM sectors where districtcode='" . $_GET['val'] . "'") or die('failed to load sectors');
    $data = '';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data .= '<option value="' . $row['sectorcode'] . '">' . $row['namesector'] . '</option>';
    }
    echo $data;
}