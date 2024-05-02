<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('car.index', [
            'cars' => SpladeTable::for(Car::class)
                ->withGlobalSearch(columns: ['brand', 'model'])
                ->selectFilter('Cars Available', [
                    '0' => 'Not Available',
                    '1' => 'Available',
                ])
                ->column('brand')
                ->column('model')
                ->column('plat_no')
                ->column('daily_rate')
                // ->column(label: 'daily rate')
                ->column('available')
                ->column(label: 'available')
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'brand' => $request->brand,
            'model' => $request->model,
            'plat_no' => $request->plat_no,
            'daily_rate' => $request->daily_rate,
            'available' => 1,
        ];
        Car::create($data);
        Toast::success('Successfully added a car!');
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
