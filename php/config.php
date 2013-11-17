<?php
  define('OB_INIT_LEVEL', ob_get_level());

  require_once 'basic.php';
  require_once 'output.php';

  ob_start(HDLR_TYPE);
  header('Content-type: '.CONT_TYPE);

  abstract class URL
  {
    const METHOD = 'GET';
    const PROTO = 'http://';
    const ROOT = 'ip4.name';
    const PATH = '/';

    public static function getBaseHref()
    {
      return self::PROTO.self::ROOT.self::PATH;
    }

    protected static function redirectToRoot()
    {
      redirect(self::getBaseHref());
    }

    protected static function ensureHost()
    {
      if (self::ROOT !== sgoe('HTTP_HOST', false))
        self::redirectToRoot();
    }

    protected static function ensurePath()
    {
      if (self::PATH !== sgoe('REQUEST_URI', false))
        self::redirectToRoot();
    }

    protected static function ensureMethod()
    {
      if (self::METHOD !== sgoe('REQUEST_METHOD', false))
        self::redirectToRoot();
    }

    public static function ensureRoot()
    {
      self::ensureMethod();
      self::ensureHost();
      self::ensurePath();
    }
  }
