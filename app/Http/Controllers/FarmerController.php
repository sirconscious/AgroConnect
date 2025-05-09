<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Farmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{
    public function create(){
        return view("Farmer.Create");
    } 
    public function index(){
        return view("Farmer.Dashbored");
    }
    public function store(Request $request){
        // dd($request->all());

        $validated = $request->validate([
            "firstName" => "required|string|max:255",
            "lastName" => "required|string|max:255",
            "cin" => "required",
            "phone" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "date_of_birth" => "required|date",
            "address" => "required|string",
            "farmName" => "required|string|max:255",
            "farmLocation" => "required|string|max:255",
            "farmSize" => "required|numeric|min:0",
            "landOwnership" => "required|string|in:owned,leased,shared,other",
            "farmingActivities" => "required|array|min:1",
            "farmDescription" => "required|string",
            "nationalId" => "required",
            "farmerCertificate" => "required",
            "landDocument" => "required",
            "oncaAttestation" => "nullable",
            "agriculturalRegister" => "nullable",
            "farmDetailsDoc" => "nullable",
            "farmingReceipts" => "nullable|array",
            "farmingReceipts.*" => "required",
            "terms" => "required|accepted",
            "dataConsent" => "required|accepted"
        ]);
        $user = User::create([
            "name" => $validated["firstName"] . " " . $validated["lastName"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            "role" => "farmer"
        ]); 
        $farmer = Farmer::create([
            "cin" => $validated["cin"],
            "phone" => $validated["phone"],
            "date_of_birth" => $validated["date_of_birth"],
            "address" => $validated["address"],
            "user_id" => $user->id
        ]); 
        $farm = Farm::create([
            "name" => $validated["farmName"],
            "location" => $validated["farmLocation"],
            "size" => $validated["farmSize"],
            "Status" => $validated["landOwnership"],
            "activities" => json_encode($validated["farmingActivities"]),
            "description" => $validated["farmDescription"],
            "farmer_id" => $farmer->id,
            "farmerCertificate" => $request->file("farmerCertificate")->store("farmerCertificate", "public"),
            "nationalId" => $request->file("nationalId")->store("nationalId", "public"),
            "landDocument" => $request->file("landDocument")->store("landDocument", "public"),
            "oncaAttestation" => $request->hasFile("oncaAttestation") ? $request->file("oncaAttestation")->store("oncaAttestation", "public") : null,
            "agriculturalRegisters" => $request->hasFile("agriculturalRegister") ? $request->file("agriculturalRegister")->store("agriculturalRegister", "public") : null,
            "farmDetailsDoc" => $request->hasFile("farmDetailsDoc") ? $request->file("farmDetailsDoc")->store("farmDetailsDoc", "public") : null
        ]);

        // Store farming receipts if any
        if ($request->hasFile("farmingReceipts")) {
            foreach ($request->file("farmingReceipts") as $receipt) {
                $receipt->store("farmingReceipts", "public");
            }
        }

        return redirect()->route("farmer.index")->with("success", "Registration successful! Your account is pending verification.");
    }
}
