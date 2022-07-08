<?php

    namespace Autoload\Class\Mysql;

    use PDO;
    use PDOException;

    class Mysql
    {

        private array $_CONNECTION;

        public function __construct(
            array $_CONNECTION
        )
        {
            $this->dbDriver    = $_CONNECTION['DRIVER'];
            $this->dbHost      = $_CONNECTION['HOST'];
            $this->dbName      = $_CONNECTION['NAME'];
            $this->dbCharset   = $_CONNECTION['CHARSET'];
            $this->dbUser      = $_CONNECTION['USER'];
            $this->dbPassword  = $_CONNECTION['PASSWD'];
        }

        public function mysqlExe($query, $parametros = null) {

            $resultados = null;

            $ligacao = new PDO($this->dbDriver.':host=' . $this->dbHost . ';dbname=' . $this->dbName . ';charset=' . $this->dbCharset, $this->dbUser, $this->dbPassword, array(PDO::ATTR_PERSISTENT => TRUE)
            );


            $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($parametros != null) {
                $classCrud = $ligacao->prepare($query);
                $classCrud -> execute($parametros);
                $resultados = $classCrud->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $classCrud = $ligacao->prepare($query);
                $classCrud -> execute();
                $resultados = $classCrud->fetchAll(PDO::FETCH_ASSOC);
            }

            $ligacao = null;

            return $resultados;
        }

        public function mysqlNon($query, $parametros = null) {

            $ligacao = new PDO($this->dbDriver.':host=' . $this->dbHost . '; dbname=' . $this->dbName . ';charset=' . $this->dbCharset, $this->dbUser, $this->dbPassword, array(PDO::ATTR_PERSISTENT => TRUE)
            );


            $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $ligacao->beginTransaction();

            try {
                if ($parametros != null) {
                    $classCrud = $ligacao->prepare($query);
                    $classCrud->execute($parametros);
                } else {
                    $classCrud = $ligacao->prepare($query);
                    $classCrud->execute();
                }
                $ligacao->commit();
                return true;
            } catch (PDOException $e) {
                
                $ligacao->rollBack();
                
                return false;
            }
            $ligacao = null;
        }

    }