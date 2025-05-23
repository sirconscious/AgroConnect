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
                'status' => $farmer->status ?? 'pending',
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

    public function showDetails($id)
    {
        $farmer = Farmer::with(['user', 'farms'])->findOrFail($id);
        
        $nameParts = explode(' ', $farmer->user->name ?? '');
        $firstName = $nameParts[0] ?? '';
        $lastName = count($nameParts) > 1 ? implode(' ', array_slice($nameParts, 1)) : '';
        
        $farm = $farmer->farms;
        
        $farmerData = [
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
            'status' => $farmer->status ?? 'pending',
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

        return view('admin.farmer-details', compact('farmerData'));
    }

    public function confirmFarmer($id)
    {
        $farmer = Farmer::findOrFail($id);
        $farmer->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Farmer confirmed successfully');
    }

    public function rejectFarmer($id)
    {
        $farmer = Farmer::findOrFail($id);
        $farmer->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Farmer rejected successfully');
    }
}
