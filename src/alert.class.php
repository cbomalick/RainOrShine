<?php

class Alert{
    
    public function __construct(){
    }

    public function successAlert($body){
        //Display an error message for the user
        $this->alertId = "successAlert";
        $this->color = "success";
        $this->subject = "Success";
        $this->body = $body;
        $this->display();
    }

    public function errorAlert($body){
        //Display an error message for the user
        $this->alertId = "errorAlert";
        $this->color = "error";
        $this->subject = "Error";
        $this->body = $body;
        $this->display();
    }

    public function warningAlert($body){
        //Display an error message for the user
        $this->alertId = "warningAlert";
        $this->color = "warning";
        $this->subject = "Warning";
        $this->body = $body;
        $this->display();
    }

    public function display(){
        Echo"<div class=\"wrapper\" style=\"margin: 0;\">
        <div class=\"box alertbox center {$this->color}\">
                <div class=\"alerticon\">
                    <img src=\"images/exclamation.png\" />
                </div>
                <div class=\"boxcontent\">
                    <p><b>{$this->subject}: </b>{$this->body}</p>
                </div>
            </div>
        </div>";
    }
}

?>