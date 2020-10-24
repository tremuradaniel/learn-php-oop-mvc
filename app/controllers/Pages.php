<?php
    class Pages extends Controller {
        public function __construct()
        {
            echo 'Pages loaded <br>';
        }

        public function index()
        {
            $data = [
                'title' => 'Welcome'
            ];
            $this->view('pages/index',  $data);
        }

        public function about() {
            $data = [
                'title' => 'About Page'
            ];
            $this->view('pages/about',  $data);
        }
    }