<?php

$conn = mysqli_connect('localhost', 'root', '', 'test1');
if (mysqli_connect_error()) {
   echo json_encode(['code' => 500]);
   die;
}
