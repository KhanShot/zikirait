@extends('admin.layouts.main')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Пользователи</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Зикр за сегодня</th>
                            <th>Общ зикр</th>
                            <th>Дата регистрации</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Зикр за сегодня</th>
                            <th>Общ зикр</th>
                            <th>Дата регистрации</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td> {{$user->name ?? ''}}</td>
                            <td> {{$user->phone ?? '-'}}</td>
                            <td> {{$user->zikir[0]->total_today ?? 0}}</td>
                            <td> {{$user->zikir_sum_count ?? 0}} </td>
                            <td> {{$user->created_at}}</td>
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
