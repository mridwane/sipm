<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rental.index', [
            'transacs' => SpladeTable::for(Transaction::class)
                // ->withGlobalSearch(columns: ['brand', 'model'])
                // ->selectFilter('Cars Available', [
                //     '0' => 'Not Available',
                //     '1' => 'Available',
                // ])
                ->column(label: 'user')
                ->column(label: 'car')
                ->column(label: 'total')
                ->column('date_start')
                ->column('date_end')
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function check(Request $request)
    {
        $data = [
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ];
        dd($data);
    }

    public function create()
    {
        $cars = Car::get();
        return view('rental.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingTransaction = Transaction::where('car_id', $request->car)
            ->where('date_start', '<=', $request->date_end)
            ->where('date_end', '>=', $request->date_start)
            ->exists();

        if ($existingTransaction) {
            Toast::title('Whoops!')
                ->message('Car not Available!')
                ->warning()
                ->rightTop()
                ->autoDismiss(4);
            return redirect()->route('rental.index');
        } else {
            $car = Car::where('id', $request->car)->first();
            $dateStart = Carbon::parse($request->date_start);
            $dateEnd = Carbon::parse($request->date_end);
            $duration = $dateStart->diffInDays($dateEnd);
            $data = [
                'user_id' => Auth::user()->id,
                'car_id' => $request->car,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'total' => $duration * $car->daily_rate,
            ];
            // dd($data);
            Transaction::create($data);
            Toast::title('Success!')
                ->message('Booking Success!')
                ->success()
                ->rightTop()
                ->autoDismiss(4);
            return redirect()->route('rental.index');
        }
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
