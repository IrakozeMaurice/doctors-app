@include('partials.adminHeader')
<!-- Begin Page Content -->
<div style="width:70%; margin:auto;">
<!-- Page Heading -->
  <div
    class="mb-4">
    <p class="mb-2 text-center"><b>Registered doctors</b></p><hr>
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
      <!-- <a href="#" class=""><img
          src="{{ asset('images/aucaLogo.png') }}"
          alt="Auca logo"></a> -->
    </div>
  </div>
  @if (session('message'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('message') }}
        </div><br>
    @endif
  <div>
    <a href="{{route('admin.dashboard.create-doctor')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-plus"></i>Add doctor</a><br><br>
    <table id="tableSearch" class="table table-bordered text-center small">
      <thead>
        <tr>
          <th class="text-center">Names</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Address</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($doctors as $doctor)
          <tr>
            <td>{{$doctor->firstname}} {{$doctor->lastname}}</td>
            <td>{{$doctor->email}}</td>
            <td>{{$doctor->phone}}</td>
            <td>{{$doctor->address}}</td>
            <td style="padding-left: 0px; padding-right: 0px;">
                  <a href="{{route('admin.dashboard.edit-doctor',$doctor->id)}}" class="btn btn-sm bg-success text-white" style="width:45%;">Edit</a>
              <form style="display:inline;" action="{{route('admin.dashboard.delete-doctor',$doctor->id)}}" method="POST">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-sm bg-danger text-white" style="width:45%;">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th class="text-center"></th>
          <th class="text-center"></th>
          <th class="text-center"></th>
          <th class="text-center"></th>
          <th class="text-center"></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</div>
@include('partials.adminFooter')
