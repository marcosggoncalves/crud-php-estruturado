<?php

function redirect($url, $message){
  $_SESSION['message'] = $message;
  header("Location: {$_ENV["BASE_URL"]}{$url}");
}

function render($template, $data = null){
  $content = $data;
  include __DIR__ . "../../views/Veiculos/{$template}.php";
  return;
}