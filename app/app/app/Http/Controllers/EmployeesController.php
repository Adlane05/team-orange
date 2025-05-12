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
        $employee->setEmployeeID(e($data["username"]));
        if (trim($data["password"]) == "" || $data["password"] == null) {
            $employee->addEmployee();
        } else {
            $employee->setPasswordHash(hash("sha256", e($data["password"])));
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
            "username" => ["required"],
            "password" => []
        ],
        [
            "username.required" => "Employee ID cannot be empty",
        ]);
        return $validatedData;
    }
}
