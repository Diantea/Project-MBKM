<div class="card">
    <div class="card-body">

        <h4 class="card-title d-flex align-items-center justify-content-between">
            Reset Kata Sandi
        </h4>

        @include('layouts.alert')

        <form action="{{ route('user.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($item)
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label" for="id">Pengguna</label>
                    <input type="text" class="form-control" id="id" value="{{ $item->email }}" disabled />
                </div>
            @endif

            <div class="row">

                <div class="col-12">
                    @include('forms.textfield', ['label' => 'Kata Sandi', 'field' => 'password', 'type' => 'password'])
                </div>

                <div class="col-12">
                    @include('forms.textfield', ['label' => 'Ulangi Kata Sandi', 'field' => 'password_confirmation', 'type' => 'password'])
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Reset Kata Sandi</button>
                @if(isset($back_button) && $back_button)
                <a href="{{route('user.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                @endif
            </div>

        </form>

    </div>

</div>
