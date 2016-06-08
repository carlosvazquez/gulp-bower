<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="SrXDNNKoTVrNTHlj0bAVIe3i7qK3WvZ0O3r4lUbGQU4" />

  <title>Armonía Tonal Moderna | Cursos y libros para piano</title>
  <link rel="stylesheet" href="../css/app.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,700,700italic|Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
  <script src="../js/modernizr-custom.js" type="text/javascript"></script>
  <!-- <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon"> -->

  <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
  <link rel="manifest" href="/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
$page_name = basename($_SERVER['PHP_SELF']);

switch ($page_name) {
    case 'index.php':
        $page_name = 'blog home';
        break;
    case 'libros.php':
        $page_name = 'libros';
        break;
    case 'curso-atm.php':
        $page_name = 'curso';
        break;
    case 'blog.php':
        $page_name = 'blog';
        break;
    case 'autor.php':
        $page_name = 'autor';
        break;
    case 'contacto.php':
        $page_name = 'contacto';
        break;
    case 'gracias.php':
        $page_name = 'gracias';
        break;
}
?>

<body class="<?php echo $page_name; ?>">
