<?php
   $conn = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
   mysql_select_db(SAE_MYSQL_DB,$conn);
?>