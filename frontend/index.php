<?php
  $color= getenv('COLOR') ? getenv('COLOR') : "green";
  $backend_url="http://backend/index.php";

  function get_hostname() {
    global $color;
    return "<font color=\"" . $color . "\">" . gethostname() . "</font>";
  }

  function call_backend() {
    global $backend_url;
    $worker = file_get_contents($backend_url);
    return $worker;
  }
?>
<html><head><title>Swarm Service Discovery and Load Balancing Demo</title></head>
<body>
<h2>Traitement frontend effectu&eacute; par : <?php echo get_hostname(); ?></h2>
<h2>Traitement backend effectu&eacute; par : <?php echo call_backend(); ?></h2>
</body>
</html>

