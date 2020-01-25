<?php


namespace Nemundo\ToDo\Script;


use Nemundo\App\Performance\PerformanceStopwatch;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Process\Group\Data\Group\GroupReader;
use Nemundo\Process\Workflow\Model\WorkflowOrmModel;
use Nemundo\ToDo\Install\ToDoClean;
use Nemundo\ToDo\Install\ToDoInstall;
use Nemundo\ToDo\Install\ToDoUninstall;
use Nemundo\ToDo\Test\ToDoTestData;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Login\UserLogin;

class ToDoCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'todo-clean';
    }


    public function run()
    {

        (new ToDoClean())->cleanData();

    }

}