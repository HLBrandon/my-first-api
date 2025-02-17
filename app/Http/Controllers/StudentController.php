<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{

    public function index(): JsonResponse
    {
        $students = Student::all();
        // return StudentResource::collection($students);
        return response()->json(StudentResource::collection($students), 200);
    }

    public function store(StudentCreateRequest $request): JsonResponse
    {
        $student = Student::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "Created successfully",
            "data" => new StudentResource($student)
        ], 201);
    }

    public function show($id)
    {
        if (!Student::where('id', $id)->exists()) {
            return response()->json([
                "status" => false,
                "message" => "Student not found"
            ], 404);
        }
        $student = Student::find($id);
        //return new StudentResource($student);
        return response()->json(new StudentResource($student), 200);
    }

    public function update(StudentUpdateRequest $request, Student $student): JsonResponse
    {
        $student->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Student Updated successfully",
            "data" => new StudentResource($student)
        ], 200);
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return response()->json([
            "status" => true,
            "message" => "Student Deleted successfully"
        ], 200);
    }
}
