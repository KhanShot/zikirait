@extends('admin.layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Создать трансляцию</h1>
            <a href="{{route('zhuma')}}" class="btn btn-success"> <i class="fa fa-arrow-left"></i> </a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-md-6" >

            <div class="card-body ">
                <form action="{{route('zhuma.store')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Название трансляции</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Ссылка трансляции</label>
                        <input type="text" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label for="name">День трансляции</label>
                        <input type="date" class="form-control" name="date" required >
                    </div>
                    <div class="form-group d-flex align-items-center mt-4">
                        <label for="live" class="mb-0">Сейчас в эфире</label>
                        <input type="checkbox" id="live" class="ml-2 custom-checkbox" name="live" >
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-success "> Создать </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
