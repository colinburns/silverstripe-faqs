<?php
class FAQCategoryPage extends Page {

	public static $db = array(
		"CategoryName" => "Varchar(50)"
	);

	public static $has_one = array(
	);
	
	function getCMSFields() {
	
		$fields = parent::getCMSFields();
			
		$fields->addFieldToTab("Root.Main", new HeaderField('NewsletterFolder', 'Select the Newsletter Folder', 3));
		$fields->addFieldToTab("Root.Main", new DropdownField('CategoryName','Select a Category of FAQ\'s to display', DataObject::get("FAQ", "")->map("Category", "Category", "-- Select the category to display --")), 'Content');
		
		return $fields;
		
	}
	
	static $icon = "cms/images/famfam-silk/pencil_go";

}
class FAQCategoryPage_Controller extends Page_Controller {

	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		Requirements::javascript('faqs/javascript/jquery.toggle.js');
		Requirements::css('faqs/css/faqs.css');		
	}
	
	function GetFAQs() {
            return DataObject::get("FAQ", "Category = '{$this->CategoryName}'", "Created ASC", "", "");
	}
	
}
