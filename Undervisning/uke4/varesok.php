<?php

include_once "hjelpefunksjoner.php";
topp();


h1("Varesøk");

echo <<<EOT
<form method="POST" action="varedemo.php">
<p>Varenavn: <input type="text" name="txtSok" size="20"></p>
<p>
  <input type="submit" value="Send forespørsel" name="sendKnapp">
  <input type="reset" value="Rensk skjema" name="renskKnapp">
</p>
</form>
EOT;









bunn();
