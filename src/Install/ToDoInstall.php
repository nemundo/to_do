<?php


namespace Nemundo\ToDo\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\ToDo\Data\ToDoCollection;

class ToDoInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());


    }


    public function uninstall()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new ToDoCollection());

    }

}