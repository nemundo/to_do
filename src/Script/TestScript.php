<?php


namespace Nemundo\ToDo\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\ToDo\Workflow\Builder\ToDoBuilder;

class TestScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'todo-test';
    }


    public function run()
    {

        //(new ProcessInstall())->install();
        //(new ToDoInstall())->install();

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 10;
        foreach ($loop->getData() as $number) {
            $builder = new ToDoBuilder();
            $builder->toDo = 'hello ' . $number;
            $builder->saveItem();
        }


        // TODO: Implement run() method.
    }

}