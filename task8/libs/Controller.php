<?php

class Controller
{
		private $model;
		private $view;

		public function __construct()
        {	


echo 'new<br>';

$obj = new Search();

/*$obj->setUrl($url);

 */

//echo $obj->_url; die;
//$obj->getSearchData('php vs python'); 

//die;


		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['search']))
			{	
				$this->sendQuery($_POST['search']);
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendMail()
		{
			if($this->model->checkForm() === true)
			{
				$this->model->sendEmail();
			}
			$mArray = $this->model->getArray();		
	        $this->view->addToReplace($mArray);	
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
        }


        private function sendQuery($query)
        {
            $obj = new Search();
            $arrayData = $obj->getSearchData($query);
            $this->view->addToReplace($arrayData);
        }        
}
