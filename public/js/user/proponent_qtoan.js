$(function(){
	function myFormatCurrency (money) {
		return	money.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
	};
	function danhso(){
	  var rows = $('table#qttu_cont').find('tbody').find('tr');
	  for (var i = 0, len = rows.length; i < len; i++){
		  $(rows[i]).children("td:nth-child(1)").html(i+1);
  };
	}
	  danhso();
	var url = location.href;
	var tuid = url.split('/').pop();
	$('form#content1').attr('action', '/quyet-toan/'+tuid);
	$('#them_cont').click(function(e){
		e.preventDefault();
		$('tbody#qtoan_cont').append('<tr class="input_fields_wrap"><td></td><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td>&nbsp;<td></td><td><input type="date" name="nchay[]"/></td><td><input type="text" name="scont[]" size="15"/></td><td><input type="text" name="sochi[]" size="15"/></td><td><input type="text" name="ccont[]" size="10"/></td><td><input type="text" name="lcont[]" size="15"/></td><td><input type="text" name="bainang[]" size="25" /></td><td><input type="text" name="baiha[]" size="25" /></td><td><input type="number" name="trongluong[]" /></td><td><input type="text" name="dieuxe[]" size="20" /></td><td><input type="text" name="lxe[]" size="15"/></td><td><input type="text" name="bsxe[]" size="15"/></td><td><input type="text" name="diadiemdongtrahang[]" size="25"/></td><td><input type="text" name="phinangchuaVAT[]" size="15"/></td><td><input type="text" name="VATphinang[]" size="15"/></td><td><input type="text" name="sohoadonnang[]" size="15"/></td><td><input type="date" name="nxuathoadonnang[]"/></td><td><input type="text" name="dvicaphoadonnang[]" size="15"/></td><td><input type="text" name="phihachuaVAT[]" size="15"/></td><td><input type="text" name="VATphiha[]" size="15"/></td><td><input type="text" name="sohoadonha[]" size="15"/></td><td><input type="date" name="nxuathoadonha[]"/></td><td><input type="text" name="dvicaphoadonha[]" size="15"/></td><td><input type="text" name="boctokhai[]" size="15"/></td><td><input type="text" name="hquantiepnhan[]" size="15"/></td><td><input type="text" name="hquangiamsat[]" size="15"/></td><td><input type="text" name="hquankiemhoa[]" size="15"/></td><td><input type="text" name="cuoccont[]" size="15"/></td><td><input type="text" name="llenhhangtau[]" size="15"/></td><td><input type="text" name="luucont[]" size="15"/></td><td><input type="text" name="luubai[]" size="15"/></td><td><input type="text" name="phivesinh[]" size="15"/></td><td><input type="text" name="phicatday[]" size="15"/></td><td><input type="text" name="boctem[]" size="15"/></td><td><input type="text" name="kddtvchuaVAT[]" size="30"/></td><td><input type="text" name="VATkddtv[]" size="30"/></td><td><input type="text" name="phingoaikddtv[]" size="30"/></td><td><input type="text" name="cackhoankhacchokhach[]" size="30"/></td><td><input type="text" name="tong[]" size="15"/></td><td><input type="text" name="ghichu[]" size="50"/></td></tr>');
		$('input[name="phinangchuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATphinang[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phihachuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATphiha[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="boctokhai[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquantiepnhan[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquangiamsat[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquankiemhoa[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cuoccont[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="llenhhangtau[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="luucont[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="luubai[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phivesinh[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phicatday[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="boctem[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="kddtvchuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATkddtv[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phingoaikddtv[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cackhoankhacchokhach[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="tong[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
			danhso();
	});

	$('#them_psinh').click(function(e){
		e.preventDefault();
		$('tbody#cppsinh').append('<tr><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="text" name="ldo[]" size="50"/></td><td><input type="text" name="stien[]" size="15"/></td><td><input type="text" name="hdon[]" size="15"/></td><td><input type="text" name="nphanh[]" size="15"/></td><td><input type="text" name="ccho[]" size="15"/></td><td><input type="date" name="nchi[]"/></td><td><input type="text" name="gchu[]" size="50"/></td></tr>');
		$('input[name="stien[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
	});

	$('#qttu_cont').on('click', 'a#remove_item', function(e){
		e.preventDefault();
		$(this).parent('td').parent('tr').remove();
		danhso();
	});
	$('#qttu_cont').on('click', 'a#save_item', function(e){
		e.preventDefault();
		var par = $(this).parent('td').parent('tr');
		var tdXoa = par.children("td:nth-child(2)");
		var id = tdXoa.children("a").data('id');
		var tdEditSave = par.children("td:nth-child(3)"); 
		var tdNxechay = par.children("td:nth-child(4)");
		var tdSocont = par.children("td:nth-child(5)");
		var tdSochi = par.children("td:nth-child(6)");
		var tdCocont = par.children("td:nth-child(7)");
		var tdLoaicont = par.children("td:nth-child(8)");
		var tdBainang = par.children("td:nth-child(9)");
		var tdBaiha = par.children("td:nth-child(10)");
		var tdTrongluong = par.children("td:nth-child(11)");
		var tdDieuxe = par.children("td:nth-child(12)");
		var tdLoaixe = par.children("td:nth-child(13)");
		var tdBiensoxe = par.children("td:nth-child(14)");
		var tdDiadiemdongtrahang = par.children("td:nth-child(15)");
		var tdPhinangchuaVAT = par.children("td:nth-child(16)");
		var tdVATphinang = par.children("td:nth-child(17)");
		var tdSohoadonnang = par.children("td:nth-child(18)");
		var tdNxuathoadonnang = par.children("td:nth-child(19)");
		var tdDvicaphoadonnang = par.children("td:nth-child(20)");
		var tdPhihachuaVAT = par.children("td:nth-child(21)");
		var tdVATphiha = par.children("td:nth-child(22)");
		var tdSohoadonha = par.children("td:nth-child(23)");
		var tdNxuathoadonha = par.children("td:nth-child(24)");
		var tdDvicaphoadonha = par.children("td:nth-child(25)");
		var tdBoctokhai = par.children("td:nth-child(26)");
		var tdHqtiepnhan = par.children("td:nth-child(27)");
		var tdHqgiamsat = par.children("td:nth-child(28)");
		var tdHqkiemhoa = par.children("td:nth-child(29)");
		var tdCuoccont = par.children("td:nth-child(30)");
		var tdLaylenhhangtau = par.children("td:nth-child(31)");
		var tdLuucont = par.children("td:nth-child(32)");
		var tdLuubai = par.children("td:nth-child(33)");
		var tdPhivesinh = par.children("td:nth-child(34)");
		var tdPhicatday = par.children("td:nth-child(35)");
		var tdBoctem = par.children("td:nth-child(36)");
		var tdKddtvchuaVAT = par.children("td:nth-child(37)");
		var tdVATkddtv = par.children("td:nth-child(38)");
		var tdPhingoaikddtv = par.children("td:nth-child(39)");
		var tdKhoankhacchokhach = par.children("td:nth-child(40)");
		var tdTong = par.children("td:nth-child(41)");
		var tdGhichu = par.children("td:nth-child(42)");
		tdEditSave.html("<a href='#' id='edit_item' data-id='"+id+"'><span class='glyphicon glyphicon-pencil'></span></a>");
		var nxchay = tdNxechay.children("input[type=date]").val();
		tdNxechay.html(tdNxechay.children("input[type=date]").val());
		var scont = tdSocont.children("input[type=text]").val();
		tdSocont.html(tdSocont.children("input[type=text]").val());
		var sochi = tdSochi.children("input[type=text]").val();
		tdSochi.html(tdSochi.children("input[type=text]").val());
		var ccont = tdCocont.children("input[type=text]").val();
		tdCocont.html(tdCocont.children("input[type=text]").val());
		var lcont = tdLoaicont.children("input[type=text]").val();
		tdLoaicont.html(tdLoaicont.children("input[type=text]").val());
		var bainang = tdBainang.children("input[type=text]").val();
		tdBainang.html(tdBainang.children("input[type=text]").val());
		var baiha = tdBaiha.children("input[type=text]").val();
		tdBaiha.html(tdBaiha.children("input[type=text]").val());
		var trongluong = tdTrongluong.children("input[type=text]").val();
		tdTrongluong.html(tdTrongluong.children("input[type=text]").val());
		var dieuxe = tdDieuxe.children("input[type=text]").val();
		tdDieuxe.html(tdDieuxe.children("input[type=text]").val());
		var lxe = tdLoaixe.children("input[type=text]").val();
		tdLoaixe.html(tdLoaixe.children("input[type=text]").val());
		var bsxe = tdBiensoxe.children("input[type=text]").val();
		tdBiensoxe.html(tdBiensoxe.children("input[type=text]").val());
		var diadiemdongtrahang = tdDiadiemdongtrahang.children("input[type=text]").val();
		tdDiadiemdongtrahang.html(tdDiadiemdongtrahang.children("input[type=text]").val());
		var phinangchuaVAT;
		if(tdPhinangchuaVAT.children("input[type=text]").val()==""){
			phinangchuaVAT =0;
			tdPhinangchuaVAT.html(0);
		}else{
			 phinangchuaVAT = parseInt(tdPhinangchuaVAT.children("input[type=text]").val().replace(/\./g, ''));
			tdPhinangchuaVAT.html(myFormatCurrency(parseInt(tdPhinangchuaVAT.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var VATphinang;
		if(tdVATphinang.children("input[type=text]").val()!==""){
		 VATphinang = parseInt(tdVATphinang.children("input[type=text]").val().replace(/\./g, ''));
		tdVATphinang.html(myFormatCurrency(parseInt(tdVATphinang.children("input[type=text]").val().replace(/\./g, ''))));
		}else{
		  VATphinang = 0;
		  tdVATphinang.html(0);
		}
		var sohoadonnang = tdSohoadonnang.children("input[type=text]").val();
		tdSohoadonnang.html(tdSohoadonnang.children("input[type=text]").val());
		var nxuathoadonnang = tdNxuathoadonnang.children("input[type=date]").val();
		tdNxuathoadonnang.html(tdNxuathoadonnang.children("input[type=date]").val());
		var dvicaphoadonnang = tdDvicaphoadonnang.children("input[type=text]").val();
		tdDvicaphoadonnang.html(tdDvicaphoadonnang.children("input[type=text]").val());
		var phihachuaVAT;
		if(tdPhihachuaVAT.children("input[type=text]").val()!==""){
		 phihachuaVAT = parseInt(tdPhihachuaVAT.children("input[type=text]").val().replace(/\./g, ''));
		tdPhihachuaVAT.html(myFormatCurrency(parseInt(tdPhihachuaVAT.children("input[type=text]").val().replace(/\./g, ''))));
		}else{
			phihachuaVAT = 0;
			tdPhihachuaVAT.html(0);
		}
		var VATphiha;
		if(tdVATphiha.children("input[type=text]").val()==""){
			VATphiha = 0;
			tdVATphiha.html(0);
		}else{
		 VATphiha = parseInt(tdVATphiha.children("input[type=text]").val().replace(/\./g, ''));
		tdVATphiha.html(myFormatCurrency(parseInt(tdVATphiha.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var sohoadonha = tdSohoadonha.children("input[type=text]").val();
		tdSohoadonha.html(tdSohoadonha.children("input[type=text]").val());
		var nxuathoadonha = tdNxuathoadonha.children("input[type=date]").val();
		tdNxuathoadonha.html(tdNxuathoadonha.children("input[type=date]").val());
		var dvicaphoadonha = tdDvicaphoadonha.children("input[type=text]").val();
		tdDvicaphoadonha.html(tdDvicaphoadonha.children("input[type=text]").val());
		var boctokhai;
		if(tdBoctokhai.children("input[type=text]").val()==""){
			boctokhai = 0;
			tdBoctokhai.html(0);
		}else{
		 boctokhai = parseInt(tdBoctokhai.children("input[type=text]").val().replace(/\./g, ''));
		tdBoctokhai.html(myFormatCurrency(parseInt(tdBoctokhai.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var hquantiepnhan;
		if(tdHqtiepnhan.children("input[type=text]").val()==""){
			hquantiepnhan =  0;
			tdHqtiepnhan.html(0);
		}else{
		 hquantiepnhan =parseInt(tdHqtiepnhan.children("input[type=text]").val().replace(/\./g, ''));
		tdHqtiepnhan.html(myFormatCurrency(parseInt(tdHqtiepnhan.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var hquangiamsat;
		if(tdHqgiamsat.children("input[type=text]").val()==""){
			hquangiamsat = 0;
			tdHqgiamsat.html(0);
		}else{
		 hquangiamsat = parseInt(tdHqgiamsat.children("input[type=text]").val().replace(/\./g, ''));
		tdHqgiamsat.html(myFormatCurrency(parseInt(tdHqgiamsat.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var hquankiemhoa;
		if(tdHqkiemhoa.children("input[type=text]").val()==""){
			hquankiemhoa = 0;
			tdHqkiemhoa.html(0);
		}else{
		 hquankiemhoa = parseInt(tdHqkiemhoa.children("input[type=text]").val().replace(/\./g, ''));
		tdHqkiemhoa.html(myFormatCurrency(parseInt(tdHqkiemhoa.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var cuoccont;
		if(tdCuoccont.children("input[type=text]").val()==""){
			cuoccont = 0;
			tdCuoccont.html(0);
		}else{
		 cuoccont = tdCuoccont.children("input[type=text]").val().replace(/\./g, '');
		tdCuoccont.html(myFormatCurrency(parseInt(tdCuoccont.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var llenhhangtau;
		if(tdLaylenhhangtau.children("input[type=text]").val()==""){
			llenhhangtau = 0;
			tdLaylenhhangtau.html(0);
		}else{
		 llenhhangtau = parseInt(tdLaylenhhangtau.children("input[type=text]").val().replace(/\./g, ''));
		tdLaylenhhangtau.html(myFormatCurrency(parseInt(tdLaylenhhangtau.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var luucont;
		if(tdLuucont.children("input[type=text]").val()==""){
			luucont = 0;
			tdLuucont.html(0);
		}else{
		luucont = parseInt(tdLuucont.children("input[type=text]").val().replace(/\./g, ''));
		tdLuucont.html(myFormatCurrency(parseInt(tdLuucont.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var luubai;
		if(tdLuubai.children("input[type=text]").val()==""){
			luubai = 0;
			tdLuubai.html(0);
		}else{
		 luubai=parseInt(tdLuubai.children("input[type=text]").val().replace(/\./g, ''));
		tdLuubai.html(myFormatCurrency(parseInt(tdLuubai.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var phivesinh;
		if(tdPhivesinh.children("input[type=text]").val()==""){
			phivesinh = 0;
			tdPhivesinh.html(0);
		}else{
		 phivesinh = parseInt(tdPhivesinh.children("input[type=text]").val().replace(/\./g, ''));
		tdPhivesinh.html(myFormatCurrency(parseInt(tdPhivesinh.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var phicatday;
		if(tdPhicatday.children("input[type=text]").val()==""){
			phicatday = 0;
			tdPhicatday.html(0);
		}else{
		 phicatday = parseInt(tdPhicatday.children("input[type=text]").val().replace(/\./g, '')); 
		tdPhicatday.html(myFormatCurrency(parseInt(tdPhicatday.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var boctem;
		if(tdBoctem.children("input[type=text]").val()==""){
			boctem = 0;
			tdBoctem.html(0);
		}else{
		 boctem = parseInt(tdBoctem.children("input[type=text]").val().replace(/\./g, ''));
		tdBoctem.html(myFormatCurrency(parseInt(tdBoctem.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var kddtvchuaVAT;
		if(tdKddtvchuaVAT.children("input[type=text]").val()==""){
			kddtvchuaVAT = 0;
			tdKddtvchuaVAT.html(0);
		}else{
		kddtvchuaVAT = tdKddtvchuaVAT.children("input[type=text]").val().replace(/\./g, '');
		tdKddtvchuaVAT.html(myFormatCurrency(parseInt(tdKddtvchuaVAT.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var VATkddtv;
		if(tdVATkddtv.children("input[type=text]").val()==""){
			VATkddtv = 0;
			tdVATkddtv.html(0);
		}else{
		VATkddtv = parseInt(tdVATkddtv.children("input[type=text]").val().replace(/\./g, ''));
		tdVATkddtv.html(myFormatCurrency(parseInt(tdVATkddtv.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var phingoaikddtv;
		if(tdPhingoaikddtv.children("input[type=text]").val()==""){
			phingoaikddtv = 0;
			tdPhingoaikddtv.html(0);
		}else{
		 phingoaikddtv = parseInt(tdPhingoaikddtv.children("input[type=text]").val().replace(/\./g, ''));
		tdPhingoaikddtv.html(myFormatCurrency(parseInt(tdPhingoaikddtv.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var cackhoankhacchokhach;
		if(tdKhoankhacchokhach.children("input[type=text]").val()==""){
			cackhoankhacchokhach = 0;
			tdKhoankhacchokhach.html(0);
		}else{
		 cackhoankhacchokhach = parseInt(tdKhoankhacchokhach.children("input[type=text]").val().replace(/\./g, ''));
		tdKhoankhacchokhach.html(myFormatCurrency(parseInt(tdKhoankhacchokhach.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var tong;
		if(tdTong.children("input[type=text]").val()==""){
			tong = 0;
			tdTong.html(0);
		}else{
		 tong = parseInt(tdTong.children("input[type=text]").val().replace(/\./g, ''));
		tdTong.html(myFormatCurrency(parseInt(tdTong.children("input[type=text]").val().replace(/\./g, ''))));
		}
		var ghichu = tdGhichu.children("input[type=text]").val();
		tdGhichu.html(tdGhichu.children("input[type=text]").val());
		var data = {
			nxchay: nxchay,
			scont: scont,
			sochi: sochi,
			ccont: ccont,
			lcont: lcont,
			bainang: bainang,
			baiha: baiha,
			trongluong: trongluong,
			dieuxe: dieuxe,
			lxe: lxe,
			bsxe: bsxe,
			diadiemdongtrahang: diadiemdongtrahang,
			phinangchuaVAT: phinangchuaVAT,
			VATphinang: VATphinang,
			sohoadonnang: sohoadonnang,
			nxuathoadonnang: nxuathoadonnang,
			dvicaphoadonnang: dvicaphoadonnang,
			phihachuaVAT: phihachuaVAT,
			VATphiha: VATphiha,
			sohoadonha: sohoadonha,
			nxuathoadonha: nxuathoadonha,
			dvicaphoadonha: dvicaphoadonha,
			boctokhai: boctokhai,
			hquantiepnhan: hquantiepnhan,
			hquangiamsat: hquangiamsat,
			hquankiemhoa: hquankiemhoa,
			cuoccont: cuoccont,
			llenhhangtau: llenhhangtau,
			luucont: luucont,
			luubai: luubai,
			phivesinh: phivesinh,
			phicatday: phicatday,
			boctem: boctem,
			kddtvchuaVAT: kddtvchuaVAT,
			VATkddtv: VATkddtv,
			phingoaikddtv: phingoaikddtv,
			cackhoankhacchokhach: cackhoankhacchokhach,
			tong: tong,
			ghichu: ghichu
		};
		$.ajax({
			type: 'get',
			url: '/proponent/update-qtcont/'+id,
			data: {result: data},
			//data: "{'nxchay':'"+nxchay+"', 'scont':'"+scont+"', 'ccont':'"+ccont+"', 'lcont':'"+lcont+"', 'bainang':'"+bainang+"', 'baiha':'"+baiha+"', 'trongluong':'"+trongluong+"', 'dieuxe':'"+dieuxe+"', 'lxe':'"+lxe+"', 'bsxe':'"+bsxe+"', 'diadiemdongtrahang':'"+diadiemdongtrahang+"', 'phinangchuaVAT':'"+phinangchuaVAT+"', 'VATphinang':'"+VATphinang+"', 'sohoadonnang':'"+sohoadonnang+"', 'nxuathoadonnang':'"+nxuathoadonnang+"', 'dvicaphoadonnang':'"+dvicaphoadonnang+"', 'phihachuaVAT':'"+phihachuaVAT+"', 'VATphiha':'"+VATphiha+"', 'sohoadonha':'"+sohoadonha+"', 'nxuathoadonha':'"+nxuathoadonha+"', 'dvicaphoadonha':'"+dvicaphoadonha+"', 'boctokhai':'"+boctokhai+"', 'hquantiepnhan':'"+hquantiepnhan+"', 'hquangiamsat':'"+hquangiamsat+"', 'hquankiemhoa':'"+hquankiemhoa+"', 'cuoccont':'"+cuoccont+"', 'llenhhangtau':'"+llenhhangtau+"', 'luucont':'"+luucont+"', 'luubai':'"+luubai+"', 'phivesinh':'"+phivesinh+"', 'phicatday':'"+phicatday+"', 'boctem':'"+boctem+"', 'kddtvchuaVAT':'"+kddtvchuaVAT+"', 'VATkddtv':'"+VATkddtv+"', 'phingoaikddtv':'"+phingoaikddtv+"', 'cackhoankhacchokhach':'"+cackhoankhacchokhach+"', 'tong':'"+tong+"', 'ghichu':'"+ghichu+"'}",
			success: function (data) {
				console.log(data);
			},
			error: function(data) {
				alert('error');
			}
		});
	});
	$('#qttu_cont').on('click', 'a#edit_item', function(e){
		e.preventDefault();
		var par = $(this).parent('td').parent('tr');
		var tdXoa = par.children("td:nth-child(2)");
		var id = tdXoa.children("a").data('id');
		var tdEditSave = par.children("td:nth-child(3)"); 
		var tdNxechay = par.children("td:nth-child(4)");
		var tdSocont = par.children("td:nth-child(5)");
		var tdSochi = par.children("td:nth-child(6)");
		var tdCocont = par.children("td:nth-child(7)");
		var tdLoaicont = par.children("td:nth-child(8)");
		var tdBainang = par.children("td:nth-child(9)");
		var tdBaiha = par.children("td:nth-child(10)");
		var tdTrongluong = par.children("td:nth-child(11)");
		var tdDieuxe = par.children("td:nth-child(12)");
		var tdLoaixe = par.children("td:nth-child(13)");
		var tdBiensoxe = par.children("td:nth-child(14)");
		var tdDiadiemdongtrahang = par.children("td:nth-child(15)");
		var tdPhinangchuaVAT = par.children("td:nth-child(16)");
		var tdVATphinang = par.children("td:nth-child(17)");
		var tdSohoadonnang = par.children("td:nth-child(18)");
		var tdNxuathoadonnang = par.children("td:nth-child(19)");
		var tdDvicaphoadonnang = par.children("td:nth-child(20)");
		var tdPhihachuaVAT = par.children("td:nth-child(21)");
		var tdVATphiha = par.children("td:nth-child(22)");
		var tdSohoadonha = par.children("td:nth-child(23)");
		var tdNxuathoadonha = par.children("td:nth-child(24)");
		var tdDvicaphoadonha = par.children("td:nth-child(25)");
		var tdBoctokhai = par.children("td:nth-child(26)");
		var tdHqtiepnhan = par.children("td:nth-child(27)");
		var tdHqgiamsat = par.children("td:nth-child(28)");
		var tdHqkiemhoa = par.children("td:nth-child(29)");
		var tdCuoccont = par.children("td:nth-child(30)");
		var tdLaylenhhangtau = par.children("td:nth-child(31)");
		var tdLuucont = par.children("td:nth-child(32)");
		var tdLuubai = par.children("td:nth-child(33)");
		var tdPhivesinh = par.children("td:nth-child(34)");
		var tdPhicatday = par.children("td:nth-child(35)");
		var tdBoctem = par.children("td:nth-child(36)");
		var tdKddtvchuaVAT = par.children("td:nth-child(37)");
		var tdVATkddtv = par.children("td:nth-child(38)");
		var tdPhingoaikddtv = par.children("td:nth-child(39)");
		var tdKhoankhacchokhach = par.children("td:nth-child(40)");
		var tdTong = par.children("td:nth-child(41)");
		var tdGhichu = par.children("td:nth-child(42)");
		tdEditSave.html("<a href='#' id='save_item' data-id='"+id+"'><span class='glyphicon glyphicon-ok text-success'></span></a>");
		tdNxechay.html("<input type='date' value='"+tdNxechay.html()+"'/>");
		tdSocont.html("<input type='text' size='15' value='"+tdSocont.html()+"'/>");
		tdSochi.html("<input type='text' size='15' value='"+tdSochi.html()+"'/>");
		tdCocont.html("<input type='text' size='15' value='"+tdCocont.html()+"'/>");
		tdLoaicont.html("<input type='text' size='15' value='"+tdLoaicont.html()+"'/>");
		tdBainang.html("<input type='text' size='15' value='"+tdBainang.html()+"'/>");
		tdBaiha.html("<input type='text' size='15' value='"+tdBaiha.html()+"'/>");
		tdTrongluong.html("<input type='text' size='15' value='"+tdTrongluong.html()+"'/>");
		tdDieuxe.html("<input type='text' size='15' value='"+tdDieuxe.html()+"'/>");
		tdLoaixe.html("<input type='text' size='15' value='"+tdLoaixe.html()+"'/>");
		tdBiensoxe.html("<input type='text' size='15' value='"+tdBiensoxe.html()+"'/>");
		tdDiadiemdongtrahang.html("<input type='text' value='"+tdDiadiemdongtrahang.html()+"'/>");
		tdPhinangchuaVAT.html("<input type='text' name='phinangchuaVAT' size='15' value='"+tdPhinangchuaVAT.html().replace(/\./g, '')+"'/>");
		$('input[name=phinangchuaVAT]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdVATphinang.html("<input type='text' name='VATphinang' size='15' value='"+tdVATphinang.html().replace(/\./g, '')+"'/>");
		$('input[name=VATphinang]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdSohoadonnang.html("<input type='text' value='"+tdSohoadonnang.html()+"'/>");
		tdNxuathoadonnang.html("<input type='date' value='"+tdNxuathoadonnang.html()+"'/>");
		tdDvicaphoadonnang.html("<input type='text' value='"+tdDvicaphoadonnang.html()+"'/>");
		tdPhihachuaVAT.html("<input type='text' name='phihachuaVAT' size='15' value='"+tdPhihachuaVAT.html().replace(/\./g, '')+"'/>");
		$('input[name=phihachuaVAT]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdVATphiha.html("<input type='text' name='VATphiha' size='15' value='"+tdVATphiha.html().replace(/\./g, '')+"'/>");
		$('input[name=VATphiha]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdSohoadonha.html("<input type='text' value='"+tdSohoadonha.html()+"'/>");
		tdNxuathoadonha.html("<input type='date' value='"+tdNxuathoadonha.html()+"'/>");
		tdDvicaphoadonha.html("<input type='text' value='"+tdDvicaphoadonha.html()+"'/>");
		tdBoctokhai.html("<input type='text' name='boctokhai' size='15' value='"+tdBoctokhai.html().replace(/\./g, '')+"'/>");
		$('input[name=boctokhai]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdHqtiepnhan.html("<input type='text' name='hqtiepnhan' size='15' value='"+tdHqtiepnhan.html().replace(/\./g, '')+"'/>");
		$('input[name=hqtiepnhan]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdHqgiamsat.html("<input type='text' name='hqgiamsat' size='15' value='"+tdHqgiamsat.html().replace(/\./g, '')+"'/>");
		$('input[name=hqgiamsat]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdHqkiemhoa.html("<input type='text' name='hqkiemhoa' size='15' value='"+tdHqkiemhoa.html().replace(/\./g, '')+"'/>");
		$('input[name=hqkiemhoa]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdCuoccont.html("<input type='text' name='cuoccont' size='15' value='"+tdCuoccont.html().replace(/\./g, '')+"'/>");
		$('input[name=cuoccont]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdLaylenhhangtau.html("<input type='text' name='llenhhangtau' size='15' value='"+tdLaylenhhangtau.html().replace(/\./g, '')+"'/>");
		$('input[name=llenhhangtau]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdLuucont.html("<input type='text' name='luucont' size='15' value='"+tdLuucont.html().replace(/\./g, '')+"'/>");
		$('input[name=luucont]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdLuubai.html("<input type='text' name='luubai' size='15' value='"+tdLuubai.html().replace(/\./g, '')+"'/>");
		$('input[name=luubai]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdPhivesinh.html("<input type='text' name='phivesinh' size='15' value='"+tdPhivesinh.html().replace(/\./g, '')+"'/>");
		$('input[name=phivesinh]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdPhicatday.html("<input type='text' name='phicatday' size='15' value='"+tdPhicatday.html().replace(/\./g, '')+"'/>");
		$('input[name=phicatday]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdBoctem.html("<input type='text' name='boctem' size='15' value='"+tdBoctem.html().replace(/\./g, '')+"'/>");
		$('input[name=boctem]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdKddtvchuaVAT.html("<input type='text' name='kddtvchuaVAT' size='15' value='"+tdKddtvchuaVAT.html().replace(/\./g, '')+"'/>");
		$('input[name=kddtvchuaVAT]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdVATkddtv.html("<input type='text' name='VATkddtv' size='15' value='"+tdVATkddtv.html().replace(/\./g, '')+"'/>");
		$('input[name=VATkddtv]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdPhingoaikddtv.html("<input type='text' name='phingoaikddtv' size='15' value='"+tdPhingoaikddtv.html().replace(/\./g, '')+"'/>");
		$('input[name=phingoaikddtv]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdKhoankhacchokhach.html("<input type='text' name='khoankhacchokhach' size='15' value='"+tdKhoankhacchokhach.html().replace(/\./g, '')+"'/>");
		$('input[name=khoankhacchokhach]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdTong.html("<input type='text' name='tong' size='15' value='"+tdTong.html().replace(/\./g, '')+"'/>");
		$('input[name=tong]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		tdGhichu.html("<input type='text' name='ghichu' value='"+tdGhichu.html()+"'/>");

	});
	$('#qttu_ps').on('click', 'a#remove_item', function(e){
		e.preventDefault();
		$(this).parent('td').parent('tr').remove();
	});
	$('#qtoan_cont').on('click', 'a#remove_item_ajax', function(e){
		e.preventDefault();
		$tempt = $(this);
		qtcid = $(this).data('id');
		$.ajax({
			url: '/delete-quyet-toan-cont/'+tuid+'/'+qtcid,
			method: 'get',
			success: function(data){
				console.log('Success');
				$tempt.parent('td').parent('tr').remove();
				danhso();
			},
			error: function(data){
				console.log('Error');
			}
		});
	});
	$('#cppsinh').on('click', 'a#remove_item_ajax', function(e){
		e.preventDefault();
		$tempt = $(this);
		cppsid = $(this).data('id');
		$.ajax({
			url: '/delete-quyet-toan-phat-sinh/'+tuid+'/'+cppsid,
			method: 'get',
			success: function(data){
				console.log('Success');
				$tempt.parent('td').parent('tr').remove();
			},
			error: function(data){
				console.log('Error');
			}
		});
	});
	$('#denghiquyettoan').on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			url: '/proponent/de-nghi-quyet-toan/'+id,
			method: 'get',
			success: function(data){
				if(data=='success'){
					alert('De nghi quyet toan thanh cong!');
					window.location.reload();
				}else{
					alert('De nghi quyet toan khong thanh cong!');
				}
			},
			error: function(data){
			}
		})
	});
	$('#huydenghiquyettoan').on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			url: '/proponent/huy-de-nghi-quyet-toan/'+id,
			method: 'get',
			success: function(data){
				if(data=='success'){
					alert('Huy de nghi quyet toan thanh cong!');
					window.location.reload();
				}else{
					alert('Huy de nghi quyet toan khong thanh cong!');
				}
			},
			error: function(data){
			}
		})
	});
});
