<?php

namespace Desai\Form\Fields\Views
{
defined('IN_LIBRARY') or exit;

class Textarea extends \Desai\HTML\Views\Element
{
protected $_text = null;

public function __construct($text = '')
{
parent::__construct('textarea');

$this->_text = new \Desai\HTML\Views\Text($text);

$this->template_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);
$this->template_file('textarea.tmpl.php');
}

// $textarea->text()->value('hello world');
public function text()
{
return $this->_text;
}

public function addChild(\Desai\HTML\Views\Element $child)
{
throw new \Exception('Hey! You cannot use this method. The only child allowed is of type text and is handled internally. Use Textarea::text() method.');
}

public function removeChild(\Desai\HTML\Views\Element $child)
{
throw new \Exception('Hey! You cannot use this method. The only child allowed is of type text and is handled internally. Use Textarea::text() method.');
}

protected function beforeRender()
{
/* We cheat here ... directly append _text onto _children
without enforcing the type */
$this->_children[] = $this->_text;

parent::beforeRender();
}

protected function defaultAttributes()
{
return array_merge(parent::defaultAttributes(), array(
'rows' => '',
'cols' => ''
));
}
}

}


