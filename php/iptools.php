<?php
  abstract class IP
  {
    const LOOPBACK = '127.0.0.1';

    public static function getIP()
    {
      return sgoe('HTTP_X_FORWARDED_FOR', self::LOOPBACK);
    }
  }
