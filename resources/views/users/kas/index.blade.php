@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-6">
            
            <div class="col-lg-8">
                <h6 class="h1 text-white d-inline-block mb-0">Data Kas Kantor</h6>
            </div>
            <div class="col-lg-8">
                <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "villanet");
                    $pemasukan = mysqli_query($koneksi, 'SELECT sum(pemasukan) as pemasukan from kas');
                    $row = mysqli_fetch_array($pemasukan);
                    $sum = $row['pemasukan'];


                    $pengeluaran = mysqli_query($koneksi, 'SELECT sum(pengeluaran) as pengeluaran from kas');
                    $row2 = mysqli_fetch_array($pengeluaran);
                    $min = $row2['pengeluaran'];

                    $saldo = $sum - $min;
                ?>
                    <tr>
                        <td><h2 class="text-white text-justify font-italic">Saldo Kas Rp <?php echo number_format($saldo, 0, ',', '.'); ?></h2></td>
                    </tr>
                <?php?>
            </div>
            <div class="col-lg-6">
                <a href="{{url('createkas')}}" class="btn btn-sm btn-neutral">New</a>
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--4">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="row m-t-90">
                    <div class="col-md-12" style="width: 6000px">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pemasukan</th>
                                        <th>Pembayaran</th>
                                        <th>Pengeluaran</th>
                                        <th>Notes</th>
                                        <th>Saldo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $p => $dataKas)
                                    <tr>
                                        <td>{{ $p + 1 }}</td>
                                        <td>{{ $dataKas->tanggal }}</td>
                                        <td>Rp {{ number_format($dataKas->pemasukan, 0, ',', '.') }}</td>
                                        <td>{{ $dataKas->pembayaran }}</td>
                                        <td>Rp {{ number_format($dataKas->pengeluaran, 0, ',', '.') }}</td>
                                        <td>{{ $dataKas->notes }}</td>
                                        <td>Rp {{ number_format($dataKas->pemasukan - $dataKas->pengeluaran, 0, ',', '.') }}</td>
        
                                        <td>
                                            <a href="{{url('/showkas/'.$dataKas->id)}}"><i class="far fa-edit" style="color:green"></i></a>
                                            <a href="{{url('/destroykas/'.$dataKas->id)}}" onclick="return myFunction();"><i type="button" class="fas fa-trash-alt" style="color:red"></i></a>
                                            <script>
                                              function myFunction() {
                                                  if(!confirm("Are you sure you want to delete this data ?"))
                                                  event.preventDefault();
                                              }
                                             </script>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content">
                              {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
