<? php
 permintaan fungsi ( $ url , $ token  =  null , $ data  =  null , $ pin  =  null ) {
$ header [] =  " Host: api.gojekapi.com " ;
$ header [] =  " User-Agent: okhttp / 3.10.0 " ;
$ header [] =  " Terima: application / json " ;
$ header [] =  " Bahasa Terima: id-ID " ;
$ header [] =  " Tipe-Konten: application / json; charset = UTF-8 " ;
$ header [] =  " X-AppVersion: 3.30.2 " ;
$ header [] =  " X-UniqueId: " . waktu () . " 57 " . mt_rand ( 1000 , 9999 );
$ header [] =  " Koneksi: tetap-hidup " ;
$ header [] =  " X-User-Lokal: en_ID " ;
// $ header [] = "X-Location: -6.3894201,106.0794195";
// $ header [] = "X-Location-Accuracy: 3.0";
if ( $ pin ):
$ header [] =  " pin: $ pin " ;
    endif ;
if ( $ token ):
$ header [] =  " Otorisasi: Bearer $ token " ;
endif ;
$ c  =  curl_init ( " https://api.gojekapi.com " . $ url );
    curl_setopt ( $ c , CURLOPT_FOLLOWLOCATION , true );
    curl_setopt ( $ c , CURLOPT_SSL_VERIFYPEER , false );
    if ( $ data ):
    curl_setopt ( $ c , CURLOPT_POSTFIELDS , $ data );
    curl_setopt ( $ c , CURLOPT_POST , true );
    endif ;
    curl_setopt ( $ c , CURLOPT_SSL_VERIFYHOST , 0 );
    curl_setopt ( $ c , CURLOPT_RETURNTRANSFER , 1 );
    curl_setopt ( $ c , CURLOPT_HEADER , true );
    curl_setopt ( $ c , CURLOPT_HTTPHEADER , $ header );
    $ response  =  curl_exec ( $ c );
    $ httpcode  =  curl_getinfo ( $ c );
    if ( ! $ httpcode )
        return  false ;
    selain itu {
        $ header  =  substr ( $ response , 0 , curl_getinfo ( $ c , CURLINFO_HEADER_SIZE ));
        $ body    =  substr ( $ response , curl_getinfo ( $ c , CURLINFO_HEADER_SIZE ));
    }
    $ json  =  json_decode ( $ body , true );
    mengembalikan  $ json ;
}
 menyimpan fungsi ( $ nama file , $ konten )
{
	$ save  =  fopen ( $ filename , " a " );
	fputs ( $ save , " $ content \ r \ n " );
	fclose ( $ save );
}
? >
