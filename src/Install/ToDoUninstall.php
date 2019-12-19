<?php


namespace Nemundo\ToDo\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Process\Content\Setup\ContentTypeSetup;
use Nemundo\Process\Workflow\Setup\ProcessSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Project\Install\AbstractUninstall;
use Nemundo\ToDo\Data\ToDoCollection;
use Nemundo\ToDo\Script\TestScript;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\ToDo\Workflow\Type\ToDoAddContentType;

class ToDoUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new ToDoCollection());



    }



}