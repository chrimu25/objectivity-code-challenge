<?php
class BankAccount {
    private $balance;
    
    public function __construct() {
        $this->balance = 0;
    }
    
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposit of $amount successful.\n";
        } else {
            echo "Invalid amount. Deposit failed.\n";
        }
    }
    
    public function withdraw($amount) {
        if ($amount > 0) {
            if ($this->balance >= $amount) {
                $this->balance -= $amount;
                echo "Withdrawal of $amount successful.\n";
            } else {
                echo "Insufficient balance. Withdrawal failed.\n";
            }
        } else {
            echo "Invalid amount. Withdrawal failed.\n";
        }
    }
    
    public function getBalance() {
        return $this->balance;
    }
}

class Bank {
    private $accounts = [];
    
    public function createAccount() {
        $account = new BankAccount();
        $this->accounts[] = $account;
        echo "Account created successfully. Account number is: " . count($this->accounts) . "\n";
        return $account;
    }
    
    public function getAccount($accountNumber) {
        if (isset($this->accounts[$accountNumber-1])) {
            return $this->accounts[$accountNumber-1];
        } else {
            echo "Invalid account number.\n";
            return null;
        }
    }
}


$bank = new Bank();
$account1 = $bank->createAccount();
$account1->deposit(1000);
$account1->withdraw(500);
echo "Account balance is: " . $account1->getBalance() . "\n";