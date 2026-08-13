<?php

require('adapter.php');
require('security/mod.php');
new security();
require('requests/mod.set.php');
new requestsSet($_GET);

?>