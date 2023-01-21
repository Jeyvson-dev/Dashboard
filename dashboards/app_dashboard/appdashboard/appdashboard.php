<?php
require_once '../DAO/sql.php';
class AppDashboard{

    private $datas;
    private $dao;

    public function __construct(){
        
        $this->dao = new Sequels();

    }
    //Validar informações do banco
    public function validateInfo($dates){

        $this->datas = $this->dao->sellNumber($dates);
        $this->datas+=$this->dao->totalSells($dates);
        $this->datas+=$this->dao->activeClientes();
        $this->datas+=$this->dao->inactiveClientes();
        $this->datas+=$this->dao->totalExpenses($dates);
        
        return json_encode($this->datas);
    }    
    //Getters
    public function getDatas()
    {
        return $this->datas;
    }
  
    public function getDao()
    {
        return $this->dao;
    }
    //Setters
    public function setDatas($datas)
    {
        $this->datas = $datas;

        return $this;
    }
     
    public function setDao($dao)
    {
        $this->dao = $dao;

        return $this;
    }  
}

?>