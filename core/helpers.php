<?php

function generateSlug($string) {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    return $slug;
  }

  function alertMessage($message,$type='success'){

   return "<div class='alert alert-$type mt-3'>$message</div>";
  }




?>