<? php
# ## Ini Hak Cipta ###
# ## https: //github.com/osyduck/Gojek-Register###
termasuk ( " function.php " );
fungsi  nama ()
	{
	$ ch  =  curl_init ();
	curl_setopt ( $ ch , CURLOPT_URL , " http://ninjaname.horseridersupply.com/indonesian_name.php " );
	curl_setopt ( $ ch , CURLOPT_SSL_VERIFYPEER , 0 );
	curl_setopt ( $ ch , CURLOPT_SSL_VERIFYHOST , 0 );
	curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , 1 );
	curl_setopt ( $ ch , CURLOPT_FOLLOWLOCATION , 1 );
	$ ex  =  curl_exec ( $ ch );
	// $ rand = json_decode ($ rnd_get, true);
	preg_match_all ( ' ~ (& bull; (. *?) <br/> & bull;) ~ ' , $ ex , $ name );
	return  $ name [ 2 ] [ mt_rand ( 0 , 14 )];
	}
 register fungsi ( $ no )
	{
	$ nama  = nama ();
	$ email  =  str_replace ( "  " , " " , $ nama ) .  mt_rand ( 100 , 999 );
	$ data  =  ' {"name": " '  .  $ nama  .  ' ", "email": " '  .  $ email  .  ' @ gmail.com", "phone": "+ '  .  $ no  .  ' ", " signed_up_country ":" ID "} ' ;
	$ register  = request ( " / v5 / customers " , " " , $ data );
	// print_r ($ register);
	if ( $ register [ ' success ' ] ==  1 )
		{
		kembalikan  $ register [ ' data ' ] [ ' otp_token ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ register ));
		return  false ;
		}
	}
fungsi  verif ( $ otp , $ token )
	{
	$ data  =  ' {"client_name": "gojek: cons: android", "data": {"otp": " '  .  $ otp  .  ' ", "otp_token": " '  .  $ token  .  ' "}, " client_secret ":" 83415d06-ec4e-11e6-a41b-6c40088ab51e "} ' ;
	$ verif  = permintaan ( " / v5 / pelanggan / telepon / verifikasi " , " " , $ data );
	if ( $ verif [ ' success ' ] ==  1 )
		{
		mengembalikan  $ verif [ ' data ' ] [ ' access_token ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ verif ));
		return  false ;
		}
	}
	fungsi  masuk ( $ no )
	{
	$ nama  = nama ();
	$ email  =  str_replace ( "  " , " " , $ nama ) .  mt_rand ( 100 , 999 );
	$ data  =  ' {"phone": "+ ' . $ no . ' "} ' ;
	$ register  = request ( " / v4 / customers / login_with_phone " , " " , $ data );
	// print_r ($ register);
	if ( $ register [ ' success ' ] ==  1 )
		{
		return  $ register [ ' data ' ] [ ' login_token ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ register ));
		return  false ;
		}
	}
function  veriflogin ( $ otp , $ token )
	{
	$ data  =  ' {"client_name": "gojek: cons: android", "client_secret": "83415d06-ec4e-11e6-a41b-6c40088ab51e", "data": {"otp": " ' . $ otp . ' " , "otp_token": " ' . $ token . ' "}, "grant_type": "otp", "scopes": "gojek: pelanggan: transaksi gojek: pelanggan: readonly"} ' ;
	$ verif  = permintaan ( " / v4 / pelanggan / login / verifikasi " , " " , $ data );
	if ( $ verif [ ' success ' ] ==  1 )
		{
		mengembalikan  $ verif [ ' data ' ] [ ' access_token ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ verif ));
		return  false ;
		}
	}
 klaim fungsi ( $ token )
	{
	$ data  =  ' {"promo_code": "GOFOODSANTAI19"} ' ;
	$ klaim  = permintaan ( " / promosi-promosi / v1 / promosi / pendaftaran " , $ token , $ data );
	if ( $ claim [ ' success ' ] ==  1 )
		{
		return  $ claim [ ' data ' ] [ ' message ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ claim ));
		return  false ;
		}
	}
klaim fungsi ( $ token )
	{
	$ data  =  ' {"promo_code": "GOFOODSANTAI08"} ' ;
	$ klaim  = permintaan ( " / promosi-promosi / v1 / promosi / pendaftaran " , $ token , $ data );
	if ( $ claim [ ' success ' ] ==  1 )
		{
		return  $ claim [ ' data ' ] [ ' message ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ claim ));
		return  false ;
		}
	}
klaim fungsi ( $ token )
	{
	$ data  =  ' {"promo_code": "GOFOODSANTAI01"} ' ;
	$ klaim  = permintaan ( " / promosi-promosi / v1 / promosi / pendaftaran " , $ token , $ data );
	if ( $ claim [ ' success ' ] ==  1 )
		{
		return  $ claim [ ' data ' ] [ ' message ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ claim ));
		return  false ;
		}
	}
klaim fungsi ( $ token )
	{
	$ data  =  ' {"promo_code": "COBAINGOJEK"} ' ;
	$ klaim  = permintaan ( " / promosi-promosi / v1 / promosi / pendaftaran " , $ token , $ data );
	if ( $ claim [ ' success ' ] ==  1 )
		{
		return  $ claim [ ' data ' ] [ ' message ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ claim ));
		return  false ;
		}
	}
klaim fungsi ( $ token )
	{
	$ data  =  ' {"promo_code": "AYOCOBAGOJEK"} ' ;
	$ klaim  = permintaan ( " / promosi-promosi / v1 / promosi / pendaftaran " , $ token , $ data );
	if ( $ claim [ ' success ' ] ==  1 )
		{
		return  $ claim [ ' data ' ] [ ' message ' ];
		}
	  lain
		{
      save ( " error_log.txt " , json_encode ( $ claim ));
		return  false ;
		}
	}
echo  " Pilih Login atau Daftar? Login = 1 & Daftar = 2: " ;
$ type  =  trim ( fgets ( STDIN ));
if ( $ type  ==  2 ) {
gema  " Ini Cara Mendaftar \ n " ;
echo  " Input 62 Untuk ID dan 1 Untuk Nomor Telepon AS \ n " ;
gema  " Masukkan Nomor: " ;
$ nggak  =  trim ( fgets ( STDIN ));
$ register  = register ( $ nggak );
if ( $ register  ==  false )
	{
	echo  " Gagal Mendapatkan OTP, Gunakan Nomor Tidak Terdaftar! \ n " ;
	}
  lain
	{
	gema  " Masukkan OTP Anda: " ;
	// gema "Masukkan Nomor:";
	$ otp  =  trim ( fgets ( STDIN ));
	$ verif  = verif ( $ otp , $ register );
	if ( $ verif  ==  false )
		{
		echo  " Gagal Mendaftarkan Nomor Anda! \ n " ;
		}
	  lain
		{
		gema  " Siap untuk Mengklaim \ n " ;
		$ klaim  = klaim ( $ verif );
		if ( $ claim  ==  false )
			{
			echo  " Gagal Klaim Voucher, Coba Klaim Secara Manual \ n " ;
			}
		  lain
			{
			gema  $ klaim  .  " \ n " ;
			}
		}
	}
} lain  jika ( $ type  ==  1 ) {
echo  " Ini Cara Masuknya \ n " ;
echo  " Input 62 Untuk ID dan 1 Untuk Nomor Telepon AS \ n " ;
gema  " Masukkan Nomor: " ;
$ nggak  =  trim ( fgets ( STDIN ));
$ login  = login ( $ nggak );
if ( $ login  ==  false )
	{
	echo  " Gagal Mendapat OTP! \ n " ;
	}
  lain
	{
	gema  " Masukkan OTP Anda: " ;
	// gema "Masukkan Nomor:";
	$ otp  =  trim ( fgets ( STDIN ));
	$ verif  = veriflogin ( $ otp , $ login );
	if ( $ verif  ==  false )
		{
		echo  " Gagal Masuk dengan Nomor Anda! \ n " ;
		}
	  lain
		{
		gema  " Siap untuk Mengklaim \ n " ;
		$ klaim  = klaim ( $ verif );
		if ( $ claim  ==  false )
			{
			echo  " Gagal Klaim Voucher, Coba Klaim Secara Manual \ n " ;
			}
		  lain
			{
			gema  $ klaim  .  " \ n " ;
			}
		}
	}
}
? >
