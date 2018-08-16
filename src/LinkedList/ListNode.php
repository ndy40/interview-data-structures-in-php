<?php
/**
 * Created by PhpStorm.
 * User: ndy40
 * Date: 16/08/2018
 * Time: 15:12
 */

namespace App\LinkedList;

class ListNode
{
    public $data;

    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    function readNode()
    {
        return $this->data;
    }
}