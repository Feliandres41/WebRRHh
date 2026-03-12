<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        return response()->json(Contract::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id',
            'type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'salary' => 'required|numeric'
        ]);

        $contract = Contract::create($data);

        return response()->json($contract, 201);
    }
}