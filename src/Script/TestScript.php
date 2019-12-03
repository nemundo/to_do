<?php


namespace Nemundo\ToDo\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Process\Install\ProcessInstall;
use Nemundo\ToDo\Install\ToDoInstall;
use Nemundo\ToDo\Workflow\Builder\ToDoBuilder;

class TestScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
   $this->scriptName='todo-test';
    }


    public function run()
    {

        (new ProcessInstall())->install();
       (new ToDoInstall())->install();


        $builder = new ToDoBuilder();
        $builder->toDo = 'hello';
        $builder->createWorkflow();




        // TODO: Implement run() method.
    }

}