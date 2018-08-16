<?php
use App\LinkedList\LinkedList;
use App\LinkedList\ListNode;

/**
 * Created by PhpStorm.
 * User: ndy40
 * Date: 16/08/2018
 * Time: 14:30
 */

class LinkListTest extends \PHPUnit\Framework\TestCase
{
    public function testLinkedListsCount()
    {
        $totalNodes = 100;

        $theList = new LinkedList();

        for ($i = 1; $i <= $totalNodes; $i++) {
            $theList->insertLast($i);
        }

        $this->assertEquals($totalNodes, $theList->totalNodes());
    }

    public function testInsertingElementsByFirst()
    {
        $totalNodes = 200;

        $theList = new LinkedList();

        for ($i = 1; $i <= $totalNodes; $i++) {
            $theList->insertFirst($i);
        }

        $this->assertEquals($totalNodes, $theList->totalNodes());
    }

    public function testsReverseLinkedList()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $this->assertInstanceOf(ListNode::class, $theLists->lastNode());

        $theLists->reverseList();

        $this->assertEquals($totalNodes, $theLists->totalNodes());

        $this->assertEquals(new ListNode(1), $theLists->lastNode());
    }

    public function testDeleteFirstNode()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $theLists->deleteFirstNode();

        $this->assertEquals($totalNodes - 1, $theLists->totalNodes());

        $this->assertEquals(
            (new ListNode(2))->data,
            $theLists->firstNode()->data
        );
    }

    public function testDeleteLastNode()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $theLists->deleteLastNode();
        $this->assertEquals((new ListNode(99))->data, $theLists->lastNode()->data);
    }

    public function testInsertLastLinkNode()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $theLists->insertLast(22);
        $this->assertEquals(new ListNode(22), $theLists->lastNode());
    }

    public function testFindNodeInLinkList()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $theLists->insertLast(22);
        $node = $theLists->find(22);
        $this->assertEquals((new ListNode(22))->data, $node->data);
    }

    public function testReadNodeData()
    {
        $totalNodes = 100;

        $theLists = new LinkedList();

        for($i = 1; $i <= $totalNodes; $i++) {
            $theLists->insertLast($i);
        }

        $this->assertEquals(55, $theLists->readNode(55));
    }
}