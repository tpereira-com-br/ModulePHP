<?php
class JsonLd {
    private $dir;
    private $files;
    public $script;

    function __construct($dir = false) {
        $this->script = "";
        if ($dir !== false) {
            $dir = "../json-ld/$dir";
        } else {
            $dir = "../json-ld";
        }
        $this->dir = $dir;
        if (is_readable( $this->dir)) {
            $this->files = array_slice(scandir($this->dir), 2);
            foreach ($this->files as $file) {
                ob_start();
                include "$this->dir/$file";
                $ldJson = ob_get_clean();
                $this->script.= '<script type="application/ld+json">'.$ldJson.'</script>';
            }
        }
    }
}

?>