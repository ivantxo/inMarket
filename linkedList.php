<?php

class Node {
    private $data;
    private $next;

    public function __construct() {
        $this->data = 0;
        $this->next = null;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    public function getData(): int {
        return $this->data;
    }

    public function setNext($next): void {
        $this->next = $next;
    }

    public function getNext() {
        return $this->next;
    }
}

class LinkedList {
    /**
     * @var Node $head
     */
    private $head;

    public function __construct() {
        $this->head = null;
    }

    public function insertNode($data): void {
        $newNode = new Node();
        $newNode->setData($data);

        if ($this->head) {
            $currentNode = $this->head;
            while ($currentNode->getNext() !== null) {
                $currentNode = $currentNode->getNext();
            }
            $currentNode->setNext($newNode);
        } else {
            $this->head = $newNode;
        }
    }

    public function deleteNode($target): bool {
        if ($this->head) {
            $currentNode = $this->head;
            $previousNode = null;

            while ($currentNode->getData() !== $target && $currentNode->getNext() !== null) {
                $previousNode = $currentNode;
                $currentNode = $currentNode->getNext();
            }

            if ($currentNode->getData() === $target) {
                if ($previousNode) {
                    $previousNode->setNext($currentNode->getNext());
                    unset($currentNode);
                } else {
                    $this->head = $currentNode->getNext();
                    unset($currentNode);
                }
                return true;
            }
        }
        return false;
    }

    public function printList(): void {
        $currentNode = $this->head;
        while ($currentNode != null) {
            echo $currentNode->getData();
            $currentNode = $currentNode->getNext();
            echo " ";
        }
        echo PHP_EOL;
    }
}

$list = new LinkedList();
$list->insertNode(3);
$list->insertNode(2);
$list->insertNode(1);
$list->insertNode(3);
$list->deleteNode(1);
$list->printList();
