<?php
    require_once "./models/BookModel.php";
    require_once "./views/BookView.php";

    class BookController{

        public BookModel $bookModel;
        protected BookView $bookView;

        public function __construct()
        {
            $this->bookModel = new BookModel();
            $this->bookView = new BookView();
        }

        public function index()
        {
            $books = $this->bookModel->index();
            $this->bookView->loadView('index',['books' => $books]);
        }
        public function create()
        {
            $this->bookView->loadView('create');
        }
        public function store()
        {
            $this->bookModel->store();
            header('Location: /');
        }
        public function edit()
        {
            $book = $this->bookModel->edit();
            $this->bookView->loadView('edit',['book'=>$book]);
        }
        public function update()
        {
            $this->bookModel->update();
            header('Location: /');
        }
        public function delete()
        {
            $this->bookModel->delete();
            header('Location: /');
        }

    }