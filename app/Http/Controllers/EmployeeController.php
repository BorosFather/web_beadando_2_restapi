<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends BaseController
{
    public function index() {
        $employees = Employee::all();

        return $this->sendResponse(EmployeeResource::collection($employees), "ok");
    }

    public function store(Request $request) {

        $input = $request->all();

        $validator = Validator::make($input, [
            "name" => "required",
            "city" => "required",
            "salary" => "required"
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $employee = Employee::create($input);

        return $this->sendResponse(new EmployeeResource($employee), "megcsinálva");
    }

    public function update(Request $request, $id) {

        $input = $request->all();

        $validator = Validator::make($input, [
            "name" => "required",
            "city" => "required",
            "salary" => "required"
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $employee = Employee::findOrFail($id);
        $employee->update($input);

        return $this->sendResponse(new EmployeeResource($employee), "frissítve");
    }

    public function destroy($id) {

        $employee = Employee::findOrFail($id);
        $employee->delete();

        return $this->sendResponse([], "Dolgozó törölve.");
    }
} 

