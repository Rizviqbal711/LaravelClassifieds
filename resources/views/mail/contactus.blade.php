<style type="text/css">
	@font-face {
	font-family: 'MuseoSans-500';
	src: url('/webfonts/3978CB_0_0.eot');
	src: url('/webfonts/3978CB_0_0.eot?#iefix') format('embedded-opentype'),
	url('/webfonts/3978CB_0_0.woff2') format('woff2'),
	url('/webfonts/3978CB_0_0.woff') format('woff'),
	url('/webfonts/3978CB_0_0.ttf') format('truetype');
}

.text-black{
	color: black;
}

.text-success{
	color: #38c172;
}
</style>
<div class="d-flex justify-content-center"> 
	 <span  class="text-black" style="font-family: MuseoSans-500; font-size: 35px;">QUICK<span class="text-success">LIST</span></span>
</div>
<p>Hello {{ $name }},<br>
Thanks for reaching QuickList. We'll get back to you as soon as possible</p>
<p>Here are the details:<br>
Name: {{ $name }}<br>
Email: {{ $email }}<br>
Subject: {{ $subject }}<br>
Message: {{ $user_message }}</p>
<p>Thank You,<br>
QuickList Team</p>
