@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <div class="box-body">
                <ul class="breadcrumb wizard">
                    <li class="completed"><a href="{{ url('admin/categories') }}">Brands</a></li>
                    <li class="completed"><a href="{{ url('admin/categories/'.$brand->id.'?type=carmodel') }}">{{ $brand->name }}</a></li>
                    <li class="completed"><a href="{{ url('admin/categories/'.$subModel->id.'?type=carsubmodel') }}"> {{ $subModel->name }}</a></li>
                    <li class="completed"><a href="javascript:void(0);"> {{ $category->name }}</a></li>
                </ul>
            </div>
            <hr>
            <form action="{{ url('admin/saveParts') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="type" value="{{$type}}">
                    <input type="hidden" name="smid" value="{{$smid}}">
                    <div class="form-group" id="available_part_group" >
                        <label for="available_part">Available Parts category </label>
                        @php
                        $available_parts = explode(',', $category->available_part);
                        @endphp
                        <select name="available_part[]" id="available_part" class="form-control select2" multiple="multiple">
                            <option value=""></option>
                            @foreach($carParts as $ispart)
                                <option @if(in_array($ispart->id, $available_parts)) selected="selected" @endif value="{{ $ispart->id }}">{{ $ispart->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ url('admin/categories/'.$smid.'?type=carparts') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
@endsection