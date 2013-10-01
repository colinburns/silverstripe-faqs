<?php
class FAQCategoryPage extends Page {

    private static $db = array(
		"CategoryName" => "Varchar(50)"
	);

    private static $has_one = array(
	);
	
	function getCMSFields() {

		$fields = parent::getCMSFields();

        $faqs = FAQ::get();
        $categoryMap = array();
        if($faqs)foreach($faqs AS $faq){
            $categoryMap[$faq->Category] = $faq->Category;
        }

		$fields->addFieldToTab("Root.Main", new HeaderField('NewsletterFolder', 'Select the Newsletter Folder', 3));
		$fields->addFieldToTab("Root.Main", new DropdownField('CategoryName','Select a Category of FAQ\'s to display', $categoryMap), 'Content');

		return $fields;
		
	}

    private static $icon = "cms/images/famfam-silk/pencil_go";

}
class FAQCategoryPage_Controller extends Page_Controller {

    private static $allowed_actions = array ();

	public function init() {
		parent::init();
		Requirements::javascript('faqs/javascript/jquery.toggle.js');
		Requirements::css('faqs/css/faqs.css');		
	}
	
	function GetFAQs() {
        return DataObject::get("FAQ", "Category = '{$this->CategoryName}'", "Created ASC", "", "");
	}
	
}
