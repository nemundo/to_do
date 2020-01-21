<?php


namespace Nemundo\ToDo\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\ToDo\Install\ToDoInstall;
use Nemundo\ToDo\Install\ToDoUninstall;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Login\UserLogin;

class TestScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'todo-test';
    }


    public function run()
    {


        //(new ProcessInstall())->install();
        //(new ToDoUninstall())->uninstall();
        //(new ToDoInstall())->install();
        //$model=new ToDoModel();
        //$model->workflowId

        $login = new UserLogin();
        $login->login = 'qm';
        $login->passwordVerification=false;
        $login->loginUser();

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 10;
        foreach ($loop->getData() as $number) {
            $process = new ToDoProcess();
            $process->toDo = 'hello ' . $number;
            $process->saveType();
        }

    }

}