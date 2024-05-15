<?php

///require_once __DIR__ . '/scripts/function.php';
///require_once __DIR__ . '/info.php';
require_once 'velueObject.php';

$color = RGBColor::random();

echo "<div style='width: 100px; height: 100px; background-color: {$color};'></div>";
