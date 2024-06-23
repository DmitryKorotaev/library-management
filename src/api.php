<?php

function getBooks() {
    global $entityManager;
    $bookRepository = $entityManager -> getRepository('Book');
    $books = $bookRepository -> findAll();

    header('Content-Type: application/json');
    echo json_encode($books);
}

function searchBooks($query) {
    global $entityManager;
    $bookRepository = $entityManager-> getRepository('Book');
    $books = $bookRepository-> createQueryBuilder('b')
        ->where('b.Title LIKE :query OR b.Author LIKE :query')
        ->setParameter("query", '%'.$query.'%')
        ->getQuery()
        ->getResult();

    header('Content-Type: application/json');
    echo json_encode($books);

}
?>