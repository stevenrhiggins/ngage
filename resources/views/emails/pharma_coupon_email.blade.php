
<p>{!! date('F d, Y') !!}</p>

<p>Dear {!! $data['person_name'] !!}</p>

<p>Because we're so grateful that you've shared your feedback with us, we’d like you to enjoy this <strong>$5 off coupon</strong> on your next purchase of $25 or more*.</p>

<p>This Offer is valid for 21 days and will expire on <strong>{!! $data['expiration'] !!}</strong>. </p>

<p>Please present this email coupon to the cashier at the Pharmasave store located at <strong>{!! $data['store_address'] !!}</strong> as it is only valid at this store and no other Pharmasave location.</p>

<p>Your Coupon Code is included in the image below.</p>

<p><img src="{!! $message->embed($data['pathToImage']) !!}" style="width: 200px"></p>

<p>From your Live Well Team</p>

<p><img src="{!! $message->embed($data['pathToLogo']) !!}"></p>

<p style="font-size: 10px">Valid at participating Pharmasave Drugs (Atlantic) Limited locations in the provinces of Nova Scotia, New Brunswick, PEI and Newfoundland & Labrador. Terms for the offer are as follows: Receive $5 off your next purchase of $25 or more at the same store where the original purchase was made. Offer is valid until three weeks after completion of survey. Valid on in-stock merchandise only. Eligible amount calculated on merchandise total only, before applicable taxes (and shipping). Not redeemable for cash, nor is it valid for any previously purchased merchandise. Offer cannot be combined with any other discounts, offers or promotions. Offer valid in-store, one time use only. The following items are excluded and cannot be purchased with the coupon: prescriptions filled, products with codeine, single entity pseudoephedrine, taxes, post office, bottle deposits, event tickets, lottery, transit tickets and passes, bill payments, the purchase of gift cards and pre-paid cards. Your survey will be shared with Phamasave Drugs (Atlantic) Ltd. and Pharmasave Drugs (National) Ltd</p>


