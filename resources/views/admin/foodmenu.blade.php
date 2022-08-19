<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>

    <div class="container-scroller">
        @include("admin.navbar")

        <div class="" style="position: relative; top: 60px; right: -150px">

          <form class="" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="">
              <label for="">Title</label>
              <input style="color:blue;" type="text" name="title" value="" placeholder="Write a title" required>
            </div>

            <div class="">
              <label for="">Price</label>
              <input style="color:blue;" type="number" name="price" value="" placeholder="Price" required>
            </div>

            <div class="">
              <label for="">Image</label>
              <input type="file" name="image" required>
            </div>

            <div class="">
              <label for="">Description</label>
              <input style="color:blue;" type="text" name="description" value="" placeholder="Description" required>
            </div>

            <div class="">
              <input style="color: white" type="submit" value="Save">
            </div>

          </form>

          <div class="">

            <table bgcolor="black">
              <tr>
                <th style="padding: 30px">Food Menu</th>
                <th style="padding: 30px">Price</th>
                <th style="padding: 30px">Description</th>
                <th style="padding: 30px">Image</th>
                <th style="padding: 30px">Action</th>
                <th style="padding: 30px">Action</th>
              </tr>

              @foreach($data as $data)
              <tr align="center">

                <td>{{$data->title}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->description}}</td>
                <td><img height="100" width="100" src="/foodimage/{{$data->image}}"></td>
                <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
                <td><a href="{{url('/updatemenu',$data->id)}}">Update</a></td>

              </tr>
            @endforeach

            </table>

          </div>

        </div>

    </div>
        @include('admin.adminscript')
  </body>
</html>
