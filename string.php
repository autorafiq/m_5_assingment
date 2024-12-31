<?php

class Book {
    // Private properties
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Get the number of available copies
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Borrow a book method
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    // Return a book method
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private properties
    private $name;
    private $borrowedBooks = [];

    // Constructor to initialize properties
    public function __construct($name) {
        $this->name = $name;
    }

    // Get the member's name
    public function getName() {
        return $this->name;
    }

    // Borrow a book method
    public function borrowBook($book) {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            //echo "{$this->name} borrowed '{$book->getTitle()}'.\n";
        } else {
            echo "Sorry, '{$book->getTitle()}' is not available.\n";
        }
    }

    // Return a book method
    public function returnBook($book) {
        foreach ($this->borrowedBooks as $key => $borrowedBook) {
            if ($borrowedBook === $book) {
                unset($this->borrowedBooks[$key]);
                $book->returnBook();
                //echo "{$this->name} returned '{$book->getTitle()}'.\n";
                return;
            }
        }
        echo "{$this->name} does not have '{$book->getTitle()}' to return.\n";
    }
}
// TODO: Create 2 books with the following properties
//Book 1 - Name: The Great Gatsby, Available Copies: 5.
//Book 2 - Name: To Kill a Mockingbird, Available Copies: 3.
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// TODO: Create 2 members with the following properties
//Member 1 - Name: John Doe
//Member 2 - Name: Jane Smith
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// TODO: Apply Borrow book method to each member
$member1->borrowBook($book1);
$member2->borrowBook($book2);

// TODO: Print Available Copies with their names

echo "Available copies of '{$book1->getTitle()}': {$book1->getAvailableCopies()}";
echo "<br>";
echo "Available copies of '{$book2->getTitle()}': {$book2->getAvailableCopies()}";

?>
