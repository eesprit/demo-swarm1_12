<?php
  $color="green";
  $backend_url="http://backend/index.php";

  function call_backend() {
    global $backend_url;
    $worker = $payload = file_get_contents($backend_url);
    return $worker;
  }
?>
<html><head><title>Swarm Service Discovery and Load Balancing Demo</title></head>
<body>
<h2>Traitement frontend effectu&eacute; par <font color="green"><?php echo gethostname(); ?></font></h2>
<h2>Traitement backend effectu&eacute; par : <font color="red"><?php echo call_backend(); ?></font></h2>
</body>
</html>

