@extends('cms.parent')

@section('title','تغيير كلمة المرور')

@section('styles')

@endsection


@section('page-name','تغيير كلمة المرور')

@section('small-page-name','تغيير كلمة المرور')


@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h3">تغيير كلمة المرور</a>
        </div>
        <div class="card-body">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('cms.updatepassword')}}" method="post">
                @csrf
                <label for="oldPasswordInput">كلمة المرور القديمة</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                        name="old_password" id="oldPasswordInput" placeholder="كلمة المرور القديمة">
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <label for="newPasswordInput" class="form-label">كلمة المرور الجديدة</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        name="new_password" id="newPasswordInput" placeholder="كلمة المرور الجديدة">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <label for="confirmNewPasswordInput">تأكيد كلمة المرور الجديدة</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password_confirmation"
                        id="confirmNewPasswordInput" placeholder="تأكيد كلمة المرور الجديدة">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">تغيير الكلمة</button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</div>
@endsection


@section('scripts')

@endsection