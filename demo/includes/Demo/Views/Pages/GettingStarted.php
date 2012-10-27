<?php
/**
* Demo\Views\Pages
*/
namespace Demo\Views\Pages
{
    /**
* @ignore
*/
    defined('IN_DEMO') or exit;
    
    /**
* GettingStarted
*/
    class GettingStarted extends \Desai\View
    {
        /**
* __construct
*
* Creates an instance of the Template view.
*
* @access pubic
* @param void
* @return void
*/
        public function __construct(array $data = array())
        {
            parent::__construct(ROOT_PATH . 'templates' . DIRECTORY_SEPARATOR . 'pages/getting-started.tmpl.php', $data);
        }
        
        /**
* content
*
* Accessor/mutator method for the content child view.
*
* @access public
* @param \Desai\View Contains the child view to render as the main content page.
* @return mixed
*/
        public function content(\Desai\View $view = null)
        {
            if( null === $view ) {
                return $this->_content;
            }
            
            $this->_content = $view;
            return $this;
        }
        
        /**
* @see \Desai\View::beforeRender
*/
        protected function beforeRender()
        {
            $this->set('content', $this->_content);
            
            parent::beforeRender();
        }
    }
}