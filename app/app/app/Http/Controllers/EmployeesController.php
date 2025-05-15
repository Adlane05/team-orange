<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\employees;

class EmployeesController extends Controller
{
    public static function addEmployee(Request $request) {
        $data = self::validateData($request);
        $employee = new employees();
        $employee->setEmployeeID(e($data["employeeID"]));
        $employee->setPasswordHash(hash("sha256", e($data["password"])));
        $employee->setUserName(e($data["username"]));
        if (e($data["role"]) == "employee") {
            $employee->addEmployee();
        } else if (e($data["role"]) == "manager"){
            $employee->addManager();
        }
    }

    public static function deleteEmployee($employeeID) {
        $employee = new employees();
        $employee->deleteEmployee($employeeID);
    }

    public static function getAllEmployees() {
        $employee = new employees();
        return $employee->getAllEmployees();
    }

    private static function validateData(Request $request) {
        $validatedData = $request->validate([
            "employeeID" => ["required"],
            "username" => ["required"],
            "password" => ["required"],
            "role" => ["required"]
        ],
        [
            "employeeID.required" => "Employee ID cannot be empty",
            "username.required" => "Employee name cannot be empty",
        ]);
        return $validatedData;
    }
}
