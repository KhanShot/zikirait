@extends('admin.layouts.main')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Жума трансляции</h1>
            <a href="{{route('zhuma.create')}}" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($zhumaLives as $zhuma)
                            <tr>
                                <td> {{$zhuma->id ?? ''}}  @if($zhuma->live) <i class="ml-4 fa fa-circle text-success" ></i> @endif </td>
                                <td> {{$zhuma->title ?? ''}}</td>
                                <td> {{$zhuma->link ?? '-'}}</td>
                                <td> {{$zhuma->date ?? '-' }} </td>
                                <td class="d-flex">
                                    <a href="{{route('zhuma.edit', $zhuma->id)}}" class="btn btn-warning ">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form class="ml-2" action="{{route('zhuma.delete', $zhuma->id)}}" method="post">@csrf @method('delete')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
