<?php

  function customExit($msg) {
    exit(json_encode(array("msg"=>$msg)));
  }

?>