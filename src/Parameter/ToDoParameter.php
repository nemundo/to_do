<?php


namespace Nemundo\ToDo\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ToDoParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'todo';
    }

}