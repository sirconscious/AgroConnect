<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $farmers = Farmer::with(['user', 'farms'])->get()->map(function ($farmer) {
            $nameParts = explode(' ', $farmer->user->name ?? '');
            $firstName = $nameParts[0] ?? '';
            $lastName = count($nameParts) > 1 ? implode(' ', array_slice($nameParts, 1)) : '';
            
            $farm = $farmer->farms;
            
            return [
                'id' => $farmer->id,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $farmer->user->email ?? '',
                'cin' => $farmer->cin,
                'phone' => $farmer->phone,
                'dob' => $farmer->date_of_birth,
                'address' => $farmer->address,
                'farmName' => $farm->name ?? '',
                'farmLocation' => $farm->location ?? '',
                'farmSize' => $farm->size ?? '',
                'farmingActivities' => $farm ? json_decode($farm->activities ?? '[]') : [],
                'farmDescription' => $farm->description ?? '',
                'status' => $farm->Status ?? 'pending',
                'dateApplied' => $farmer->created_at->format('Y-m-d'),
                'documents' => [
                    'nationalId' => $farm && $farm->nationalId ? asset('storage/' . $farm->nationalId) : null,
                    'farmerCertificate' => $farm && $farm->farmerCertificate ? asset('storage/' . $farm->farmerCertificate) : null,
                    'landDocument' => $farm && $farm->landDocument ? asset('storage/' . $farm->landDocument) : null,
                    'oncaAttestation' => $farm && $farm->oncaAttestation ? asset('storage/' . $farm->oncaAttestation) : null,
                    'agriculturalRegister' => $farm && $farm->agriculturalRegisters ? asset('storage/' . $farm->agriculturalRegisters) : null,
                    'farmDetailsDoc' => $farm && $farm->farmDetailsDoc ? asset('storage/' . $farm->farmDetailsDoc) : null,
                ]
            ];
        });

        return view("admin.farmer-registrations", compact('farmers'));
    }

    public function confirmFarmer($id)
    {
        $farmer = Farmer::findOrFail($id);
        if ($farmer->farms) {
            $farmer->farms->update(['Status' => 'confirmed']);
        }
        return response()->json(['success' => true]);
    }

    public function rejectFarmer($id)
    {
        $farmer = Farmer::findOrFail($id);
        if ($farmer->farms) {
            $farmer->farms->update(['Status' => 'rejected']);
        }
        return response()->json(['success' => true]);
    }
}
