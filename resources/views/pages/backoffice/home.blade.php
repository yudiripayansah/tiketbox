@extends('layout.layout')
@section('screen')
  <section id="bhome" class="br-tl-10 br-tr-10 overflow-hidden backoffice">
      <div class="boc-title py-15 px-25 text-left fw-700 fs-14 text-light border-bottom border-primary">
        Dashboard
      </div>
      <div class="boc-content bg-transparent">
        <div class="d-flex p-25 br-15 align-items-center justify-content-center mt-25" style="background: rgba(193, 193, 193, 0.40);backdrop-filter: blur(20.067087173461914px);">
          <span class="fs-12 fw-700 text-light me-15">Complete your profile, to use the Promoter features</span>
          <a href="#" class="btn btn-primary btn-sm">Click Here</a>
        </div>
        <div class="row mt-25">
          <div class="col-6 col-md-4">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Event Aktif</span>
              <span class="fs-24 fw-700 text-light mt-15">12</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Event</span>
            </div>
          </div>
          <div class="col-6 col-md-4">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Event Draft</span>
              <span class="fs-24 fw-700 text-light mt-15">5</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Event</span>
            </div>
          </div>
          <div class="col-6 col-md-4">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Total Transaksi</span>
              <span class="fs-24 fw-700 text-light mt-15">17,500</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Transaksi</span>
            </div>
          </div>
          <div class="col-6 col-md-4 mt-25">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Total Pendapatan</span>
              <span class="fs-24 fw-700 text-light mt-15">Rp 120,450,500.00</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Pendapatan</span>
            </div>
          </div>
          <div class="col-6 col-md-4 mt-25">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Total Penarikan</span>
              <span class="fs-24 fw-700 text-light mt-15">Rp 90,460,700.00</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Penarikan</span>
            </div>
          </div>
          <div class="col-6 col-md-4 mt-25">
            <div class="br-15 py-20 px-40 d-flex flex-column" style="background: linear-gradient(153deg, #252525 18.75%, rgba(37, 37, 37, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <span class="fs-14 fw-700 text-light">Total Pengunjung</span>
              <span class="fs-24 fw-700 text-light mt-15">16,000</span>
              <span class="fs-14 fw-400 mt-15" style="color: #6BEBA4;">Orang</span>
            </div>
          </div>
          <div class="col-12 mt-25">
            <div class="p-20 br-15" style="background: linear-gradient(153deg, #262C2D 18.75%, rgba(38, 37, 38, 0.24) 100%);backdrop-filter: blur(20.067087173461914px);">
              <canvas class="chart">
  
              </canvas>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
@section('script')
<script>
  const DATA_COUNT = 12;
  const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov','Des'];
  const datapoints = [25, 20, 20, 60, 60, 120, 150, 180, 120, 125, 105, 110, 170];
  const data = {
    labels: labels,
    datasets: [
      {
        label: 'Jumlah Transaksi',
        data: datapoints,
        borderColor: '#92FE9D',
        fill: false,
        cubicInterpolationMode: 'monotone',
        tension: .9
      }
    ]
  };
  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Statistik Transaksi'
        },
      },
      interaction: {
        intersect: false,
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Bulan'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Value'
          },
          suggestedMin: -10,
          suggestedMax: 200
        }
      }
    },
  };
  let eChart = document.querySelector('.chart')
  let theChart = new Chart(eChart, config);
</script>
@endsection