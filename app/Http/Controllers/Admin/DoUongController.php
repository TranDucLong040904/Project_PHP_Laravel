<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoUong;

class DoUongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinks = DoUong::where('status', 0)->get();  
        return view('admin.douong.index', compact('drinks')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.douong.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'TENDOUONG' => 'required|string|max:255',  
            'IMAGE' => 'required|string',  
            'MOTA' => 'nullable|string',  
            'DONGIA' => 'required|numeric',  
            'SOLUONG' => 'required|integer',  
            'status' => 'required|boolean',  
        ]);

        
     
        $existingDrink = DoUong::where('TENDOUONG', $request->TENDOUONG)  
                                ->where('DONGIA', $request->DONGIA)  
                                ->where('status', $request->status)  
                                ->first();  
    
        if ($existingDrink) {  
            $existingDrink->SOLUONG += $request->SOLUONG;  
            $existingDrink->save();   
            return redirect()->route('douong.index')->with('success', 'Số lượng đồ uống đã được cập nhật.');  
        } else {  
            if ($request->hasFile('IMAGE')) {  
                // Tạo tên cho file và lưu vào thư mục public/images  
                $imageName = time() . '.' . $request->IMAGE->extension();  
                $request->IMAGE->move(public_path('images'), $imageName);  
            }
    
            // Lưu vào cơ sở dữ liệu  
            DoUong::create([  
                'TENDOUONG' => $request->TENDOUONG,  
                'IMAGE' => $request->IMAGE,
                'MOTA' => $request->MOTA,  
                'DONGIA' => $request->DONGIA,  
                'SOLUONG' => $request->SOLUONG,  
                'status' => $request->status,  
                'IDDOUONG' => uniqid(), // Tạo ID nếu không tự động tăng  
            ]); 

            return redirect()->route('douong.index')->with('success', 'Đồ uống đã được thêm thành công!'); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $drinks = DoUong::where('status', 1)->get();  
        return view('admin.douong.show', compact('drinks')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drink = DoUong::findOrFail($id);  
        return view('admin.douong.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'TENDOUONG' => 'required|string|max:100',  
            'DONGIA' => 'required|numeric',  
            'status' => 'required|boolean',  
            'SOLUONG' => 'required|integer|min:1',  
        ]);  
    
        // Lấy đồ uống hiện tại từ cơ sở dữ liệu  
        $drink = DoUong::findOrFail($id);    
        $existingDrink = Douong::where('TENDOUONG', $request->TENDOUONG)  
                                ->where('DONGIA', $request->DONGIA)  
                                ->where('status', $request->status)  
                                ->where('IDDOUONG', '!=', $id) // Để không so sánh với chính nó  
                                ->first();  
    
        if ($existingDrink) {  
            $existingDrink->SOLUONG += $request->SOLUONG;  
    
            $existingDrink->save();  
    
            // Xóa bản ghi hiện tại (bản ghi đang sửa)  
            $drink->delete();  
    
            return redirect()->route('douong.index')->with('success', 'Số lượng đồ uống đã được cập nhật.');  
        } else {  
            $drink->TENDOUONG = $request->TENDOUONG;  
            if ($request->has('IMAGE') && $request->IMAGE != '') {
                $drink->IMAGE = $request->IMAGE; 
            }
            $drink->MOTA = $request->MOTA;  
            $drink->DONGIA = $request->DONGIA;  
            $drink->SOLUONG = $request->SOLUONG;  
            $drink->status = $request->status;  

            $drink->save() ; 
            return redirect()->route('douong.index')->with('success', 'Đồ uống đã được cập nhật thành công.');  
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drink = DoUong::find($id);  
        $drink->status = 1; 
        $drink->save();  

        return redirect()->back()->with('success', 'Đồ uống đã được xóa.'); 
    }

    public function kichHoat(string $id)
    {
        $drink = DoUong::find($id);  
        $drink->status = 0; 
        $drink->save();  

        return redirect()->back()->with('success', 'Đồ uống đã được kích hoạt.'); 
    }
}
