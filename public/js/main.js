$(".datepicker").datepicker({
	dateFormat: 'dd/mm/yy',
	dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	nextText: 'Próximo',
	prevText: 'Anterior'
});
$(function() {
    //$('#moeda').maskMoney();
    $('#cpf').mask('999.999.999-99', {reverse: true});
	$('#cep').mask('99.999-999', {reverse: true});
	$('#cnpj').mask('99.999.999/9999-99', {reverse: true});

	$('input[type=tel]').mask("(99) 9999-9999?9").ready(function(event) {
		var target, phone, element;
		target = (event.currentTarget) ? event.currentTarget : event.srcElement;
		phone = target.value.replace(/\D/g, '');
		element = $(target);
		element.unmask();
		if(phone.length > 10) {
			element.mask("(99) 99999-999?9");
		} else {
			element.mask("(99) 9999-9999?9");
		}
	});
	$('#tblRelatorios').dataTable( {
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/725b2a2115b/i18n/Portuguese-Brasil.json"
		},
		"dom": 'T<"clear">lfrtip',
		"tableTools": {
			"sSwfPath": url_public+"swf/copy_csv_xls_pdf.swf"
		}
	});
});
$(".prosseguir").click(function() {
	var id = $(this).attr("meta-id");


	if(confirm("Deseja realizar esse procedimento?"))
	{
		$(id).submit();
	}
});
$('.show-business').click(function() {
	var divOpen = $(this).attr('meta-open');

	if(!$(divOpen).is(':visible'))
	{
		$(divOpen).slideDown();
		$(this).html('[ Esconder info ]');
	}
	else
	{
		$(divOpen).slideUp();
		$(this).html('[ Exibir info ]');
	}
});

function confirmarAcao(txt, url)
{
	if(confirm(txt))
	{
		window.location.href = url;
	}
}

function SomenteNumero(e){
	var tecla=(window.event) ? event.keyCode : e.which;
	if((tecla>47 && tecla<58)) return true;
	else {
		if (tecla == 8 || tecla == 0) return true;
			else return false;
	}
}

function novaConsulta()
{
	if(confirm('Para realizar essa pesquisa, será cobrado uma nova consulta.\n\nDeseja continuar?'))
		window.location = '?page=pessoais';
}
function ushow_modal(nome, limite, tipo, empresa, razao) {

	$(".nome").html(nome);
	$(".limite").html(limite);
	$(".tipo").html(tipo);
	$(".empresa").html(razao);
	$(".cnpj").html(empresa);

	$.pgwModal({
	    target: '#modalContent',
	    title: 'Maiores informações - ' + nome,
	    maxWidth: 650
	});
}

function show_modal(razao, end, num, bairro, cidade, estado, cep, email, responsavel, preco, complemento) {

	$(".end").html(end);
	$(".num").html(num);
	$(".bairro").html(bairro);
	$(".cidade").html(cidade);
	$(".estado").html(estado);
	$(".cep").html(cep);
	$(".email").html(email);
	$(".resp").html(responsavel);
	$(".preco").html(preco);
	$(".cpl").html(complemento);

	$.pgwModal({
	    target: '#modalContent',
	    title: 'Maiores informações - ' + razao,
	    maxWidth: 800
	});
}

function btnExport() {
	window.open('data:application/vnd.ms-excel,' + $('#example').html());
	e.preventDefault();
}

$(".open-span").click(function() {

	$($(this).next("span")).toggle(
        function() {
			$(this).next("span:hidden").show();
        },
        function() {
			$(this).next("span:visible").hide();
			$(this).parent( "li" ).toggleClass('open');
        }
    );
	
});
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");