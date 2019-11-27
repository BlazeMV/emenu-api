<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function register(CustomerRegisterRequest $request)
    {
        $customer = DB::transaction(function () use ($request) {
            $user = new User(array_merge($request->except('password'), [
                'type' => 'customer',
                'status' => 'active',
                'password' => Hash::make($request->get('password')),
            ]));
            $user->save();

            $customer = new Customer(array_merge($request->all(), [
                'user_id' => $user->id,
            ]));
            $customer->save();

            return $customer;
        });

        return $this->jsonResponse([
            'message' => 'Registered',
            'data' => $customer->with('user'),
        ]);
    }

    public function bookTable(BookingRequest $request)
    {
        $table = Table::find($request->get('table_id'));
        $booking = new Booking([
            'cafe_id' => $table->cafe_id,
            'table_id' => $table->id,
            'customer_id' => auth()->user()->customer_id,
            'status' => 'pending',
            'from' => Carbon::parse($request->get('from')),
            'to' => Carbon::parse($request->get('to')),
            'remarks' => $request->get('remarks'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $booking->save();

        return $this->jsonResponse([
            'message' => 'Booked',
            'data' => $booking->toArray(),
        ]);
    }

    public function myBookings()
    {
        $bookings = Booking::where('customer_id', auth()->user()->customer_id)->orderBy('created_at', 'desc')->get();

        return $this->jsonResponse([
            'message' => 'Your Bookings',
            'data' => $bookings->toArray(),
        ]);
    }
}
