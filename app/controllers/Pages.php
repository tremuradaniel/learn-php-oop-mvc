<?php
    class Pages extends Controller {
        public function __construct()
        {
            $this->postModel = $this->model("Post");
        }

        public function index()
        {

            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'Welcome!',
                'posts' => $posts
            ];

            $posts = $this->postModel->getPosts();

            $this->view('pages/index',  $data);
        }

        public function about() {
            $data = [
                'title' => 'About Page'
            ];
            $this->view('pages/about',  $data);
        }
    }