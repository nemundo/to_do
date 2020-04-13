<?php


namespace Nemundo\ToDo\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Process\App\Wiki\Setup\WikiSetup;
use Nemundo\Process\Workflow\Setup\ProcessSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\ToDo\Content\App\ToDoApp;
use Nemundo\ToDo\Data\ToDoCollection;
use Nemundo\ToDo\Script\TestScript;
use Nemundo\ToDo\Script\ToDoCleanScript;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new TestScript());
        $setup->addScript(new ToDoCleanScript());

        $setup = new ProcessSetup();
        $setup->addProcess(new ToDoProcess());

        (new ToDoApp())->saveType();


        //$setup = new ContentTypeSetup();
        //$setup->addContentType(new ToDoAddContentType());

        //$setup=new WikiSetup();
        //$setup->addContentType(new ToDoProcess());

    }


}