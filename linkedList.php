<?php

class Node {
    /**
     * Memory pointer that holds the data
     * @var string $data
     */
    private $data;

    /**
     * Memory pointer to the next element in the list
     * @var Node $next
     */
    private $next;

    public function __construct() {
        $this->data = 0;
        $this->next = null;
    }

    /**
     * Sets data into the $data memory pointer
     * @param $data
     */
    public function setData($data): void {
        $this->data = $data;
    }

    /**
     * Gets the data in the $data memory pointer
     * @return string
     */
    public function getData(): string {
        return $this->data;
    }

    /**
     * Makes the linkage in the list and sets the next Node.
     * @param Node $next
     */
    public function setNext($next): void {
        $this->next = $next;
    }

    /**
     * Gets the next Node in the list
     * @return Node|null
     */
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

    /**
     * Inserts data into the list
     * @param string $data
     */
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

    /**
     * Deletes a Node from the linked list.
     * @param string $target
     * @return bool
     */
    public function deleteNode($target): bool {
        if ($this->head) {
            $currentNode = $this->head;
            $previousNode = null;

            // If it finds the Node sets the previous and current nodes to manage the linkage when deleting
            while ($currentNode->getData() != $target && $currentNode->getNext() !== null) {
                $previousNode = $currentNode;
                $currentNode = $currentNode->getNext();
            }

            // If found, unset the current node and create new linkage with previous and next nodes
            if ($currentNode->getData() == $target) {
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

    /**
     * Prints the list of nodes separated by a blank space
     */
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
$list->insertNode('b');
$list->insertNode('a');
$list->insertNode(1);
$list->deleteNode(1);
$list->printList();
