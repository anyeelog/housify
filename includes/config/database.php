<?php

function connectDB() {
  $db = new mysqli('localhost', 'root', '', 'housify_crud');

  if(!$db) {
    echo "DB could not be connected";
    exit;
  }

  return $db;
}
