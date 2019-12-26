<?php
class Format{

public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

public function validationText($data){
  $data = trim($data);
  $data = stripcslashes($data);
  #$data = htmlspecialchars($data);
  return $data;
 }
 
 public function textMqShorten($text, $limit = 60){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."...";
  return $text;
 }
 public function FormatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
  }

}