<?php


namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class VoucherController extends Controller
{
    /**
     * Generate a unique token_auth for a new voucher.
     *
     * @return string
     */
    private function generateTokenAuth()
    {
        $token = Str::random(60);
        while (Voucher::where('token_auth', $token)->exists()) {
            $token = Str::random(60);
        }
        return $token;
    }


    public function checkVoucher(Request $request)
    {
        $this->validate($request, [
            'voucher_code' => 'required'
        ]);
    
        $voucher = Voucher::where('code', $request->input('voucher_code'))->first();
    
        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid voucher code'
            ], 404);
        }
    
        if ($voucher->is_used) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher has already been used'
            ], 400);
        }

        $discount_percentage = $voucher->discount;
    
        return response()->json([
            'success' => true,
            'message' => 'Voucher is valid',
            'discount_percentage' => $discount_percentage
        ], 200);
    }

    /**
     * Get all vouchers.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vouchers = Voucher::all('token_auth');
        return response()->json($vouchers);
    }

    /**
     * Create a new voucher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:vouchers,code',
            'description' => 'required',
            'discount' => 'required|integer|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $voucher = new Voucher();
        $voucher->code = $request->input('code');
        $voucher->description = $request->input('description');
        $voucher->discount = $request->input('discount');
        $voucher->used = false;
        $voucher->token_auth = bcrypt($this->generateTokenAuth());
        $voucher->save();

        return response()->json($voucher, 201);
    }

    /**
     * Get a voucher by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $voucher = Voucher::find($id);

        if (!$voucher) {
            return response()->json([
                'error' => 'Voucher not found.',
            ], 404);
        }

        return response()->json($voucher);
    }

    /**
     * Update a voucher by ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);

        if (!$voucher) {
            return response()->json([
                'error' => 'Voucher not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:vouchers,code,'.$id,
            'description' => 'required',
            'discount' => 'required|integer|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $voucher->code = $request->input('code');
        $voucher->description = $request->input('description');
        $voucher->discount = $request->input('discount');
        $voucher->save();

        return response()->json($voucher);
    }

}