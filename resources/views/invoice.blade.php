<!-- <h2>Hello user,</h2>

<p>Please melakukan pembayaran LES</p>
<p>Details : </p>
<p>Nama : {{ $biodata }}</p>
<p>Kelas : {{ $kelas }}</p>
<p>Jurusan : {{ $jurusan }}</p>
<p>Jadwal_belajar : {{ $jadwal_belajar }}</p>
<p>Les : {{ $les }}</p>
<p>Sistem akan otomatis membatalkan pendaftaran les jika sudah melewati waktu (1 jam) dari anda menerima invoice ini</p>
<p>Thank You</p> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Invoice</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	   <div class="card">
	      <div class="card-header">
	         Invoice
	         <strong>{{ Date('d/M/Y', strtotime('now')) }}</strong> 
	         <span class="float-right"> <strong>Status:</strong> Pending</span>
	      </div>
	      <div class="card-body">
	         <div class="row mb-4">
	            <div class="col-sm-6">
	               <h6 class="mb-3">From:</h6>
	               <div>
	                  <strong>Bintang Belajar</strong>
	               </div>
	               <!-- <div>Madalinskiego 8</div>
	               <div>71-101 Szczecin, Poland</div>
	               <div>Email: info@webz.com.pl</div>
	               <div>Phone: +48 444 666 3333</div> -->
	            </div>
	            <div class="col-sm-6">
	               <h6 class="mb-3">To:</h6>
	               <div>
	                  <strong>{{ $biodata }}</strong>
	               </div>
	               <div>Attn: {{ $biodata }}</div>
	            </div>
	         </div>
	         <div class="table-responsive-sm">
	            <table class="table table-striped">
	               <thead>
	                  <tr>
	                     <th class="center">#</th>
	                     <th>Description</th>
	                     <th class="right">Unit Cost</th>
	                  </tr>
	               </thead>
	               <tbody>
	                  <tr>
	                     <td class="center">2</td>
	                     <td class="left">Pembayaran Pendaftaran Les</td>
	                     <td class="right">Rp. 150.000</td>
	                  </tr>
	               </tbody>
	            </table>
	         </div>
	      </div>
	   </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>