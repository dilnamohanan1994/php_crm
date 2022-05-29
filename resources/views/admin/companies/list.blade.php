@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-left: 72px;margin-right: -221px;">
                <div class="card-header">Companies
                    <span class="text-right float-right"><a class="btn btn-primary" href="{{route('company.create')}}">Add New Company</a></span>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    <img src="{{URL::asset('/storage/app/public/'.$company->logo)}}" height="200" width="200">
                                </td>
                                <td>{{$company->website}}</td>
                                <td>
                                    <div class="action-wrap">
                                        <ul>
                                            <li><a href="{{ route('company.edit',$company->id) }}" title="Edit" ><i class="fa fa-edit"></i></a></li> 
                                            <li><a href="javascript:deleteitem({{ $company->id }})" title="Delete" ><i class="fa fa-trash"></i></a></li> 
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    function deleteitem(id)
    {
        var url = '{{ route("company.destroy", ":id") }}';
        url = url.replace(':id', id);
        var val = 0;
        swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
        })
        .then((willDelete) => {
            $.ajax({
                    type:'POST',
                    url:url,
                    data:'_token={{ csrf_token() }}'+'&value='+val,
                    success:function(data){
                        if(data.success==1)
                        {
                          swal(
                              'Delete!',
                              'Delete Success.',
                              'success'
                          );
                          location.reload();
                        }
                        else
                        {
                           swal(
                              'Failed!',
                              data.message,
                              'error'
                            );
                        }
                    },
                }); 
        });
    }
</script>