<?php

  Class Format{

   public function formateDate($date){
   		return date('F j, Y, g:i a', strtotime($date));

   }

   public function textShorten($text, $limit = 400){
   		$text = $text." ";
   		$text = substr($text,0, $limit);
   		$text = substr($text,0, strrpos($text, ' '));
   		$text = $text.".....";

   		return $text;
   }


    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


  }




?>