<?php

    class Post {

        public function __construct(){
            $this->connect  = Database::getInstance()->getConnection();
        }

        public function get(){
            $sql = "SELECT * FROM posts";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();

            if(count($row) > 0){
                foreach($row as $row){
                    Echo"Records";
                }
            } else {
                Echo"No records";
            }
        }

        public function post($json){

            //Validation block
            $json = json_decode($json);
            // $config = parse_ini_file('src/config.ini');
            // $INTERNAL_KEY = $config['internal_key'];
            // $SUBMITTED_KEY = $json->key ?? null;
            
            // //Any post to API must have correct key
            // if($INTERNAL_KEY != $SUBMITTED_KEY){
            //     Echo "Error: Invalid Key";
            //     exit();
            // }

            //Pull new IP and timestamp values instead of using provided
            $this->timestamp = date("Y-m-d H:i:s");
            $this->ipAddress = $_SERVER['REMOTE_ADDR'];

            if($this->rateLimit($this->ipAddress)){
                Echo"Error: Limit 1 Post Per Hour";
                exit();
            }

            //Truncate characters if they exceed field size and default values if not given
            $this->city = substr($json->city ?? "", 0, 100);
            $this->state = substr($json->state ?? "", 0, 100);
            $this->temp = substr($json->temp ?? 0, 0, 4);
            $this->description = substr($json->description ?? "", 0, 100);
            $this->icon = substr($json->icon ?? "", 0, 10);
            $this->tempMin = substr($json->tempMin ?? 0, 0, 4);
            $this->tempMax = substr($json->tempMax ?? 0, 0, 4);
            $this->humidity = substr($json->humidity ?? 0, 0, 4);

            // Echo"<pre>";
            // var_dump($this);
            // Echo"</pre><br><br>";

            if(empty($this->city) || empty($this->state) || empty($this->temp) || empty($this->description) || empty($this->icon) || 
                empty($this->tempMin) || empty($this->tempMax) || empty($this->humidity)){
                Echo "Error: Invalid Details";
                exit();
            }

            // //Insert into database
            $sql = "INSERT INTO posts 
            (ipaddress,datetime,city,state,temp,description,high,low,humidity,icon) VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$this->ipAddress, $this->timestamp, $this->city, $this->state, $this->temp, 
            $this->description, $this->tempMax, $this->tempMin, $this->humidity, $this->icon]);
        
            Echo "Added Successfully!";
        }

        private function rateLimit($ip){
            //Limit user to 1 post per hour per IP
            $sql = "SELECT count(seqno) FROM posts where ipaddress = ? AND datetime >= (now() - INTERVAL 30 MINUTE)";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute([$ip]);
            $row = $stmt->fetch();
            $count = (int) $row['count(seqno)'];
 
            if($count > 0){
                return true;
            } else {
                return false;
            }
        }
    }

?>