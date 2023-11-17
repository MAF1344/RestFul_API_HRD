<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Method untuk menampilkan daftar Employee
    public function index()
    {
        // Menggunakan Model Employee untuk select data
        $employees = Employee::all();

        // jika data kosong maka kirim status code 204
        if ($employees->isEmpty()) {
            $data = [
                "message" => "Resource is Empty"
            ];

            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Get All Emplyees',
            'data' => $employees
        ];

        // Mengirim data (json) dan kode 200 jika berhasil
        return response()->json($data, 200);
    }


    // method untuk menambahkan data Employee
    public function store(Request $request)
    {
        // Validasi data request
        $request->validate([
            "nama" => "required",
            "kelamin_id" => "required",
            "phone" => "required",
            "address" => "required",
            "email" => "required|email",
            "status_id" => "required",
            "hired_on" => "required"
        ]);

        $input = [
            'nama' => $request->nama,
            'kelamin_id' => $request->kelamin_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'status_id' => $request->status_id,
            'hired_on' => $request->hired_on,
        ];


        // Menggunakan model Employee
        $employees = Employee::create($input);

        $data = [
            'message' => 'Employee is created succesfully',
            'data' => $employees,
        ];

        // Mengembalikan data (JSON) dan kode 201 jika data berhasil ditambah
        return response()->json($data, 201);
    }


    // method untuk menampilkan detail dari data Employee
    public function show($id)
    {
        // Mencari detail dari data yang dimaksud
        $employees = Employee::find($id);

        // Jika tidak ditemukan data menampilkan pesan error
        if (!$employees) {
            $data = [
                'message' => 'Data Not Found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get Detail Employees Data',
            'data' => $employees
        ];

        // Mengirim data (json) dan kode 200 jika berhasil dimunculkan
        return response()->json($data, 200);
    }


    // method untuk mengubah data Employee
    public function update(Request $request, $id)
    {
        // Menemukan data mana yang ingin diubah
        $employees = Employee::find($id);

        // jika data tidak ditemukan munculkan pesan error 404
        if (!$employees) {
            $data = [
                'message' => 'Employee not Found'
            ];
            return response()->json($data, 404);
        }

        // mengubah data dari yang sebelumnya
        $employees->update([
            'nama' => $request->nama ?? $employees->nama,
            'kelamin_id' => $request->kelamin_id ?? $employees->kelamin_id,
            'phone' => $request->phone ?? $employees->phone,
            'address' => $request->address ?? $employees->address,
            'email' => $request->email ?? $employees->email,
            'status_id' => $request->status_id ?? $employees->status_id,
            'hired_on' => $request->hired_on ?? $employees->hired_on,
        ]);

        $data = [
            'message' => 'Employee data is updated successfully',
            'data' => $employees,
        ];

        return response()->json($data, 200);
    }


    // method untuk menghapus data Employee
    public function destroy($id)
    {
        // menemukan data mana yang ingin dihapus
        $employees = Employee::find($id);

        // jika data tidak ditemukan tampilkan pesan error 404
        if (!$employees) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employees->delete();

        // Menampilkan pesan jika data berhasil dihapus
        $data = [
            'message' => 'Employee has been deleted successfully',
        ];

        return response()->json($data, 200);
    }


    // method untuk menampilkan detail dari data Employee
    public function search($nama)
    {
        $employee = Employee::where('nama', $nama)->first();

        // Jika tidak ditemukan data, menampilkan pesan error
        if (!$employee) {
            $data = [
                'message' => 'Data Not Found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get Detail Employees Data by Name',
            'data' => $employee
        ];

        // Mengirim data (json) dan kode 200 jika berhasil dimunculkan
        return response()->json($data, 200);
    }


    // Menampilkan data yang memiliki status active
    public function active()
    {
        $employee = Employee::where('status_id', 1)->get();

        // Jika tidak ada data yang ditemukan, menampilkan pesan error
        if ($employee->isEmpty()) {
            $data = [
                'message' => 'Data Not Found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get Active Employees Data',
            'data' => $employee
        ];

        // Mengirim data (json) dan kode 200 jika berhasil dimunculkan
        return response()->json($data, 200);
    }

    // Menampilkan data yang memiliki status inactive
    public function inactive()
    {
        $employee = Employee::where('status_id', 2)->get();

        // Jika tidak ada data yang ditemukan, menampilkan pesan error
        if ($employee->isEmpty()) {
            $data = [
                'message' => 'Data Not Found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get Inactive Employees Data',
            'data' => $employee
        ];

        // Mengirim data (json) dan kode 200 jika berhasil dimunculkan
        return response()->json($data, 200);
    }

    // Menampilkan data yang memiliki status terminated
    public function terminated()
    {
        $employee = Employee::where('status_id', 3)->get();

        // Jika tidak ada data yang ditemukan, menampilkan pesan error
        if ($employee->isEmpty()) {
            $data = [
                'message' => 'Data Not Found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Get Terminated Employees Data',
            'data' => $employee
        ];

        // Mengirim data (json) dan kode 200 jika berhasil dimunculkan
        return response()->json($data, 200);
    }
}
