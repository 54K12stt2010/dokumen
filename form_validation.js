var xmlhttp = createRequestObject();
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

function cari_serp(kks_data,tahun){
	var kks_data=kks_data.value;
	var tahun=tahun.value;
	var url='view/serp_view.php?kks_data='+kks_data+'&tahun='+tahun;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			 document.getElementById("view_serp").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}

function cari_reap(bulan,tahun){
	var bulan=bulan.value;
	var tahun=tahun.value;
	var url='view/reap_view.php?bulan='+bulan+'&tahun='+tahun;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			 document.getElementById("view_reap").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}

function cari_hpp(bulan,tahun){
	var bulan=bulan.value;
	var tahun=tahun.value;
	var url='view/hpp_view.php?bulan='+bulan+'&tahun='+tahun;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			 document.getElementById("view_hpp").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
