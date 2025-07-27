<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Conference;
use App\Models\MedicalAcademy;

class UserController extends Controller
{
    public function edit()
    {
        return view('Site.user.settings', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
        ]);

        $user->update([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'country' => $validated['country'],
        ]);
        Alert::success(__('Success'), __('User settings updated successfully'));
        return redirect()->back();
    }

    public function delete_account()
    {
        return view('Site.user.delete_account', [
            'user' => Auth::user()
        ]);
    }

    public function destroy()
    {
        $user = Auth::user();
        if ($user) {
            $user->delete();
            Auth::logout();
            Alert::success(__('Success'), __('User account deleted successfully'));
            return redirect()->route('Site.home.index');
        }
    }

    // User Type Doctor Functions

    public function doctor_conferences()
    {
        $data['conferences'] = Conference::orderBy('id', 'desc')->take(3)->get();
        return view('Site.user.doctor_conferences')->with($data);

    }

    public function doctor_academy()
    {
        $data['academies'] = MedicalAcademy::orderBy('id', 'desc')->take(6)->get();
        return view('Site.user.doctor_academy')->with($data);
    }

    public function doctor_requests()
    {
        $doctor = Auth::user();
        $orders = $doctor->orders()->with('items')->get();
        return view('Site.user.doctor_requests', compact('orders'));
    }

    public function show_order($id)
    {
        $order = auth()->user()->orders()
            ->with('items.book')
            ->findOrFail($id);

        return view('Site.user.doctor_order_show', compact('order'));
    }

    public function doctor_books()
    {
        $user = auth()->user();
        $orders = $user->orders()->with('items.book')->get();
        $books = $orders->flatMap(function ($order) {
            return $order->items->pluck('book');
        })->values();
        return view('Site.user.doctor_books', compact('books'));
    }

}
