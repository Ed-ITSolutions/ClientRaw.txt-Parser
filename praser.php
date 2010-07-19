<?php
class clientraw {
    protected $path;
    public $raw, $rawextra, $daily, $hour, $named;
    public function __construct($path){
        $this->path = $path;
        $this->load_and_split();
        $this->create_named();
    }

    function load_and_split(){
        $current=file_get_contents($this->path."clientraw.txt");
        $this->raw=explode(" ",$current);
        $extra=file_get_contents($this->path."clientrawextra.txt");
        $this->rawextra=explode(" ",$extra);
        $daily=file_get_contents($this->path."clientrawdaily.txt");
        $this->daily=explode(" ",$daily);
        $hour=file_get_contents($this->path."clientrawhour.txt");
        $this->hour=explode(" ",$extra);
    }

    function create_named(){
        $this->named = array(
            "current_temperature" => $this->raw[4],
            "todays_rain_fall" => $this->raw[7],
            "generated" => $this->raw[29].":".$this->raw[30]." ".$this->raw[35]."/".$this->raw[36]."/".$this->raw[141]
        );
    }
}
?>
