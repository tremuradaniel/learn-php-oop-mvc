<?php
    class Post {
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPosts()
        {
            $sql = 'SELECT *, 
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                ORDER BY posts.created_at DESC';
            $this->db->query($sql);
            $results = $this->db->resultSet();
            return $results;
        }

        public function addPost(Array $data)
        {
            $sql = 'INSERT INTO posts (title, body, user_id) 
                    VALUES (:title, :body, :user_id)';
            $this->db->query($sql);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':user_id', $data['user_id']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else return false;
        }

        public function getPostById($id)
        {
            $sql = 'SELECT * FROM posts WHERE id = :id';
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function updatePost(Array $data)
        {
            $sql = 'UPDATE posts 
                    SET title = :title, body = :body, id = :id
                    WHERE id = :id';
            $this->db->query($sql);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':id', $data['id']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else return false;
        }
    }
