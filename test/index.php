<pre>

<form action="" method="get">
    <input type="text" name="Nome" >
    <input type="submit">
</form>
<?php

var_dump( parse_url( $_SERVER['REQUEST_METHOD']));

var_dump($_GET['Nome'][0]);

?>
</pre>
