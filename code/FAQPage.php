<?php 
 
class FAQPage extends Page {
     
    static $has_many = array(
        'FAQs' => 'FAQ'
    );
     
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
         
//        $manager = new DataObjectManager(
//            $this,
//            'FAQs',
//            'FAQ'
//        );
        $manager = new DataObjectManager($this, 'FAQs', 'FAQ', NULL, NULL, NULL, 'Ranking');
        $fields->addFieldToTab("Root.Content.FAQ", $manager);
         
        return $fields;
        
        
        
    }
    
    static $icon = "themes/icentre/images/treeicons/pencil_add";
    
}
 
class FAQPage_Controller extends Page_Controller {
	
    public function init() {
        parent::init();
        Requirements::javascript('faqs/javascript/jquery.toggle.js');
        Requirements::css('faqs/css/faqs.css');
    }
 
    
    function FAQs() {

        $FAQs = DataObject::get('FAQ', '', 'Category ASC, Ranking ASC', '', '');

        if($FAQs) foreach($FAQs AS $FAQ){
            // Here we want to get all the proposals for a given item
            if(Director::urlParam('OtherID') == $FAQ->ID){
                $FAQ->Display = true;
            }else{
                $FAQ->Display = false;
            }

        }
        return $FAQs;

    }
    
}