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

        <div class="" style="position: relative; top:70px; right:-150px">

          <table bgcolor="black" border="2px">

            <tr>

              <th style="padding: 30px">Name</th>
              <th style="padding: 30px">Email</th>
              <th style="padding: 30px">Phone Number</th>
              <th style="padding: 30px">Number of Guests</th>
              <th style="padding: 30px">Date</th>
              <th style="padding: 30px">Time</th>
              <th style="padding: 30px">Message</th>

            </tr align="center">
            @foreach ($data as $data)

            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->guest}}</td>
              <td>{{$data->date}}</td>
              <td>{{$data->time}}</td>
              <td>{{$data->message}}</td>
            </tr>
            @endforeach

          </table>

        </div>

    </div>

        @include('admin.adminscript')
  </body>
</html>
