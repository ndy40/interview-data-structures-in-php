<?php

namespace App\LinkedList;

class LinkedList
{
    private $firstNode;

    private $lastNode;

    private $count;

    function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function isEmpty()
    {
        return ($this->firstNode === null);
    }

    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        if (is_null($this->lastNode)) {
            $this->lastNode = &$link;
        }

        $this->count++;
    }

    public function insertLast($data)
    {
        if (!is_null($this->firstNode)) {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = null;
            $this->lastNode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;

        if (!is_null($this->firstNode)) {
            $this->count--;
        }

        return $temp;
    }

    public function deleteLastNode()
    {
        if (!is_null($this->firstNode)) {

            if (is_null($this->firstNode->next)) {
                $this->firstNode = null;
                $this->count--;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;

                while ($currentNode->next !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->lastNode = $previousNode; // I try to track what the last node is after all operations.
                $this->count--;
            }
        }
    }

    public function find($key)
    {
        $current = $this->firstNode;

        while ($current->data !== $key) {

            if ($current->next === null) {
                return null;
            } else {
                $current = $current->next;
            }
        }

        return $current;
    }


    public function readNode($index)
    {
        if ($index <= $this->count) {

            $current = $this->firstNode;

            $pos = 1;

            while ($pos != $index) {
                if ($current->next === null)
                {
                    return null;
                } else {
                    $current = $current->next;
                }

                $pos++;
            }

            return $current->data;
        }

        return null;
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != null) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }

        return $listData;
    }

    public function reverseList()
    {
        if ($this->firstNode !== null) {

            if ($this->firstNode->next !== null) {
                $current = $this->firstNode;
                $lastNode = $current;
                $newNode = null;

                while ($current !== null) {
                    $temp = $current->next;
                    $current->next = $newNode;
                    $newNode = $current;
                    $current = $temp;
                }

                $this->firstNode = $newNode;
                $this->lastNode = $lastNode;
            }
        }
        
    }

    public function lastNode()
    {
        return $this->lastNode;
    }

    public function firstNode()
    {
        return $this->firstNode;
    }
}