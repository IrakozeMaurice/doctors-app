@include('partials.adminHeader')
<!-- Begin Page Content -->
<div style="width:70%; margin:auto;">
<!-- Page Heading -->
  <div
    class="mb-4">
    <p class="mb-2 text-center"><b>Registered farmers</b></p><hr>
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
      <!-- <a href="#" class=""><img
          src="{{ asset('images/aucaLogo.png') }}"
          alt="Auca logo"></a> -->
    </div>
  </div>
  <div>
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
          <tr class="clickable-row">
            <td>xxxxxxxx</td>
            <td>xxxxxxxx</td>
            <td>xxxxxxxx</td>
            <td>xxxxxxxx</td>
            <td style="padding-left: 0px; padding-right: 0px;">
              <form style="display:inline;" action="#" method="POST">
                @csrf
                  <button type="submit" class="btn btn-sm bg-success text-white" style="width:45%;">Edit</button>
                </form>
                <form style="display:inline;" action="#" method="POST">
                @csrf
                  <button type="submit" class="btn btn-sm bg-danger text-white" style="width:45%;">Delete</button>
                </form>
            </td>
          </tr>
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
