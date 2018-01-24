<?php

/**
 * Description of FromController
 *
 * @author MAURICIO PINZÓN
 */

require_once './SLibs/SConnection.php';

class FromController {
    
    private $con;
    
    private function connectDB(){
        
        $this->con = new SConnection();
        
    }
    
    public function getNktis(){
        
        $this->connectDB();
        
        $i = 0;
        $res = $this->con->sQuery('select kf1, kf2 from nktis() as ("kf1" integer,"kf2" varchar);');
    
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            $this->requestq[$i] = $row;
            $i++;
        }
        
        $this->con->sCloseConecction();
        return $this->requestq;
        
    }
    
    public function getNktiss($filter){
        
        $this->connectDB();
        
        $i = 0;
        $res = $con->sQuery('select kf1, kf2 from nktisss('.$filter.') as ("kf1" integer, "kf2" varchar);');
    
        while($row = $res->fetch(PDO::FETCH_OBJ)){
            $this->requestq[$i] = $row;
            $i++;
        }
        
        $this->con->sCloseConecction();
        return $this->requestq;
        
    }
    
}
