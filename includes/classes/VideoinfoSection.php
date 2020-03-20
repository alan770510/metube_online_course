<?php
require_once('./includes/classes/VideoinfoControls.php');

class VideoinfoSection
{
    private $con,$video,$userLoggedInObj;

    public function  __construct($con,$video,$userLoggedInObj)
    {
        $this->con = $con;
        $this->video = $video;
        $this->userLoggedInObj = $userLoggedInObj;
    }
    public function create(){
      return $this->getVideoInfo().$this->getUserInfo();

    }
    private function getVideoInfo(){
        $title = $this->video->getTitle();
        $views = $this->video->getViews();
        $videoInfoControls = new VideoInfoControls($this->video,$this->userLoggedInObj);
        $controls = $videoInfoControls->create();
        return "
            <div class='video-info'>
                <h1>$title</h1>
                <div class='bottom-section'>
                    <span class='view-count'>$views</span>
                    $controls
                 </div>
              </div>
            ";
    }
    private function getUserInfo(){
        return "";
    }

}