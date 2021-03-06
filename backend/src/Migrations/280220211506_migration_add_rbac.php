<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class MigrationAddRbac
{
    private $conn;


    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function commit()
    {
            $result = mysqli_query($this->conn, "CREATE TABLE `rbac_role`(
            `role` varchar(64) not null UNIQUE
            ) engine = InnoDB default char set utf8");

            if (!$result) {
                print mysqli_query($this->conn). PHP_EOL;
            }

            $result = mysqli_query($this->conn, "CREATE TABLE `rbac_permission`(
            `permission` varchar(128) not null UNIQUE
            ) engine = InnoDB default char set utf8");

            if (!$result) {
                print mysqli_query($this->conn). PHP_EOL;
            }

            $result = mysqli_query($this->conn, "CREATE TABLE `rbac_access`(
            `role` varchar(128) not null,
            `permission` varchar(128) not null
            ) engine = InnoDB default char set utf8");

            if (!$result) {
                print mysqli_query($this->conn). PHP_EOL;
            }

            $result = mysqli_query($this->conn, "INSERT INTO `rbac_role` (`roles`) 
            VALUES ('ROLE_ADMIN'), ('ROLE_MANAGER'),('ROLE_SHOP_MANAGER'), ('ROLE_PRODUCT_MANAGER')");
            if (!$result)
            {
                print mysqli_error($this->conn) . PHP_EOL;
            }

            //Shop Product Delivery Payment
            $result = mysqli_query($this->conn, "INSERT INTO `rbac_permission` (`permission`) 
            VALUES
                ('ROLE_READ'), 
                ('ROLE_CREATE'),
                ('ROLE_UPDATE'), 
                ('ROLE_DELETE'),
                ('PRODUCT_READ'), 
                ('PRODUCT_CREATE'),
                ('PRODUCT_UPDATE'), 
                ('PRODUCT_DELETE'),
                ('DELIVERY_READ'), 
                ('DELIVERY_CREATE'),
                ('DELIVERY_UPDATE'), 
                ('DELIVERY_DELETE'),
                ('PAYMENT_READ'), 
                ('PAYMENT_CREATE'),
                ('PAYMENT_UPDATE'), 
                ('PAYMENT_DELETE')
            ");
            if (!$result)
            {
                print mysqli_error($this->conn) . PHP_EOL;
            }


            //Shop Product Delivery Payment
            $result = mysqli_query($this->conn,
                "INSERT INTO `rbac_access` (`role`, `permission`) 
            VALUES
                ('ROLE_ADMIN', 'ROLE_READ'), 
                ('ROLE_ADMIN', 'ROLE_CREATE'),
                ('ROLE_ADMIN', 'ROLE_UPDATE'), 
                ('ROLE_ADMIN', 'ROLE_DELETE'),
                ('ROLE_ADMIN', 'PRODUCT_READ'), 
                ('ROLE_ADMIN', 'PRODUCT_CREATE'),
                ('ROLE_ADMIN', 'PRODUCT_UPDATE'), 
                ('ROLE_ADMIN', 'PRODUCT_DELETE'),
                ('ROLE_ADMIN', 'DELIVERY_READ'), 
                ('ROLE_ADMIN', 'DELIVERY_CREATE'),
                ('ROLE_ADMIN', 'DELIVERY_UPDATE'), 
                ('ROLE_ADMIN', 'DELIVERY_DELETE'),
                ('ROLE_ADMIN', 'PAYMENT_READ'), 
                ('ROLE_ADMIN', 'PAYMENT_CREATE'),
                ('ROLE_ADMIN', 'PAYMENT_UPDATE'), 
                ('ROLE_ADMIN', 'PAYMENT_DELETE'),
                ('ROLE_MANAGER', 'ROLE_READ'), 
                ('ROLE_MANAGER', 'PRODUCT_READ'), 
                ('ROLE_MANAGER', 'DELIVERY_READ'), 
                ('ROLE_MANAGER', 'PAYMENT_READ') 

            ");
            if (!$result)
            {
                print mysqli_error($this->conn) . PHP_EOL;
            }
        }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `rbac_role`");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "DROP TABLE `rbac_permission`");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "DROP TABLE `rbac_access`");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}