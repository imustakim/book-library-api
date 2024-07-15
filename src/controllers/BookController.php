<?php
namespace App\Controllers;

use App\Models\Book;
use PDO;

class BookController
{
    private $book;

    public function __construct($db)
    {
        $this->book = new Book($db);
    }

    public function index()
    {
        echo json_encode($this->book->all());
    }

    public function show($id)
    {
        echo json_encode($this->book->find($id));
    }

    public function store($data)
    {
        echo json_encode($this->book->create($data));
    }

    public function update($id, $data)
    {
        echo json_encode($this->book->update($id, $data));
    }

    public function destroy($id)
    {
        echo json_encode($this->book->delete($id));
    }
}
?>