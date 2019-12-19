<?php


namespace Nemundo\ToDo\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Process\Content\Setup\ContentTypeSetup;
use Nemundo\Process\Workflow\Setup\ProcessSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\ToDo\Data\ToDoCollection;
use Nemundo\ToDo\Script\TestScript;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\ToDo\Workflow\Type\ToDoAddContentType;

class ToDoInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new TestScript());

        $setup = new ProcessSetup();
        $setup->addProcess(new ToDoProcess());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ToDoAddContentType());


    }



}