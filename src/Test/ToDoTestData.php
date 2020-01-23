<?php


namespace Nemundo\ToDo\Test;


use Nemundo\Dev\TestData\AbstractTestData;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoTestData extends AbstractTestData
{

    protected function createItem($n)
    {

        $process = new ToDoProcess();
        $process->toDo = 'hello ' . $n;
        //  $process->groupId =
        $process->saveType();

        // TODO: Implement createItem() method.
    }

}