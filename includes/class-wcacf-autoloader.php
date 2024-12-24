<?php
namespace WCACF;

class Autoloader {
    public function __construct() {
        spl_autoload_register([$this, 'autoload']);
    }

    public function autoload($class) {
        $prefix = 'WCACF\\';
        $base_dir = WCACF_PLUGIN_DIR . 'includes/';

        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }

        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }
}