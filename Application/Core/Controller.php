<?php
    class Controller
    {
        public $data = [];
        public $layout ;

        function setData($d)
        {
            $this->data = array_merge($this->data, $d);
        }

        function setLayout($layout)
        {
            $this->layout = $layout;
        }

        function render($filename)
        {
            extract($this->data);

            ob_start();
            require(ROOT . "Application/Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            if (!$this->layout)
            {
               echo $content_for_layout;
               exit();
            }
            else
            {
                require(ROOT . "Application/Views/Layouts/" . $this->layout . '.php');
            }
        }
    }
?>