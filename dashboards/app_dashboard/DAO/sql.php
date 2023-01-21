<?php
require_once '../connect/connect.php';

class Sequels extends Connect{

    public function __construct(){
        
        $this->connect();
    }
    //Select "número de vendas por mês e ano"
    public function sellNumber($time){
        
        $sql = "SELECT
                    count(*) as sellNumbersMonth 
                FROM
                    tb_vendas tv 
                WHERE
                    DATE_FORMAT(data_venda, '%Y-%m') = :data
                ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':data',$time);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
    //Select "Toltal de vendas por mês e ano"
    public function totalSells($time){

        $sql = "SELECT
                    sum(total) allSells 
                FROM
                    tb_vendas
                WHERE
                DATE_FORMAT(data_venda, '%Y-%m') = :data
                ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':data',$time);

        $stmt->execute();

        $allSells = $stmt->fetch(PDO::FETCH_ASSOC);

        return $allSells;
    }
    //Select "Clientes ativos"
    public function activeClientes(){

        $sql = "SELECT
                    count(*) as activeClientes
                FROM
                    tb_clientes
                WHERE
                    cliente_ativo = 1
        ";

        $stmt = $this->connection->query($sql);

        $allSells = $stmt->fetch(PDO::FETCH_ASSOC);

        return $allSells;

    }
    //Select "Clientes Inativos"
    public function inactiveClientes(){

        $sql = "SELECT
                    count(*) as inactiveClientes
                FROM
                    tb_clientes
                WHERE
                    cliente_ativo = 0
        ";

        $stmt = $this->connection->query($sql);

        $allSells = $stmt->fetch(PDO::FETCH_ASSOC);

        return $allSells;

    }
    //Select "Total de despesas por mês e ano"
    public function totalExpenses($time){
        
        $sql = "SELECT
                    sum(total) as totalExpenses
                FROM
                    tb_despesas td	
                WHERE
                    DATE_FORMAT(data_despesa, '%Y-%m') = :data
                ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':data',$time);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
}
?>