@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.layout')

@section('content')
<div class="container myitem-content">
	<h2>Referrals</h2>
	<p>Refer a friend with this link and earn 20 points</p>
	<div class="card">
		<div class="card-body">
			<p>You Referral Link</p>
			<div>
				<span class="border border-success p-2 copy-to-clipboard">
					<input type="hidden" value="{{ auth()->user()->getReferrals()[0]->link }}" disabled="disabled" >
					{{ auth()->user()->getReferrals()[0]->code }}
				</span>
				<button type="submit" class="btn btn-success btn-md" onclick="myFunction('#referral-code');">Copy</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function() {
	$('.copy-to-clipboard input').click(function() {
	$(this).focus();
	$(this).select();
	document.execCommand('copy');
	$(".copied").text("Copied to clipboard").show().fadeOut(1200);
    });
});
</script>

@endsection