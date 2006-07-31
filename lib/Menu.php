<?
/**
 * This is the description for the Class
 *
 * @author		Romans <romans@adevel.com>
 * @copyright	See file COPYING
 * @version		$Id$
 */
class Menu extends CompleteLister {
    function defaultTemplate(){
        return array('shared','Menu');
    }
    function addMenuItem($label,$href=null){
        if(!$href){
            $href=ereg_replace('[^a-zA-Z0-9]','',$label);
            if($label[0]==';'){
                $label=substr($label,1);
                $href=';'.$href;
            }
        }
        $this->data[]=array('page'=>$href, 'href'=>'<a href="'.$this->api->getDestinationURL($href).'">','label'=>$label,
			'tdclass'=>($href==$this->api->page||$href==';'.$this->api->page)?"current":"separator",
			'chref'=>'</a>');

        return $this;
    }
    function addSeparator($label='&nbsp;&nbsp;&nbsp;'){
    	$this->data[]=array('href'=>'', 'label'=>$label, 'tdclass'=>'separator', 'chref'=>'');
    	return $this;
    }
    function init(){

        parent::init();
        $this->safe_html_output=false;
        $this->setStaticSource(array());
        $this->template->trySet($this->api->apinfo);
    }
}
