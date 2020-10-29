class Node {
  constructor() {
    this.data = 0;
    this.next = null;
  }

  setData(data) {
    this.data = data;
  }

  getData() {
    return this.data;
  }

  setNext(next) {
    this.next = next;
  }

  getNext() {
    return this.next;
  }
}

class LinkedList {
  constructor() {
    this.head = null;
  }

  insertNode(data) {
    const newNode = new Node();
    newNode.setData(data);
    if (this.head) {
      let currentNode = this.head;
      while (currentNode.getNext() !== null) {
        currentNode = currentNode.getNext();
      }
      currentNode.setNext(newNode);
    } else {
      this.head = newNode;
    }
  }

  deleteNode(target) {
    if (this.head) {
      let currentNode = this.head;
      let previousNode = null;
      while (currentNode.getData() !== target && currentNode.getNext() !== null) {
        previousNode = currentNode;
        currentNode = currentNode.getNext();
      }
      if (currentNode.getData() === target) {
        if (previousNode) {
          previousNode.setNext(currentNode.getNext());
          currentNode = null;
        } else {
          this.head = currentNode.getNext();
          currentNode = null;
        }
        return true;
      }
    }
    return false;
  }

  printList() {
    let currentNode = this.head;
    while (currentNode !== null) {
      console.log(currentNode.getData());
      currentNode = currentNode.getNext();
    }
  }
}

const list = new LinkedList();
list.insertNode(2);
list.insertNode(1);
list.insertNode(3);
list.deleteNode(3);
list.printList();
