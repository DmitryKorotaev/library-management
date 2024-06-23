<?php

$entityManager = require "config.php";

set_exception_handler(function ($e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
});

function getBooks($entityManager) {
    $bookRepository = $entityManager -> getRepository('Book');
    $books = $bookRepository -> findAll();

    header('Content-Type: application/json');
    echo json_encode(array_map(fn($book) => $book->toArray(), $books));
}

function searchBooks($entityManager, $query) {
    $bookRepository = $entityManager-> getRepository('Book');
    $books = $bookRepository-> createQueryBuilder('b')
        ->where('b.Title LIKE :query OR b.Author LIKE :query')
        ->setParameter("query", '%'.$query.'%')
        ->getQuery()
        ->getResult();

    header('Content-Type: application/json');
    echo json_encode(array_map(fn($book) => $book->toArray(), $books));

}

function createBook($entityManager, $data) {
    $book = new Book();
    $book->setTitle($data['title']);
    $book->setAuthor($data['author']);
    $book->setPublicationYear($data['publication_year']);
    $book->setAvailability($data['availability']);
    $entityManager->persist($book);
    $entityManager->flush();

    // Возвращаем успешный статус
    http_response_code(201); // Created
}

function getBooksId($entityManager, $id) {
    $bookRepository = $entityManager-> getRepository('Book');
    $books = $bookRepository -> find($id);

     if ($book) {
        header('Content-Type: application/json');
        echo json_encode($book->toArray());
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["error" => "Book not found"]);
    }

}

function updateBook($entityManager, $id, $data) {
     $bookRepository = $entityManager->getRepository('Book');
    $book = $bookRepository->find($id);

    if($book) {
        $book->setTitle($data['title'] ?? $book->getTitle())
        $book->setAuthor($data['author'] ?? $book->getAuthor());
        $book->setPublicationYear($data['publication_year'] ?? $book->getPublicationYear());
        $book->setAvailability($data['availability'] ?? $book->getAvailability());
        $entityManager->flush();

        header('Content-Type: application/json');
        echo json_encode($book->toArray());
    } else {
        http_response_code(404)
        echo json_encode(["error" => "Book not found"])
    }
}

// обработка запроса на создание новой книги
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/books') !== false) {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        createBook($entityManager, $data);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid JSON"]);
    }
}
// обработка запроса на получение книги по ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/\/books\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = $matches[1];
    getBookById($entityManager, $id);
}
// обработка запроса на обновление информации о книге по ID
if($_SERVER['REQUEST_METHOD'] === 'PUT' && preg_match('/\/books\/(\d+)/', $_SERVER['REQEST_URL'], $matches)) {
    $id = $matches[1];
    $data = json_decode(file_get_contents('php://input'), true); // — читает JSON данные из тела PUT запроса.
    if ($data) {
        updateBook($entityManager, $id, $data);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid JSON"]);

    }
}
?>