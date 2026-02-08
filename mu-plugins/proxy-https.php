<?php
/**
 * Plugin Name: Proxy HTTPS Fix
 */
// Activate HTTPS detection when behind a reverse proxy that sets X-Forwarded-Proto
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO']) {
    $_SERVER['HTTPS'] = 'on';
}
