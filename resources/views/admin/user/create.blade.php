@extends('layouts.master')

@section('title')
Create Role | Wend Travel 
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="margin-bottom: 20px">Create Role</h4>
                @if (session('status-success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status-success') }}
                    </div>
                @endif
                @if (session('status-danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status-danger') }}
                    </div>
                @endif
            </div>


            <div class="card-body">
                <form action="{{route('admin.role.store')}}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên nhóm quyền</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Routes</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="route[]" value="destination.index">
                                Destination Index
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="route[]" value="destination.create">
                                Destination Create
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="route[]" value="admin.dashboard">
                                Admin Dashboard
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="route[]" value="role.index">
                                Role Index
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="route[]" value="role.create">
                                Role Create
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection


@section('scripts')

@endsection