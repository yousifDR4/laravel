<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                // Add more fields as needed
            ]);
            return response()->json(['user' => $user], 201);
        } catch (QueryException $e) {
            // Check if the exception is due to unique constraint violation
            if ($e->errorInfo[1] == 1062) { // MySQL specific error code for duplicate entry
                return response()->json(['error' => 'Email already exists.'], 409);
            }

            // Return a JSON response indicating other database or server error
            return response()->json(['error' => 'Failed to create user. Please try again.'], 500);
        } catch (\Exception $e) {
            // Return a JSON response indicating other unexpected errors
            return response()->json(['error' => 'Failed to create user. Please try again.'], 500);
        }
    }
}
