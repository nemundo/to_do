<?php


$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();
(new \Nemundo\ToDo\Widget\ToDoWidget($document));
$document->render();
