@extends('layouts.master')

@section('title')
Update Tour | Wend Travel 
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Tour</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="{{route('admin.tour.update',$tour->id)}}" method="POST" role="form" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$tour->name}}">
                        @error('name')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tour Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" value="{{$tour->slug}}">
                    </div>
                    <div class="form-group">
                        <label>Destination</label>
                        <select name="destination_id" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($destination as $dest)
                            <option value="{{$dest->id}}">{{$dest->name}}</option>
                            @endforeach
                        </select>
                        @error('destination_id')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="upload">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('upload')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div> -->
                    <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="image" id="image">
                                <div class="input-group-btn" style="padding:0">
                                    <a href="#modal-file" data-toggle="modal" class="btn btn-default" style="margin:0">Select</a>
                                </div>
                                <div class="show_img" style="float: left">
                                    <img src="" alt="" id="show_img" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <textarea name="summary" class="form-control" rows="3" value="{{$tour->summary}}"></textarea>
                        @error('summary')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="7" id="content" value="{{$tour->content}}"></textarea>
                        @error('content')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adult Price</label>
                        <input type="adult_price" class="form-control" name="adult_price" value="{{$tour->adult_price}}">
                        @error('adult_price')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Child Price</label>
                        <input type="children_price" class="form-control" name="children_price" value="{{$tour->children_price}}">
                        @error('children_price')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="duration" class="form-control" name="duration" value="{{$tour->duration}}">
                        @error('duration')
                            <small class="help-block text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Package</label>
                        @foreach($package as $pac)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$pac->id}}" name="package[]">
                                {{$pac->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="custom-control custom-radio">
                            <label>
                                <input type="radio" name="status" value="1" checked>
                                Publish
                            </label>
                            <label>
                                <input type="radio" name="status" value="0">
                                Un Publish
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <input type="text" class="form-control" name="meta_descriptions" placeholder="Meta Descriptions">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-file">
    <div class="modal-dialog" style="max-width: 85%; width: 85%" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Quản lý File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('file')}}/dialog.php?akey=wendwebsite&field_id=image" style="width: 100%; height: 500px; border: 0; overflow-y: auto"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <!-- <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>     -->
    <script src="{{url('public/js')}}/slug.js"></script>    
    <script src="{{url('public/backend')}}/tinymce/tinymce.min.js"></script>    
    <script src="{{url('public/backend')}}/tinymce/config.js"></script>    

    <script type="text/javascript">
        $('#modal-file').on('hide.bs.modal', function(){
            var _img = $('input#image').val();
            $('img#show_img').attr('src',_img);
        })
    </script>
@endsection