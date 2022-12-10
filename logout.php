<?php

  // clears cookie and redirect to index page
  setcookie('tax_user', 'aonuada5@gmail.com', time() - 1000, '/');

  header('location: ./index.php')

?>