<?php
    class Pages {
        public function __construct()
        {
            echo 'Pages loaded <br>';
        }

        public function index()
        {
            
        }

        public function about($id) {
            echo $id;
        }
    }