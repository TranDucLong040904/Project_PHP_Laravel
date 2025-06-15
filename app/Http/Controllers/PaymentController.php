<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PaymentController extends Controller
{
    public function xacNhanThanhToan(Request $request)
    {
        // Lấy dữ liệu từ form
        $user = Auth::user();
        $seats = explode(',', $request->seats); 
        $scheduleID = session('schedule_ID'); 
    
        // Kiểm tra trạng thái ghế
        $conflictedSeats = DB::table('trangthaighe')
            ->whereIn('IDGHE', $seats) 
            ->where('IDLICHCHIEU', $scheduleID)
            ->where('STATUS', 1) 
            ->pluck('IDGHE');
    
        if ($conflictedSeats->isNotEmpty()) {
            $idLichChieu = $scheduleID; 
            return redirect()->route('lichchieu.hienThiGhe', ['idLichChieu' => $scheduleID])
                ->with('error', 'Các ghế sau đã bị đặt: ' . $conflictedSeats->implode(', ') . '. Vui lòng chọn ghế khác.');
        }
    
        // Lấy giá trị tổng tiền từ session
        $seatPrices = session('seat_prices', []);
        $totalSeatPrice = array_sum($seatPrices); // Tổng tiền ghế ngồi
    
        $foods = json_decode($request->foods, true) ?? [];
        $foodTotalPrice = 0;
    
        // Tính tổng giá đồ uống nếu có
        foreach ($foods as $foodId => $foodData) {
            if (isset($foodData['quantity']) && $foodData['quantity'] > 0) {
                $foodTotalPrice += $foodData['quantity'] * $foodData['price'];
            }
        }
    
        $totalPrice = $totalSeatPrice + $foodTotalPrice;
        
        DB::beginTransaction();
        try {
            // Thêm hóa đơn vé vào bảng 'bill_ve'
            $billVeId = DB::table('bill_ve')->insertGetId([
                'ID_USER' => $user->id,
                'name' => $user->name,
                'DONGIA' => $totalPrice,
                'NGAYTAO' => now(),
                'PAYMENTID' => $request->input('payment_method_id'),
            ]);
    
            // Lưu thông tin vé và cập nhật trạng thái ghế
            foreach ($seats as $key => $seat) {
                $seatPrice = $seatPrices[$key] ?? 0;
                DB::table('ve')->insert([
                    'IDBILL_VE' => $billVeId,
                    'IDGHE' => $seat,
                    'IDPHONGCHIEU' => session('room_ID'),
                    'IDLICHCHIEU' => $scheduleID,
                    'DONGIA' => $seatPrice,
                ]);
    
                // Cập nhật trạng thái ghế
                DB::table('trangthaighe')
                    ->where('IDGHE', $seat)
                    ->where('IDLICHCHIEU', $scheduleID)
                    ->update(['STATUS' => 1]);
            }
    
            // Xử lý hóa đơn đồ uống nếu có
            foreach ($foods as $foodId => $foodData) {
                if ($foodData['quantity'] > 0) {
                    $quantity = $foodData['quantity'];
                    $price = $foodData['price'];
                    $food = DB::table('douong')->where('IDDOUONG', $foodId)->first();
    
                    if (!$food || $quantity > $food->SOLUONG) {
                        throw new \Exception("Món {$food->TENDOUONG} không đủ số lượng.");
                    }
    
                    DB::table('douong')->where('IDDOUONG', $foodId)->update([
                        'SOLUONG' => $food->SOLUONG - $quantity,
                    ]);
    
                    DB::table('bill_douong_detail')->insert([
                        'IDDOUONG' => $foodId,
                        'name' => $user->name,
                        'DONGIA' => $price,
                        'SOLUONG' => $quantity,
                        'NGAYTAO' => now(),
                        'PAYMENTSTATUS' => 'Đã thanh toán',
                        'IDBILL_VE' => $billVeId,
                        'ID_USER' => $user->id,
                    ]);
                }
            }
    
            DB::commit();
    
            return redirect()->route('history')->with('success', 'Xác nhận thanh toán thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }


}
