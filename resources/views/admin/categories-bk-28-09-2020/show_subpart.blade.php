@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($category)
            <div class="box">
                <div class="box-body">
                    <ul class="breadcrumb wizard">
                        <li class="completed"><a href="{{ url('admin/categories') }}">Brands</a></li>
                        <li class="completed"><a href="{{ url('admin/categories/'.$brand->id.'?type=carmodel') }}">{{ $brand->name }}</a></li>
                        <li class="completed"><a href="{{ url('admin/categories/'.$model->id.'?type=carsubmodel') }}"> {{ $model->name }}</a></li>
                        <li class="completed"><a href="{{ url('admin/categories/'.$subModel->id.'?type=carparts') }}"> {{ $subModel->name }}</a></li>
                        <li class="completed"><a href="javascript:void(0);"> {{ $category->name }}</a></li>
                    </ul>

                    <!-- <h2>Brand</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-4">Name</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $brand->name }}</td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <hr>
                <?php /*
                <div class="box-body">
                    <h2>Car model</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-4">Name</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $subModel->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr/>
                <div class="box-body">
                    <h2>Car Sub-model</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-4">Name</td>
                            {{--<td class="col-md-4">Description</td>
                            <td class="col-md-4">Cover</td>--}}
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $category->name }}</td>
                                {{--<td>{{ $category->description }}</td>
                                <td>
                                    @if(isset($category->cover) && !empty($category->cover))
                                        <img src="{{asset("storage/$category->cover")}}" alt="category image" class="img-thumbnail">
                                    @endif
                                </td>--}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <hr>
                */?>
                    <div class="box-body">
                        <h2>Sub Parts</h2>
                        <table class="table1">
                            <thead>
                            <tr>
                                <td class="col-md-3">Name</td>
                                <td class="col-md-3">Status</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!$categories->isEmpty())
                                    @foreach($categories as $cat)
                                        <tr>
                                            <td>
                                                {{--<a href="{{route('admin.categories.show', $cat->id)}}">{{ $cat->name }}</a>--}}
                                                {{ $cat->name }}
                                            </td>
                                            <td>@include('layouts.status', ['status' => $cat->status])</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{url('admin/categories/'.$cat->id.'?type=piece&pid='.$partId)}}">View Piece</a>
                                                <a class="btn btn-primary" href="{{route('admin.categories.edit', $cat->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="2">There are no sub parts for this Car sub-model</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
               
                @if(!$products->isEmpty())
                    <div class="box-body">
                        <h2>Products</h2>
                        @include('admin.shared.products', ['products' => $products])
                    </div>
                @endif
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
