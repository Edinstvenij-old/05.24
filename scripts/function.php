<?php

if ($_GET['show_file']) {
  echo __FILE__;
  echo __FILE__ . ' - ' . __LINE__;
}

die('end');
