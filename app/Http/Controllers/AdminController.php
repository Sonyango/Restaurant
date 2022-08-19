<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

class AdminController extends Controller
{
    public function users()
    {
      if(Auth::id())
      {
        $data=user::all();
        return view('admin.users',compact('data'));

      }
      else
      {
        return redirect('login');
      }

    }


    public function deleteuser($id)
    {
      $data=user::find($id);
      $data->delete();
      return redirect()->back();
    }


    public function foodmenu()
    {
      if(Auth::id())
      {
        $data = food::all();
        return view('admin.foodmenu', compact('data'));
      }
      else
      {
        return redirect('login');
      }

    }


    public function upload(Request $request)
    {

        $data = new food;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();




    }


    public function deletemenu($id)
    {
      $data=food::find($id);
      $data->delete();
      return redirect()->back();
    }

    public function updatemenu($id)
    {
      $data=food::find($id);
      return view('admin.updatemenu',compact('data'));
    }

    public function updatefood(Request $request, $id)
    {
      $data=food::find($id);
      $image=$request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('foodimage',$imagename);
      $data->image = $imagename;

      $data->title = $request->title;
      $data->price = $request->price;
      $data->description = $request->description;

      $data->save();

      return redirect('/foodmenu');

    }


    public function reservation(Request $request)
    {
      $data = new reservation;

      $data->name =$request->name;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->guest = $request->guest;
      $data->date = $request->date;
      $data->time = $request->time;
      $data->message = $request->message;
      $data->save();

      return redirect()->back();

    }

    public function viewreservation()
    {
      if (Auth::id())
      {

      $data = reservation::all();
      return view('admin.adminreservation',compact('data'));
      }
      else
      {
        return redirect('login');
      }
    }

    public function viewchef()
    {
      if(Auth::id())
      {
        $data=chef::all();
        return view('admin.adminchef',compact('data'));
      }
      else
      {
        return redirect('login');
      }

    }

    public function uploadchef(Request $request)
    {
      $data = new chef;

      $image=$request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('chefimage',$imagename);
      $data->image = $imagename;
      $data->name=$request->name;
      $data->speciality=$request->speciality;

      $data->save();
      return redirect()->back();
    }

    public function updatechef($id)
    {
      $data=chef::find($id);
      return view('admin.updatechef',compact('data'));
    }

    public function updatechefdata(Request $request, $id)
    {
      $data=chef::find($id);

      $image=$request->image;
      if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image = $imagename;
      }


      $data->name=$request->name;
      $data->speciality=$request->speciality;
      $data->save();
      return redirect()->back();
    }

    public function deletechef($id)
    {
      $data=chef::find($id);
      $data->delete();
      return redirect()->back();
    }

    public function orders()
    {
      if(Auth::id())
      {
        $data=order::all();
        return view('admin.orders',compact('data'));
      }
      else
      {
        return redirect('login');
      }

    }

    public function search(Request $request)
    {
      if(Auth::id())
      {
        $search=$request->search;
        $data=order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')
        ->get();

        return view('admin.orders',compact('data'));
      }
      else
      {
        return redirect('login');
      }

    }
}
