<?php


namespace Nemundo\ToDo\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Process\Group\Data\Group\GroupReader;
use Nemundo\ToDo\Install\ToDoInstall;
use Nemundo\ToDo\Install\ToDoUninstall;
use Nemundo\ToDo\Test\ToDoTestData;
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


        /*$login = new UserLogin();
        $login->login = 'qm';
        $login->passwordVerification=false;
        $login->loginUser();*/

        //(new GroupReader())->addRandomOrder()->getRow()

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 10;
        foreach ($loop->getData() as $number) {


            (new ToDoTestData())->createTestData(1000);

        }

    }

}