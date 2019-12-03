<?php


namespace Nemundo\ToDo\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Process\Setup\ProcessSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\ToDo\Data\ToDoCollection;
use Nemundo\ToDo\Script\TestScript;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

$setup=new ScriptSetup();
$setup->addScript(new TestScript());

$setup = new ProcessSetup();
$setup->addProcess(new ToDoProcess());


    }


    public function uninstall()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new ToDoCollection());

    }

}