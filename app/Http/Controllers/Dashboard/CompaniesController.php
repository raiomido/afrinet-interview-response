<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesRequest;
use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.companies.index', [
            'data' => Company::latest()->get(),
            'columns' => [
                'name' => 'text',
                'logo_link' => 'image',
                'email' => 'text',
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.companies.create', [
            'title' => 'Add new Company',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
        $company = Company::create($request->only(['name', 'email', 'website']));

        if ($request->hasFile('image')) {
            $company->addMedia($request->file('image'))->toMediaCollection('logo');
        }

        Mail::send(new CompanyCreated($company));

        return redirect()->route('dashboard.companies.index')->with([
            'success' => 'Company added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('dashboard.companies.show', [
            'title' => $company->name,
            'data' => $company,
            'fields' => [
                'logo_link' => 'image',
                'name' => 'text',
                'email' => 'text',
                'website' => 'text',
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('dashboard.companies.edit', [
            'data' => $company,
        ]);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(CompaniesRequest $request, Company $company)
    {

        $company->fill($request->only(['name', 'email', 'website']))->save();

        if ($request->hasFile('image')) {
            if ($media = $company->getFirstMedia()) {
                $media->delete();
            }
            $company->addMedia($request->file('image'))->toMediaCollection('logo');
        }

        return redirect()->route('dashboard.companies.index')->with([
            'info' => 'Company updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('dashboard.companies.index')->with([
            'info' => 'Company removed successfully'
        ]);
    }
}
