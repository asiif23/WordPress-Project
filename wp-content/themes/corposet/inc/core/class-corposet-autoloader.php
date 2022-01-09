<?php

class Corposet_Autoloader {

    /**
     * List of available classes to get for autoloading.
     *
     * @var array
     */
    private $classes_to_load = array();

    public function __construct() {
        $this->classes_to_load = array(
            'Corposet_public' => CORPOSET_BASE_DIR,
            'Corposet_Admin' => CORPOSET_BASE_DIR,
            'Corposet_Core' => CORPOSET_BASE_DIR,
            'Corposet_Pro_Info_Control' => CORPOSET_INCLUDE . 'customizer'
        );
    }

    /**
     * Autoload function for registration with spl_autoload_register
     *
     * @since   1.1.40
     * @access  public
     *
     * @param   string $class_name The class name requested.
     *
     * @return mixed
     */
    public function loader($class_name) {
        if (!array_key_exists($class_name, $this->classes_to_load)) {
            return false;
        }

        $filename = 'class-' . str_replace('_', '-', strtolower($class_name)) . '.php';
        $full_path = trailingslashit($this->classes_to_load[$class_name]) . $filename;
        
        if (is_file($full_path)) {
            require $full_path;
        }

        return true;
    }

}
