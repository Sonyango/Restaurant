<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>

    <div class="container-scroller">

        @include("admin.navbar")



        <div class="" style="position: relative; top: 60px; right: -150px">

          <form class="" action="{{url('/updatefood',$data->id)}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="">
              <label for="">Title</label>
              <input style="color:blue;" type="text" name="title" value="{{$data->title}}" required>
            </div>

            <div class="">
              <label for="">Price</label>
              <input style="color:blue;" type="number" name="price" value="{{$data->price}}" required>
            </div>

            <div class="">
              <label for="">Description</label>
              <input style="color:blue;" type="text" name="description" value="{{$data->description}}" required>
            </div>

            <div class="">
              <label for="">Old Image</label>
              <img height="100" width="100" src="/foodimage/{{$data->image}}" alt="">
            </div>

            <div class="">
              <label for="">Update Image</label>
              <input type="file" name="image" required>
            </div>

            <div class="">
              <input style="color: white" type="submit" value="Save">
            </div>

          </form>



        </div>




    </div>

        @include('admin.adminscript')
  </body>
</html>
