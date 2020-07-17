@extends('user.layouts.base')
@section('content')
@foreach($data as $row)
<form action="{{route('home.destroy', $row->id)}}" method="POST">
    {{csrf_field()}}
    {{ method_field('DELETE') }}
    <div class="page-header">
        <h5>Created at {{$row->created_at}} | <a href="#">Reza Fauzi</a></h5>
        <h2 class="pageheader-title">{{$row->link}} </h2>   
        <br>
        <h4>
            <a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a>                             
            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenters"> Edit Link </a>                                        
            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')" type="submit"> Delete Link </button>                                                    
        </h4>                               
        <hr>
        <h2>{{$row->total}}</h2>
        <h4>Total Clicks</h4>
        
        <br> <br>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Bar Charts</h5>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">link</th>
        <th scope="col">hari</th>
        <th scope="col">total</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($history as $histori)
        <tr>
        <th scope="row">1</th>
        <td>{{$histori->id_short_link}}</td>
        <td>{{$histori->tanggal}}</td>
        <td>{{$histori->total}}</td>
        </tr>
    @endforeach
    </tbody>
</table> -->

<form action="{{route('home.update', $row->id)}}" method="POST">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                    <input type="hidden" name="id">
                    <input type="text" name="code" class="form-control" value="{{$row->code}}" aria-label="Recipient's username" aria-describedby="basic-addon2">                   
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection