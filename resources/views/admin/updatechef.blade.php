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

        <form class="" action="{{url('/updatechefdata',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="">
            <label>Chef Name</label>
            <input style="color:blue;" type="text" name="name" value="{{$data->name}}">

          </div>
          <div class="">
            <label>Speciality</label>
            <input style="color:blue;" type="text" name="speciality" value="{{$data->speciality}}">

          </div>
          <div class="">
            <label>Old Image</label>
            <img height="200" width="200" src="/chefimage/{{$data->image}}">

          </div>
          <div class="">
            <label>New Image</label>
            <input type="file" name="image">

          </div>
          <div class="">
            <input type="submit" value="Update Chef">

          </div>

        </form>

    </div>

        @include('admin.adminscript')
  </body>
</html>
