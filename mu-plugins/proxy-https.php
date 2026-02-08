<?php
/**
 * Plugin Name: Proxy HTTPS Fix
 */
if (!empty(['HTTP_X_FORWARDED_PROTO']) && ['HTTP_X_FORWARDED_PROTO'] === 'https') {
    ['HTTPS'] = 'on';
}
