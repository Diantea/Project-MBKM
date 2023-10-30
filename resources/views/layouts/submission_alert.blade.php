@if(!auth()->user()->on_internship)
    <div class="card mb-4">
        <div class="d-flex align-items-center row">
            <div class="col-7">
                <div class="card-body text-nowrap">
                    <h5 class="card-title mb-1">Ajukan Tempat Magang Baru</h5>
                    <p class="mb-3">Kamu dapat mengajukan tempat untuk kamu magang.</p>
                    <a href="" data-bs-toggle="modal" data-bs-target="#request-company-modal" class="btn btn-primary waves-effect waves-light mt-2">Ajukan sekarang</a>
                </div>
            </div>
            <div class="col-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140" alt="view sales">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="request-company-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('company.request_company') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Ajukan Tempat Magang</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">

                                @include('forms.textfield', ['label' => 'Nama Perusahaan', 'field' => 'name', 'type' => 'text'])

                                @include('forms.textarea', ['label' => 'Alamat Perusahaan', 'field' => 'address'])

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Batalkan
                        </button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
