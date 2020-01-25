<?php


namespace Nemundo\ToDo\Test;


use Nemundo\Core\Random\RandomNumber;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Dev\TestData\AbstractTestData;
use Nemundo\Process\Group\Data\Group\GroupReader;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoTestData extends AbstractTestData
{

    protected function createItem($n)
    {

        $process = new ToDoProcess();
        $process->toDo = 'hello ' . $n;
        //  $process->groupId = (new GroupReader())->addRandomOrder()->getRow()->id;

        $process->saveType();

        $process->changeAssignment((new GroupReader())->addRandomOrder()->getRow()->id);
$process->changeDeadline((new Date())->setNow()->addDay((new RandomNumber())->getNumber()));


        // TODO: Implement createItem() method.
    }

}