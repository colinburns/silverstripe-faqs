<?php
class FAQ extends DataObject {

    //db fields
    static $db = array (
        'Question' => 'Varchar(255)',
        'Answer' => 'HTMLText',
        'Category' => 'Varchar(100)',
        'Ranking' => 'Int'
    );
     
    //Relations
    static $has_one = array (
        'FAQPage' => 'FAQPage'
    );
     
    //Fields to show in the DOM table
    static $summary_fields = array(
        'Question' => 'Question',
        'Category' => 'Category',
        'Ranking' => 'Ranking'
    );
     
    //Fields for the DOM Popup
//    public function getCMSFields()
//    {
//        return new FieldList(
//            new TextField('Question'),
//            new TextField('Category'),
//            new TextField('Ranking', 'Ranking [sorted by Category and then Ranking - lower numbers are displayed first]'),
//            new SimpleTinyMCEField('Answer', 'Answer', 5)
//        );
//    }
	
	//Needed for sidebar to work
	function canView($member = null)
	{
		return true;
	}

	//Return the Name as a menu title
	public function MenuTitle(){
		return $this->Name;
	}
	
	//Return the link to view this FAQ
	public function Link()
	{
		if($FAQPage = $this->FAQPage())
		{
			return $FAQPage->Link('show/') . $this->ID;	
		}
	}
	
	public function LinkingMode()
	{
		//Check that we have a controller to work with and that it is a FAQ
		if($Controller = Controller::CurrentPage() && Controller::CurrentPage()->ClassName == 'FAQPage')
		{
			//check that the action is 'show' and that we have a FAQ to work with
			if(Controller::CurrentPage()->getAction() == 'show' && $FAQ = Controller::CurrentPage()->getFAQ())
			{
				//If the current FAQ is the same as this return 'current' class
				return ($FAQ->ID == $this->ID) ? 'current' : 'link';
			}
		}
	}
}
