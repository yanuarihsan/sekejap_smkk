<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .report-title {
            font-size: 14px;
            font-weight: bolder;
        }

        .f-bold {
            font-weight: bold;
        }

        .footer {
            position: fixed;
            bottom: 0cm;
            right: 0cm;
            height: 2cm;
        }
		@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: left;
  text-align: left;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 0.9em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: left;
  text-align: left;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 0px;
}

table th,
table td {
  padding: 0px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #EEEEEE;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: left;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 14px;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}

    </style>
</head>
<body>
<header class="clearfix">
      <div id="logo">
        <img src="{{ public_path('/images/logo2.png') }}">
      </div>
      <div id="company">
        <h2 class="name">Sistem Evaluasi Kinerja Penyedia Jasa</h2>
       
      </div>
      </div>
    </header>

<main>

<table border="0" cellspacing="0" cellpadding="0">

<tbody>
<tr>
	<td rowspan="9"><img src="{{ public_path($vendor->image) }}" height="100" width="100" style="border-radius: 50%"
			onerror="this.onerror=null;this.src='{{ asset('/images/noimage.png') }}';"/></td>
	<td>Penyedia Jasa</td>
	<td>{{ $vendor->vendor->name }}</td>
</tr>
<tr>
	<td>Alamat</td>
	<td>{{ $vendor->vendor->address }}</td>
</tr>
<tr>
	<td>IUJK</td>
	<td>{{ $vendor->vendor->iujk }}</td>
</tr>
<tr>
	<td>NPWP</td>
	<td>{{ $vendor->vendor->npwp }}</td>
</tr>
<tr>
	<td>Paket Pekerjaan</td>
	<td>{{ $package !== null ? $package->name : '-' }}</td>
</tr>
<tr>
	<td>Nomor Kontrak</td>
	<td>{{ $package !== null ? $package->no_reference : '-' }}</td>
</tr>
<tr>
	<td>Pengguna Jasa</td>
	<td>{{ $package !== null ? $package->ppk->name : '-' }}</td>
</tr>
<tr>
	<td>Tanggal Mulai</td>
	<td>{{ $package !== null ? $package->start_at : '-' }}</td>
</tr>
<tr>
	<td>Tanggal Selesai</td>
	<td>{{ $package !== null ? $package->finish_at : '-' }}</td>
</tr>
</tbody>
</table>

<table>
<tr>
	<td>
		<div>
			<p style="font-weight: bold">Nilai Kinerja Komulatif</p>
			<p>{{ $cumulative['cumulative'] }}</p>
			<p >{{ $cumulative['text'] }}</p>
			<p>Update Terakhir : {{ $cumulativeLast }}</p>
		</div>	
	</td>
	<td>
		<div>
			<img src="{{ $html }}" width="250">
		</div>

	</td>
</tr>
</table>



<div>
    <p style="font-weight: bold">Penilaian Mandiri</p>
    <p>{{ $vendorCumulative['cumulative'] }}</p>
    <p>{{ $vendorCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $vendorCumulative['last']->updated_at }}</p>
</div>

<div>
    <p style="font-weight: bold">Penilaian PPK</p>
    <p>{{ $ppkCumulative['cumulative'] }}</p>
    <p>{{ $ppkCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $ppkCumulative['last']->updated_at }}</p>
</div>

<div>
    <p style="font-weight: bold">Penilaian Balai</p>
    <p>{{ $officeCumulative['cumulative'] }}</p>
    <p>{{ $officeCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $officeCumulative['last']->updated_at }}</p>
</div>

<div id="detail_penilaian_mandiri" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($vendorCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($vendorCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($vendorCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($vendorCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>
<div id="detail_penilaian_ppk" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($ppkCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($ppkCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($ppkCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($ppkCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>

<div id="detail_penilaian_balai" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($officeCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($officeCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($officeCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($officeCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>

</body>
</html>
