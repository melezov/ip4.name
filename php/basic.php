<?php
  define( 'NL', "\r\n" );
  define( 'TB', "\t" );

  define( 'BR', '<br />' );
  define( 'BL', BR.NL );

  // html escape in UTF-8 encoding
  function h( $text )
  {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
  }

  // gobble gobble gobble
  function gobble()
  {
    while (ob_get_level() > OB_INIT_LEVEL) ob_end_clean();
  }

  // Server Get Or Else - returns value if set in the variable specified by
  // the $_SERVER index, otherwise returns provided $default value
  function sgoe($index, $default)
  {
    return isset($_SERVER[$index]) ? $_SERVER[$index] : $default;
  }

  // Server Is Set Anywhere - returns boolean value indicating whether
  // the $_SERVER[$index] variable exists and contains the provided $value
  function sisa($index, $value)
  {
    return isset($_SERVER[$index]) && (mb_strpos($_SERVER[$index], $value) !== false);
  }

  // redirect
  function redirect( $url )
  {
    gobble();
    header( 'Location: '.$url );
    exit( 0 );
  }
