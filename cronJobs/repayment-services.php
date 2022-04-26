<?php

/**
 * PHP MySQL Transaction Demo
 */
class TransactionDemo
{

    const DB_HOST = 'localhost';
    const DB_NAME = 'classicmodels';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    public $orange_credit_payment_history = "orange_credit_payment_history";
    public $orange_credits_accounts = "orange_credits_accounts";
    public $orange_credit_transactions = "orange_credit_transactions";

    /**
     * Open the database connection
     */
    public function __construct()
    {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * PDO instance
     * @var PDO
     */
    private $pdo = null;

    /**
     * Transfer money between two accounts
     * @param int $sender_id
     * @param int $send_account
     * @param int $receive_account
     * @param float $amount
     * @return true on success or false on failure.
     */
    public function transfer($sender_id, $send_account, $receive_account, $amount)
    {

        try {
            $this->pdo->beginTransaction();

            // get available amount of the transferee account
            $sql = 'SELECT `account_balance` FROM `orange_credits_accounts` WHERE `acct_number`=:from';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(":from" => $send_account));
            $availableAmount = (int)$stmt->fetchColumn();
            $stmt->closeCursor();

            if ($availableAmount < $amount) {
                echo 'Insufficient amount to transfer';
                return false;
            }
            // deduct from the transferred account
            $sql_update_from = 'UPDATE `orange_credits_accounts`
				SET `account_balance` = (account_balance - :amount)
				WHERE `acct_number` = :from';
            $stmt = $this->pdo->prepare($sql_update_from);
            $stmt->execute(array(":from" => $send_account, ":amount" => $amount));
            $stmt->closeCursor();

            // add to the receiving account
            $sql_update_to = 'UPDATE `orange_credits_accounts`
                                SET `account_balance` = (account_balance + :amount)
                                WHERE `acct_number` = :to';
            $stmt = $this->pdo->prepare($sql_update_to);
            $stmt->execute(array(":to" => $receive_account, ":amount" => $amount));
            $stmt->closeCursor();

            // register transactions
            $sql_add_transactions = "INSERT INTO `orange_credit_transactions` SET `transactionid`:transactionid, `sender_id`=:sender_id,`sender_account`=:sender_account,`receiver_id`=:receiver_id,`payment_method`=:payment_method,`amount`=:amount, `payment_status`=:payment_status,`transaction_type`=:transaction_type,`payment_date`=:payment_date";
            $stmt = $this->pdo->prepare($sql_add_transactions);
            $stmt->execute(array(
                ":transactionid" => mt_rand(1000000000, 9999999999),
                ":sender_id" => $sender_id,
                ":sender_account" => $send_account,
                ":receiver_id" => 1,
                ":receiver_account" => $receive_account,
                ":payment_method" => "WALLET TRANSFER PAYMENT",
                ":amount" => $amount,
                ":payment_status" => "APPROVED",
                ":transaction_type" => "CREDIT",
                ":payment_date" => date('Y-m-d H:i:s')));

            // commit the transaction
            $this->pdo->commit();

            echo 'The amount has been transferred successfully';

            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo($e->getMessage());
            return false;
        }
    }

    public function get_scheduled_payment()
    {
        $sql = " SELECT * FROM orange_credit_payment_history WHERE `status`='PENDING' AND `charged_day` = NOW() LIMIT 0 , 50";
        $stmt = $this->pdo->query($sql);
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }

    }


    public function update_scheduled_payment($schedule_id, $userid)
    {
        try {
            $sql = " UPDATE orange_credit_payment_history SET `status`='PAID' WHERE `id`= $schedule_id AND `userid`=$userid";
            $stmt = $this->pdo->query($sql);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }
    }

    /**
     * close the database connection
     */
    public function __destruct()
    {
        // close the database connection
        $this->pdo = null;
    }

}

// test the transfer method
$obj = new TransactionDemo();

// transfer 30K from from account 1 to 2
$obj->transfer(1, 1, 2, 30000);


// transfer 5K from from account 1 to 2
$obj->transfer(1, 1, 2, 5000);