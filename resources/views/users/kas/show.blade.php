@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-6">
            <div class="col-lg-8">
                <h6 class="h1 text-white d-inline-block mb-0">Edit Data Kas</h6>
            </div>
        </div>
      </div>
    </div>
    <div class="container mt--5 mx-auto">
        <div class="card bg-secondary shadow center" style="width: 60rem;">
            <div class="card-body">
                <form action="{{ url('/updatekas/'.$data->id) }}" method="post" enctype="multipart/form-data" autocomplete="on">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">{{ __('Kas Kantor') }}</h6>
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-date">{{ __('Tanggal') }}</label>
                            <input type="date" name="tanggal" id="input-date" class="form-control form-control-alternative{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" placeholder="D/m/Y" value="{{ $data->tanggal }}">
                            @if ($errors->has('tanggal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tanggal') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('pemasukan') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-pemasukan">{{ __('Pemasukan') }}</label>
                            <input type="text" name="pemasukan" id="input-pemasukan" class="form-control form-control-alternative{{ $errors->has('pemasukan') ? ' is-invalid' : '' }}" placeholder="Pemasukan" value="{{ $data->pemasukan }}">
                            @if ($errors->has('pemasukan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pemasukan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('pembayaran') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-pembayaran">{{ __('Pembayaran') }}</label>
                            <select type="text" name="pembayaran" id="input-pembayaran" class="form-control form-control-alternative{{ $errors->has('pembayaran') ? ' is-invalid' : '' }}" placeholder="Pembayaran" value="Cash">
                                <option value="{{ $data->pembayaran }}">{{ $data->pembayaran }}</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                            @if ($errors->has('pembayaran'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pembayaran') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('pengeluaran') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-pengeluaran">{{ __('Pengeluaran') }}</label>
                            <input type="text" name="pengeluaran" id="input-pengeluaran" class="form-control form-control-alternative{{ $errors->has('pengeluaran') ? ' is-invalid' : '' }}" placeholder="Pengeluaran" value="{{ $data->pengeluaran }}">
                            @if ($errors->has('pengeluaran'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pengeluaran') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-notes">{{ __('Notes') }}</label>
                            <textarea name="notes" id="input-notes" class="form-control form-control-alternative{{ $errors->has('notes') ? ' is-invalid' : '' }}" placeholder="Notes">{{ $data->notes }}</textarea>
                            @if ($errors->has('notes'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('notes') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <a class="btn btn-success mt-4" href="{{url('/indexkas')}}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
                            <button type="submit" class="btn btn-success mt-4">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection