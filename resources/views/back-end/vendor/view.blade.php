@extends('back-end.admin')

@section('title')
view Vendors
@endsection

@section('content')






<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
  
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <div class="dataTables_wrapper dt-bootstrap4">
                    <table id="vendors" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="products">
                      <thead>
                        <tr>
                          <th>SL#</th>
                          <th>Name</th>
                      
                          <th>E-mail</th>
                          <th>Adress</th>
                          <th>phone</th>
                          <th>image</th>
                          <th style="width:150px;">Action</th>
                        </tr>
                      </thead>
                      
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
  
          </div>
        </div>
    </div><!--/. container-fluid -->
   
  
  </section>









    
@endsection


@section('script')

@if(Session::has("status"))
    
        toastr.success("{{ Session::get('status')}}");

    @endif

$(document).ready(function(){
    $("#vendors").DataTable({
      pageLength: 25,
      processing: true,
      serverSide: true,
      ajax:{
        url: "{{ url('/admin/vendors') }}",
      },
      columns:[
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        
        {
          data: 'name',
          name: 'name'
        },
        
        {
          data: 'email',
          name: 'email'
        },
        {
            data: 'address',
            name: 'address'
          },
          {
            data: 'phone',
            name: 'phone'
          },
          {
            data: 'img',
            name: 'img',
            render: function(data,type,full,meta){
                return "<img src={{ URL::to('/') }}/"+data+" width='70' />";
              },
              orderable: false
          },
          
        {
          data: 'action',
          name: 'action',
          orderable: false
        }
      ]
    });
    $('#vendors tbody').on( 'click', '.edit', function () {
        var id = $(this).attr('id');
        window.location.href = "{{ url('admin/vendor/edit') }}/"+id;
    });
    $('#vendors tbody').on( 'click', '.delete', function () {
        var id = $(this).attr('id');
        window.location.href = "{{ url('admin/vendor/delete') }}/"+id;
        
    });
});
@endsection




