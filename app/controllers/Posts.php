<?php
    class Posts extends Controller {


        public function __construct()
        {
            // only logged in ussers can see the posts
            if(!isLoggedIn()) {
                redirect('/users/login');
            }
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index()
        {
            // Get Posts
            $posts = $this->postModel->getPosts();
            $data = [
                'posts' => $posts
            ];
            $this->view('posts/index', $data);
        }

        public function add()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter body';
                }

                 // Make sure errors are empty
                 if(empty($data['title_err']) && empty($data['body_err']) ) {
                    // Validated
                    if($this->postModel->addPost($data)) {
                        flash('post_message', 'Post added!');
                        redirect('/posts');
                    } else {
                        die('Something went wrong!');
                    }
                } else {
                    // Load views with errors
                    $this->view('posts/add', $data);
                }

            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
                $this->view('posts/add', $data);
            }
        }

        public function show(String $id)
        {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/show', $data);
        }

    }
