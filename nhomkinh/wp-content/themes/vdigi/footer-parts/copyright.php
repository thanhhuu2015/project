<div class="_copyright text-center">

	<span><?php the_field( 'copyright', 'options' ); ?></span>

</div>




<!-- --------------- -->

<?php $hotline = get_field( 'hotline', 'option' ); ?>


<div class="echbay-sms-messenger style-for-position-br">
	<div class="phonering-alo-alo">
		<a href="tel:<?php echo preg_replace('/\s+/', '', $hotline); ?>" rel="nofollow" class="echbay-phonering-alo-event">.</a>
	</div>
	<div class="phonering-alo-zalo">
		<a href="https://zalo.me/<?php echo preg_replace('/\s+/', '', $hotline ); ?>" target="_blank" rel="nofollow" class="echbay-phonering-zalo-event">.</a>
	</div>
	<div class="phonering-alo-messenger">
		<a href="<?php the_field( 'fanpage', 'option' ); ?>" target="_blank" rel="nofollow" class="echbay-phonering-messenger-event">.</a>
	</div>
</div>


<style>




	.echbay-sms-messenger.style-for-position-br {
		left: 20px;
		display: block;
	}

	.echbay-sms-messenger {
		text-align: center;
		position: fixed;
		bottom: 20px;
		z-index: 999;
		display: block;
		width: 40px;
	}

	.echbay-sms-messenger div.phonering-alo-zalo, .echbay-sms-messenger div.phonering-alo-alo {
		background-color: #0080ff;
	}

	.echbay-sms-messenger div.phonering-alo-alo {
		background-image: url(https://i.imgur.com/QwWgMT9.png);
	}

	.echbay-sms-messenger div:first-child {
		margin-top: 0;
	}

	.echbay-sms-messenger div {
		margin: 14px 0;
		background: #0084FF center no-repeat;
		background-size: 70%;
		border-radius: 50%;
		box-shadow: 0 3px 10px #888;
	}

	.echbay-sms-messenger a {
		line-height: 40px;
		display: block;
		text-indent: -9999px;
	}
	.echbay-sms-messenger div.phonering-alo-sms {
		background-color: #e60f1e;
	}

	.echbay-sms-messenger div.phonering-alo-sms {
		background-image: url(https://i.imgur.com/2tLZtoJ.png);
		background-size: 60%;
	}

	.echbay-sms-messenger div.phonering-alo-zalo {
		display: block;
		background-image: url(https://i.imgur.com/MlWEaaK.png);
	}

	.echbay-sms-messenger div.phonering-alo-messenger {
		background-color: #4660a5;
	}

	.echbay-sms-messenger div.phonering-alo-messenger {
		background-image: url(https://i.imgur.com/yh45vCH.png);
	}

	.echbay-sms-messenger div:last-child {
		margin-bottom: 0;
	} 


	.echbay-sms-messenger.style-for-position-br> div:hover {
		bottom: 5px;
	}

	.echbay-sms-messenger.style-for-position-br > div {
		position: relative;
		transition: all .3s linear;
		bottom: 0;
	}



</style>







