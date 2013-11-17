<?=HEAD_TYPE;?>

  <head>
    <meta http-equiv="Content-Type" content="<?=h(CONT_TYPE);?>" />
    <base href="<?=h($baseHref);?>" />

    <title>Your ip4 name</title>
    <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />

    <meta name="keywords" content="ip,ip4,ipv4,name,remote,address" />
    <meta name="description" content="IP pingback" />

    <meta name="author" content="Element d.o.o." />
    <meta name="copyright" content="Element d.o.o." />

    <link rel="stylesheet" href="static/css/reset.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="static/css/ip4.css?v=<?=CSS_VER;?>" type="text/css" media="screen, projection" />
  </head>

  <body>
    <p id="ip-holder">

    <!--
      Available automation URLs for your IP address:

      <?=h($baseHref);?>ip.text  - As plain text
      <?=h($baseHref);?>ip.json  - As an "ip" property of a JSON object
      <?=h($baseHref);?>ip.xml   - As an "ip" root node of an XML structure
      <?=h($baseHref);?>ip.bin   - As a 32 bit little endian binary file
    -->

      <span id="ip">&nbsp;</span>
    </p>
  </body>
  
  <script type="text/javascript" src="static/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="static/js/ip4.js?v=<?=JS_VER;?>"></script>

</html>
