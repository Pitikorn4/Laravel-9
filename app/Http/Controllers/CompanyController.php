<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{ 
    // index&search
    public function index(Request $request){
        $search = $request->search;
        if($search != null){
            $data['companies'] = Company :: where('name','like','%'.$search.'%')->paginate(5);
        }
        else{
            $data['companies'] = Company :: orderby('id','asc')->paginate(5);
        }
        return view('companies.index', $data);
    }

    // index&search
    public function indexAdmin(Request $request){
        $search = $request->search;
        if($search != null){
            $data['companies'] = Company :: where('name','like','%'.$search.'%')->paginate(5);
        }
        else{
            $data['companies'] = Company :: orderby('id','asc')->paginate(5);
        }
        return view('companies.indexAdmin', $data);
    }

    // สร้าง resource
    public function create(){
        return view('companies.create');
    } 

    // เพิ่ม resource
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $company = new Company;
        $company-> name = $request->name;
        $company-> email = $request->email;
        $company-> address = $request->address;
        $company->save();
        return redirect()->route('companies.indexAdmin')->with('success','Data has been created successfully.');
    }

    // แก้ไข resource
    public function edit(Company $company){
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.indexAdmin')->with('success','Data has been updated successfully.');
    }
    
    // ลบ resource
    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.indexAdmin')->with('success','Data has been deleted successfully.');
    }

}
