<?php

namespace Nemundo\ToDo;

use Nemundo\Project\AbstractProject;

class ToDoProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'ToDo';
        $this->projectName = 'todo';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

    }

}