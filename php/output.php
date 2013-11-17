<?php
  define( 'XHTML_MIME', 'application/xhtml+xml' );
  define( 'XHTML_HDLR', 'Output::xhtmlHandler' );
  define( 'XHTML_HEAD', '<?xml version="1.0" encoding="UTF-8"?>'.NL
      .'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">'.NL
      .'<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">'.NL );

  define( 'HTML_MIME', 'text/html' );
  define( 'HTML_HDLR', 'Output::htmlHandler' );
  define( 'HTML_HEAD', '<!DOCTYPE html>'.NL
      .'<html lang="en">'.NL );

  $htmlOverride = sgoe('REQUEST_URI', false);
  $htmlOverride = ($htmlOverride === '/html') || ($htmlOverride === '/ip.html');

  $xhtml = !$htmlOverride && sisa('HTTP_ACCEPT', XHTML_MIME);
  define( 'HEAD_TYPE', $xhtml ? XHTML_HEAD : HTML_HEAD );
  define( 'HDLR_TYPE', $xhtml ? XHTML_HDLR : HTML_HDLR );
  define( 'MIME_TYPE', $xhtml ? XHTML_MIME : HTML_MIME );
  define( 'CONT_TYPE', MIME_TYPE.'; charset=UTF-8' );

  abstract class Output
  {
    public static function xhtmlHandler($orig)
    {
      return $orig;
    }

    public static function htmlHandler($orig)
    {
      $orig = preg_replace('/ ?\\/\\>/u', '>', $orig);
      $orig = preg_replace( '/\\/\\/\\<!\\[CDATA\\[/u', '<!--', $orig);
      $orig = preg_replace( '/\\/\\/]]\\>/u', '//-->', $orig);
      return $orig;
    }
  }
