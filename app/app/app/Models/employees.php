<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class employees extends Model
{   
    private $employee_id;
    private $user_name = "";
    private $password_hash;
    private $role;

    public function setEmployeeID($employee_id) {
        $this->employee_id = $employee_id;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    public function setPasswordHash($password_hash) {
        $this->password_hash = $password_hash;
    }

    public function addEmployee() {
        if ($this->checkExists($this->user_name, $this->employee_id)) {
            DB::insert("insert into employees(employee_id, user_name, password_hash, role) values (?,?,?,?)", [$this->employee_id, $this->user_name, $this->password_hash, "employee"]);
        }
    }

    public function addManager() {
        if ($this->checkExists($this->user_name, $this->employee_id)) {
            DB::insert("insert into employees(employee_id, user_name, password_hash, role) values (?,?,?,?)", [$this->employee_id, $this->user_name, $this->password_hash, "manager"]);
        }
    }

    public function getAllEmployees() {
        $employees = DB::select("select employee_id, user_name, password_hash, role from employees");
        return $employees;
    }

    public function getOneEmployee($employeeID) {
        $employee = DB::select("select employee_id, user_name, password_hash, role from employees where employee_id = (?)", [$employeeID]);
        return $employee;
    }

    public function deleteEmployee($employeeID) {
        DB::delete("DELETE FROM employees WHERE employee_id = (?)", [$employeeID]);
    }

    private function checkExists($user_name, $employee_id) {
        $employeeName = DB::select('select employee_id from employees where user_name = (?)', ["$user_name"]);
        $employeeID = DB::select('select employee_id from employees where employee_id = (?)', ["$employee_id"]);


        if (empty($employeeName) && empty($employeeID)) {
            return true;
        } else {
            return false;
        }
    }

}
