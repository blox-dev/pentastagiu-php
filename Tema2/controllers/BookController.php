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
            $data = $this->bookModel->create();
            $this->bookView->loadView('create',$data);
        }
        public function store()
        {
            $this->bookModel->store();
            header('Location: /');
        }
        public function edit()
        {
            $data = $this->bookModel->edit();
            $this->bookView->loadView('edit',$data);
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