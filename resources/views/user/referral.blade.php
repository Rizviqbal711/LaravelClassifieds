@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')


@section('title', 'Referral | QuickList')

@section('content')
<div class="container myitem-content">
	<h2>Referrals</h2>
	<p>Refer a friend with this link and earn 20 points</p>
	<div class="card">
		<div class="card-body">
			<p>Your Referral Link</p>
			<input type="text" value="{{ auth()->user()->getReferrals()[0]->link }}" class="allowCopy form-control" readonly>
			<small>Please click the link to copy</small>
			<div class="alert alert-success text-center alert fade-in mt-2">
				Link Copied!
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('.allowCopy').click(function() {
   	// $(this).css('background', 'yellow');
     $(this).focus();
     $(this).select();
     document.execCommand('copy');
     $('.alert').show();
   });
});
</script>

@endsection