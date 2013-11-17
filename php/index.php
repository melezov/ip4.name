<?php
  error_reporting(0);

  define('JS_VER', '0');
  define('CSS_VER', '0');

  require_once 'config.php';
  require_once 'iptools.php';

  function serveTextIP()
  {
    gobble();
    header('Content-Type: text/plain; charset=utf-8');
    $ip = IP::getIP();
    echo $ip;
    exit(0);
  }

  function serveJsonIP()
  {
    gobble();
    header('Content-Type: application/json; charset=utf-8');
    $ip = IP::getIP();
    $arr = array('ip' => $ip);
    echo json_encode($arr);
    exit(0);
  }

  function serveBinaryIP()
  {
    gobble();
    header('Content-Type: application/octet-stream');
    $ip = IP::getIP();
    $bytes = preg_split('/\\./u', $ip);

    $b0 = (int) $bytes[0];
    $b1 = (int) $bytes[1];
    $b2 = (int) $bytes[2];
    $b3 = (int) $bytes[3];

    $binary = ($b0 << 24)+($b1 << 16)+($b2 << 8)+($b3);
    echo pack('V', $binary);
    exit(0);
  }

  function serveXmlIP()
  {
    gobble();
    header('Content-Type: application/xml; charset=utf-8');
    $ip = IP::getIP();
    echo '<?xml version="1.0" encoding="UTF-8"?>',NL,
      '<ip>',h($ip),'</ip>',NL;
    exit(0);
  }

  $path = sgoe('REQUEST_URI', false);

  switch($path)
  {
    case '/ip.txt':
    case '/txt':
    case '/ip.text':
    case '/text':
      serveTextIP();

    case '/ip.js':
    case '/js':
    case '/ip.json':
    case '/json':
      serveJsonIP();

    case '/ip.bin':
    case '/bin':
    case '/ip.binary':
    case '/binary':
      serveBinaryIP();

    case '/ip.xml':
    case '/xml':
      serveXmlIP();

    case '/ip.xhtml':
    case '/xhtml':
      break;

    case '/ip.html':
    case '/html':
      break;

    default:
      URL::ensureRoot();
  }

  $baseHref = URL::getBaseHref();
  $ip = IP::getIP();

  require 'home.php';
