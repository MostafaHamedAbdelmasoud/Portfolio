@extends('layouts.app')
@section('content')


	<div id="notfound">
		<div class="notfound">
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<h1>خطأ!</h1>
			<h2>خطأ 404 : 
                الملف ليس موجوده
            </h2>
			<a href="{{url('/')}}"> رجوع للصفحة الرئيسية</a>
			
		</div>
	</div>

    
@endsection