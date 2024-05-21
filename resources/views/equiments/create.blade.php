@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">อุปกรณ์</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("equiments.store") }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="code_id" class="col-md-4 col-form-label text-md">Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code_id" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md">ชื่อรายการ</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md">รายละเอียด</label>
                                <div class="col-md-6">
                                    <textarea type="text" name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="responsible_name" class="col-md-4 col-form-label text-md">ผู้รับผิดชอบ</label>
                                <div class="col-md-6">
                                    <input type="text" name="responsible_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md">เบอร์โทร</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md">สถานะ</label>
                                <div class="col-md-6">
                                    <input type="text" name="status" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        บันทึกข้อมูล
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
