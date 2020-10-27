<?php
    class Posts extends Controller {


        public function __construct()
        {
            // only logged in ussers can see the posts
            if(!isLoggedIn()) {
                redirect('/users/login');
            }
        }

        public function index()
        {
            $data = [];
            $this->view('posts/index', $data);
        }
    }