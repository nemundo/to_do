<?php


namespace Nemundo\ToDo\Install;


use Nemundo\Process\Content\Setup\ContentTypeSetup;
use Nemundo\Project\Install\AbstractClean;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoClean extends AbstractClean
{

    public function cleanData()
    {
        // TODO: Implement cleanData() method.


        (new ContentTypeSetup())->removeContent(new ToDoProcess());

    }

}