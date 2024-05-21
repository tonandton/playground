@extends('layouts.app')
@section('title', 'อุปกรณ์')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <a href={{ route('equiments.create') }} class="btn btn-primary mb-3">เพิ่มข้อมูล</a>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1"></th>
                                <th class="col-md-1">รหัส</th>
                                <th class="col-md-2">ชื่ออุปกรณ์</th>
                                <th class="col-md-2">รายละเอียด</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equiments as $equiment)
                                <tr>
                                    <td></td>
                                    <td>{{ $equiment->code_id }}</td>
                                    <td>{{ $equiment->name }}</td>
                                    <td>{{ $equiment->description }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('equiments.destroy', $equiment->id) }}" method="POST">
                                            <div class="btn-group btn-group-sm" role="group"
                                                aria-label="small botton group">
                                                <a href="{{ route('equiments.edit', $equiment->id) }}"
                                                    class="btn btn-warning">แก้ไข</a>

                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_comfirm">ลบ</button>
                                            </div>
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

@endsection
